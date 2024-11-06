<div class="sidebar">
    <ul class="list_sidebar">
        <?php
        $sql_danhmuc = "SELECT * FROM tbl_categories";
        $query_danhmuc =  mysqli_query($mysqli, $sql_danhmuc);

        while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) { ?>
            <li class="list_sidebar">
                <a href="index.php?quanly=danhmucsanpham&idDanhmuc=<?php echo  $row_danhmuc['id_category'] ?>">
                    <?php echo  $row_danhmuc['name'] ?></a>
            </li>
        <?php  } ?>
    </ul>
</div>