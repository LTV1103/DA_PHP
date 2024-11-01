<div class="sidebar">
<h1>DANH MỤC</h1>
<?php
    $sql_danhmuc = "SELECT *FROM tbl_categories";
    $query_danhmuc =  mysqli_query($mysqli,$sql_danhmuc);
?>
<?php while($row_danhmuc = mysqli_fetch_array( $query_danhmuc)) { ?>
                <li><a href="index.php?quanly=danhmucsanpham&id=<?php echo  $row_danhmuc['id_category']?>"><?php echo  $row_danhmuc['name']?></a></li>
                <?php  } ?>
</div>