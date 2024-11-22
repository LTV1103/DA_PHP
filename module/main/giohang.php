<?php

session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Xử lý xóa sản phẩm khỏi giỏ hàng
if (isset($_GET['idxoasp'])) {
    $id = $_GET['idxoasp'];

   
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id'] == $id) {
            unset($_SESSION['cart'][$key]); 
        }
    }

    $_SESSION['cart'] = array_values($_SESSION['cart']);

    header("Location: ../../index.php?quanly=giohang");
    exit();
}

$cart = $_SESSION['cart']; 

// Tính tổng tiền
$totalPrice = 0;
foreach ($cart as $item) {
    $totalPrice += $item['giasp'] * $item['soluong'];
}
?>

<div class="container">
    <h2>GIỎ HÀNG CỦA BẠN</h2>
    <div class="cart-info">
        <!-- Chi tiết giỏ hàng -->
        <div class="cart-details">
            <p>Bạn đang có <span id="product-count"><?php echo count($cart); ?></span> sản phẩm trong giỏ hàng</p>
            
            <?php foreach ($cart as $item): ?>
            <div class="product-item" data-id="<?php echo $item['id']; ?>">
                <img src="/image/<?php echo $item['hinhanh']; ?>" alt="<?php echo $item['tensp']; ?>">
                <div class="product-item-info">
                    <p><?php echo $item['tensp']; ?></p>
                    <div class="product-quantity">
                        <button class="quantity-decrease" data-id="<?php echo $item['id']; ?>">-</button>
                        <input type="text" class="quantity-input" value="<?php echo $item['soluong']; ?>" data-id="<?php echo $item['id']; ?>">
                        <button class="quantity-increase" data-id="<?php echo $item['id']; ?>">+</button>
                    </div>
                    <p class="total-price"><?php echo number_format($item['giasp'] * $item['soluong'], 0, ',', '.'); ?> đ</p>
                </div>
                <a href="/module/main/capnhatgiohang.php?idxoasp=<?php echo $item['id']; ?>" class="btn-xoa">XÓA</a>
            </div>
            <?php endforeach; ?>

            <div class="notes">
                <label for="order-notes">Ghi chú đơn hàng</label>
                <textarea id="order-notes" rows="3" style="width: 100%;"></textarea>
            </div>
        </div>

        <!-- Thông tin đơn hàng -->
        <div class="order-summary">
            <h3>Thông tin đơn hàng</h3>
            <p class="total-price-value">Tổng tiền: <span id="total-price"><?php echo number_format($totalPrice, 0, ',', '.'); ?> đ</span></p>
            <p>Bạn có thể nhập mã giảm giá ở trang thanh toán</p>
            <a href="index.php?quanly=thanhtoan" class="checkout">THANH TOÁN</a>
        </div>
    </div>

    <a href="index.php" class="continue-shopping">TIẾP TỤC MUA HÀNG</a>

</div>
<script src="/javascript/main.js"></script>

<?php
if (isset($_SESSION['success_message'])) {
    echo "<div class='success-message'>" . $_SESSION['success_message'] . "</div>";
    unset($_SESSION['success_message']);
}
?>
