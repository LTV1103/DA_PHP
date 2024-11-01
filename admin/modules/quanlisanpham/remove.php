<?php
    $mysqli = new mysqli("localhost", "root", "", "db_webmohinh");      
    $id = $_GET['id'];
    $sql = " DELETE FROM tbl_products WHERE id_product = $id";
    $query = mysqli_query($mysqli,$sql);
    header('Location:/admin/index.php?action=quanlisanpham');
?>
