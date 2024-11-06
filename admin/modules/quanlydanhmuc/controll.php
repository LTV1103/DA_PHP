<?php
include("../../config/config.php");

if (isset($_POST['btnAdd'])) {
    $tenDanhmuc = $_POST['tenDanhmuc'];
  
    if (!empty($tenDanhmuc)) {
        $sql_add = "INSERT INTO tbl_categories(name) VALUE('" . $tenDanhmuc . "')";
        if (mysqli_query($mysqli, $sql_add)) {
            header('Location:../../index.php?action=quanlydanhmuc&query=them');
            exit();
        } else {
            echo "Lỗi: Không thể thêm vào cơ sở dữ liệu!";
        }
    } else {
        echo "Vui lòng nhập tên danh mục!";
    }
} elseif (isset($_POST['btnEdit'])) {
    $tenDanhmuc= $_POST['suaDanhmuc'];
    if (!empty($tenDanhmuc)) {
        $sql_update = "UPDATE tbl_categories SET name='".$tenDanhmuc."'  WHERE id_category='$_GET[idDanhmuc]'" ;
        if (mysqli_query($mysqli, $sql_update)) {
            header('Location:../../index.php?action=quanlydanhmuc&query=them');
            exit();
        } else {
            echo "Lỗi: Không thể thêm vào cơ sở dữ liệu!";
        }
    } else {
        echo "Vui lòng nhập tên danh mục!";
    }

} else {
    $id = $_GET['idDanhmuc'];
    $sql_delete = "DELETE FROM tbl_categories WHERE id_category = '" . $id . "'";
    mysqli_query($mysqli, $sql_delete);
    header('Location:../../index.php?action=quanlydanhmuc&query=them');
}
