<?php
try {
  
    $sql = "SELECT * FROM tbl_products";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Lỗi";
    exit();
}
?>

<h3>SẢN PHẨM MỚI NHẤT</h3>

<div class="product_list">
    <?php foreach ($products as $row) { ?>
        <a href="index.php?quanly=sanpham&id=<?php echo $row['id_product']; ?>">
            <div class="product_item">
                <div class="product_image">
                    <img src="./image/<?php echo htmlspecialchars($row['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="Product Image">
                </div>
                <div class="product_info">
                    <p class="title_product"><?php echo htmlspecialchars($row['namepro'], ENT_QUOTES, 'UTF-8'); ?></p>
                </div>
                <div class="product_info">
                    <p class="price_product"><?php echo number_format($row['price'], 0, ',', '.'); ?>₫</p>
                </div>
                <div class="box_buy">
                    <button class="buy-now">Mua Ngay</button>
                    <a href="#" class="cart-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                </div>
            </div>
        </a>
    <?php } ?>
</div>