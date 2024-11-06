<?php
$sql = "SELECT * FROM tbl_products";
$query = mysqli_query($mysqli, $sql);
?>

<h3>SẢN PHẨM MỚI NHẤT</h3>
<!-- Hiện Tất cả Sản Phẩm -->

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