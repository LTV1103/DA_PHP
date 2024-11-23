<?php
$id = isset($_GET['idDanhmuc']) ? (int)$_GET['idDanhmuc'] : 0;

$sql_product = "SELECT * FROM tbl_products, tbl_categories WHERE tbl_products.id_category = tbl_categories.id_category AND tbl_categories.id_category = $id ";
$query_product = mysqli_query($mysqli, $sql_product);

$sql = "SELECT * FROM tbl_products";
$query = mysqli_query($mysqli, $sql);
?>

<h3>SẢN PHẨM</h3>
<!-- Hiện Tất cả Sản Phẩm -->
<?php if ($id == 0) { ?>
<ul class="product_list">
    <?php while ($row = mysqli_fetch_array($query)) { ?>
    <li>
        <a href="index.php?quanly=sanpham&id=<?php echo  $row['id_product'] ?>">
            <img src="./image/<?php echo htmlspecialchars($row['image']); ?>" width="200px" alt="Product Image">
            <p class="title_product"><?php echo htmlspecialchars($row['namepro']); ?></p>
            <p class="price_product"><?php echo number_format($row['price'], 0, ',', '.'); ?>₫</p>
            <div class="box_buy">
                <button class="buy-now">Mua Ngay</button>
                <a href="#" class="cart-icon">
                    <i class="fas fa-shopping-cart"></i>
                </a>
            </div>

        </a>
    </li>
    <?php } ?>
</ul>
<!-- Hiện Sản Phẩm Theo Danh Mục -->
<?php } else { ?>
<ul class="product_list">
    <?php while ($row_product = mysqli_fetch_array($query_product)) { ?>
    <li>
        <a href="index.php?quanly=sanpham&id=<?php echo  $row_product['id_product'] ?>">
            <img src="./image/<?php echo htmlspecialchars($row_product['image']); ?>" width="200px" alt="Product Image">
            <p class="title_product"><?php echo htmlspecialchars($row_product['namepro']); ?></p>
            <p class="price_product"><?php echo number_format($row_product['price'], 0, ',', '.'); ?>₫</p>
            <div class="box_buy">
                <button class="buy-now">Mua Ngay</button>
                <a href="#" class="cart-icon">
                    <i class="fas fa-shopping-cart"></i>
                </a>
            </div>
        </a>
    </li>
    <?php } ?>
</ul>
<?php } ?>