
<?php
session_start();

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: index.php"); 
    exit();
}

if (isset($_POST['checkout'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $notes = $_POST['order-notes'];
    unset($_SESSION['cart']);
    exit();
}

$cart = $_SESSION['cart'];
$totalPrice = 0;
foreach ($cart as $item) {
    $totalPrice += $item['giasp'] * $item['soluong'];
}
?>

<div class="container">
    <h2>THANH TOÁN</h2>
    <form action="checkout.php" method="POST">
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
