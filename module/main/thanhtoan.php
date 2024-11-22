<?php
session_start();
$totalPrice = 0;

// Kiểm tra giỏ hàng
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
    foreach ($cart as $item) {
        $totalPrice += $item['giasp'] * $item['soluong'];
    }
} else {
    $cart = [];
}


if (isset($_POST['checkout'])) {
    $name = htmlspecialchars($_POST['name']);
    $address = htmlspecialchars($_POST['address']);
    $phone = htmlspecialchars($_POST['phone']);
    $notes = htmlspecialchars($_POST['order-notes']);
        // Lưu đơn hàng
        $sql_order = "INSERT INTO tbl_order (customer_name, customer_address, customer_phone, notes, total_price, created_at)
                      VALUES ('$name', '$address','$phone', '$notes', '$totalPrice', NOW())";
        $query_order = mysqli_query($mysqli, $sql_order);
        $orderId = mysqli_insert_id($mysqli);

        // Lưu chi tiết sản phẩm
        foreach ($cart as $item) {
            $productId = $item['id'];
            $productName = $item['tensp'];
            $quantity = $item['soluong'];
            $price = $item['giasp'];
            $total = $quantity * $price;

            $sql_order_details = "INSERT INTO tbl_order_details (order_id, product_id, product_name, quantity, price, total)
                                  VALUES ('$orderId', '$productId', '$productName', '$quantity', '$price', '$total')";
            mysqli_query($mysqli, $sql_order_details);
        }

        // Xóa giỏ hàng
        unset($_SESSION['cart']);
        $_SESSION['success_message'] = "Thanh toán thành công! Đơn hàng của bạn đã được ghi nhận.";
        header("Location: index.php?quanly=giohang");
        exit();
    } else {
        $_SESSION['error_message'] = "Giỏ hàng trống. Không thể thanh toán.";
    }
?>

<div class="container">
    <h2>THANH TOÁN</h2>
    <form action="index.php?quanly=thanhtoan" method="POST">
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
            <p>Tổng tiền: <?php echo number_format($totalPrice, 0, ',', '.'); ?> đ</p>
            <button type="submit" name="checkout" class="checkout-button">Xác nhận thanh toán</button>
        </div>
    </form>
</div>
