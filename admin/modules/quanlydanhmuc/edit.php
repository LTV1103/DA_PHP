<?php
$sql_edit_Category = "SELECT * FROM tbl_categories WHERE id_category='$_GET[idDanhmuc]'";
$query_edit_Category = mysqli_query($mysqli, $sql_edit_Category);
?>
<div class="form_addCate">
    <table border="1" cellpadding="10" cellspacing="0">
        <form action="modules/quanlydanhmuc/controll.php?idDanhmuc=<?php echo $_GET['idDanhmuc'] ?>" method="POST">
            <?php
            while ($row = mysqli_fetch_array($query_edit_Category)) {
            ?>
                <tr>
                    <th colspan="2">Sửa tên danh mục</th>
                </tr>
                <tr>
                    <td><input type="text" name="suaDanhmuc" placeholder="Sửa tên danh mục" value="<?php echo $row['name'] ?>"></td>
                    <td><button type="submit" name="btnEdit">Sửa</button></td>
                </tr>
            <?php  } ?>
        </form>
    </table>
</div>