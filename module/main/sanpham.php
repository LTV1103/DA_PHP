<?php
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

    $sql_product = "SELECT * FROM tbl_products, tbl_categories WHERE tbl_products.id_category = tbl_categories.id_category AND tbl_products.id_category = $id ";
    $query_product = mysqli_query($mysqli, $sql_product);

    $sql = "SELECT * FROM tbl_products";
    $query = mysqli_query($mysqli, $sql);
?> 

<h3>SẢN PHẨM</h3>

<?php if ($id == 1) { ?>
    <ul class="product_list">
        <?php while ($row = mysqli_fetch_array($query)) { ?> 
            <li>
                <a href="#">
                    <img src="/image/<?php echo htmlspecialchars($row['image']); ?>" width="200px" alt="Product Image">
                    <p class="title_product">Tên sản phẩm: <?php echo htmlspecialchars($row['namepro']); ?></p>
                    <p class="price_product">Giá: <?php echo htmlspecialchars($row['price']); ?> VND</p>
                </a>
            </li>
        <?php } ?>
    </ul>
<?php } else { ?>
    <ul class="product_list">
        <?php while ($row_product = mysqli_fetch_array($query_product)) { ?> 
            <li>
                <a href="#">
                    <img src="/image/<?php echo htmlspecialchars($row_product['image']); ?>" width="200px" alt="Product Image">
                    <p class="title_product">Tên sản phẩm: <?php echo htmlspecialchars($row_product['namepro']); ?></p>
                    <p class="price_product">Giá: <?php echo htmlspecialchars($row_product['price']); ?> VND</p>
                </a>
            </li>
        <?php } ?>
    </ul>
<?php } ?>
