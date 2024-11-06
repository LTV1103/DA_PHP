<?php
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$sql_product = "SELECT * FROM tbl_products WHERE  tbl_products.id_product = $id LIMIT 1";
$query_product = mysqli_query($mysqli, $sql_product);
?>

<div class="product-details">
    <?php
    while ($row = mysqli_fetch_array($query_product)) {
    ?>
        <div class="product-image">
            <img src="./image/<?php echo htmlspecialchars($row['image']); ?>?height=300&width=300" alt="Product Image">
        </div>
        <div class="product-info">
            <h1 class="product-name"><?php echo htmlspecialchars($row['namepro']); ?></h1>
            <p class="product-price"><?php echo number_format($row['price'], 0, ',', '.'); ?>₫</p>
            <div class="product-quantity">
                <label for="quantity"></label>
                <input type="number" id="quantity" name="quantity" min="1" value="1">
            </div>
            <!-- <p class="stock-info">Kho: <?php echo htmlspecialchars($row['stock']); ?></p> -->
            <div class="button-group">
                <button class="button button-primary">Mua ngay</button>
                <button class="button button-secondary">
                    <i data-lucide="shopping-cart"></i>
                    Thêm giỏ hàng
                </button>
            </div>
            <div class="product-description">
                <h2>Mô tả:</h2>
                <p><?php echo htmlspecialchars($row['description']); ?></p>
            </div>
        </div>
    <?php } ?>
</div>