<?php
    $sql_danhmuc = "SELECT *FROM tbl_categories";
    $query_danhmuc =  mysqli_query($mysqli,$sql_danhmuc);
?>
<div class="menu">
            <ul class="list_menu">
                <li><a href="index.php">Trang Chủ</a></li>
                <?php while($row_danhmuc = mysqli_fetch_array( $query_danhmuc)) { ?>
                <li><a href="index.php?quanly=danhmucsanpham&id=<?php echo  $row_danhmuc['id_category']?>"><?php echo  $row_danhmuc['name']?></a></li>
                <?php  } ?>
                <li><a href="index.php?quanly=giohang">Giỏ Hàng</a></li>
                <li><a href="index.php?quanly=lienhe">Liên Hệ</a></li>
            </ul>
        </div>