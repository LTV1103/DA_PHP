<!-- <?php
    $sql_product = "SELECT *FROM tbl_categories , tbl_ product WHERE tbl_product.id_category = tbl_categories.id_category AND tbl_categories.id_category = '$_GET[id]' ";
    // [phan san pham dang trong nen ko hien dc kq]
    $query_product =  mysqli_query($mysqli,$sql_product);
    $row_title = mysqli_fetch_array( $query_product);
?> -->
<h3>SAN PHAM</h3>
        <ul class="product_list">
        <!-- <?php while ($row_product = mysqli_fetch_array($query_product)) { ?> -->
            <li><a href="#"><img src="./image/Luffy.jpeg" alt="#">
                    <p class="title_product">Tên sản phẩm: Luffy mũ rơm</p>
                    <p class="price_product">Giá: 2000000 VND</p>
                </a>
            </li>
            <li><a href="#"><img src="./image/luffy2.jpeg   " alt="#">
                    <p class="title_product">Tên sản phẩm: Luffy mũ rơm</p>
                    <p class="price_product">Giá: 2000000 VND</p>
                </a>
            </li>
            <!-- <?php  } ?> -->
        </ul>