<?php
require_once dirname(dirname(__DIR__)) . "/admin/config/config.php";

if (!isset($_SESSION['idUser'])) {
    echo "<div class='container'><h2>THANH TOÁN</h2><p class='error-message'>Vui lòng <a href='module/login/login.php'>đăng nhập</a> để thanh toán.</p></div>";
    exit();
}

$totalPrice = 0;
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

// Tính tổng tiền giỏ hàng
foreach ($cart as $item) {
    $totalPrice += $item['giasp'] * $item['soluong'];
}

$paymentMethodId = isset($_GET['payment_method']) ? $_GET['payment_method'] : 1;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $payment = isset($_POST['paymentMethod']) ? $_POST['paymentMethod'] : null;
    $address = htmlspecialchars($_POST['address']);
    $phone = htmlspecialchars($_POST['phone']);
    $notes = htmlspecialchars($_POST['order-notes']);
    $userId = isset($_SESSION['idUser']) ? $_SESSION['idUser'] : 0;

    try {
        // Kiểm tra tồn kho cho từng sản phẩm
        foreach ($cart as $item) {
            $productId = $item['id'];
            $quantity = $item['soluong'];

            $sql_check_stock = "SELECT stock FROM tbl_products WHERE id_product = :productId";
            $stmt_check_stock = $pdo->prepare($sql_check_stock);
            $stmt_check_stock->execute([':productId' => $productId]);
            $stock = $stmt_check_stock->fetchColumn();

            if ($stock < $quantity) {
                echo "<div class='error-message'>Sản phẩm {$item['tensp']} không đủ hàng trong kho. Vui lòng giảm số lượng hoặc chọn sản phẩm khác.</div>";
                exit();
            }
        }

        // Thêm đơn hàng
        $sql_order = "INSERT INTO tbl_order (id_user, customer_name, customer_address, customer_phone, notes, total_price, payment_id, created_at)
                      VALUES (:userId, :name, :address, :phone, :notes, :totalPrice, :id_payment, NOW())";
        $stmt_order = $pdo->prepare($sql_order);
        $stmt_order->execute([
            ':userId' => $userId,
            ':name' => $name,
            ':address' => $address,
            ':phone' => $phone,
            ':notes' => $notes,
            ':id_payment' => $payment,
            ':totalPrice' => $totalPrice,
        ]);

        $orderId = $pdo->lastInsertId();

        // Thêm chi tiết đơn hàng và cập nhật tồn kho
        foreach ($cart as $item) {
            $productId = $item['id'];
            $quantity = $item['soluong'];
            $price = $item['giasp'];
            $total = $quantity * $price;

            // Thêm chi tiết đơn hàng
            $sql_order_details = "INSERT INTO tbl_order_details (order_id, product_id, quantity, price)
                                  VALUES (:orderId, :productId, :quantity, :price)";
            $stmt_order_details = $pdo->prepare($sql_order_details);
            $stmt_order_details->execute([
                ':orderId' => $orderId,
                ':productId' => $productId,
                ':quantity' => $quantity,
                ':price' => $total
            ]);

            $sql_update_stock = "UPDATE tbl_products SET stock = stock - :quantity WHERE id_product = :productId";
            $stmt_update_stock = $pdo->prepare($sql_update_stock);
            $stmt_update_stock->execute([
                ':quantity' => $quantity,
                ':productId' => $productId
            ]);
        }

        // Xóa giỏ hàng sau khi thanh toán thành công
        unset($_SESSION['cart']);
        $_SESSION['success_message'] = "Thanh toán thành công! Đơn hàng của bạn đã được ghi nhận.";
        header("Location: index.php?quanly=giohang");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit();
    }
}

try {
    $sql_payment_method = "SELECT payment_method FROM tbl_payments WHERE id_payment = :id";
    $stmt_payment_method = $pdo->prepare($sql_payment_method);
    $stmt_payment_method->execute([':id' => $paymentMethodId]);
    $paymentMethod = $stmt_payment_method->fetchColumn();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit();
}
?>

<div class="container">
    <h2>THANH TOÁN</h2>
    <form action="index.php?quanly=thanhtoan" method="POST">
        <input type="hidden" name="paymentMethod" value="<?php echo $paymentMethodId; ?>">

        <div class="billing-info">
            <h3>Thông tin thanh toán</h3>
            <label for="name">Họ và tên</label>
            <input type="text" id="name" name="name" required>

            <label for="address">Địa chỉ</label>
            <input type="text" id="address" name="address" required>

            <label for="phone">Số điện thoại</label>
            <input type="text" id="phone" name="phone" required>

            <label for="order-notes">Ghi chú đơn hàng</label>
            <textarea id="order-notes" name="order-notes" rows="3"></textarea>
        </div>

        <div class="order-summary">
            <h3>Thông tin đơn hàng</h3>
            <p>Phương Thức Thanh Toán: <?php echo htmlspecialchars($paymentMethod); ?></p>
            <p>Tổng tiền: <?php echo number_format($totalPrice, 0, ',', '.'); ?> đ</p>
            <button type="submit" name="checkout" class="checkout-button">Xác nhận thanh toán</button>
        </div>
    </form>
</div>