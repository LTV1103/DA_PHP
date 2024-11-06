<?php
$sql_loadDanhmuc = "SELECT * FROM tbl_categories";
$query_lietke_danhmuc = mysqli_query($mysqli, $sql_loadDanhmuc);
?>

<div class="list_category">
    <table border="1 solid #f0f0f0" style="border-style: dashed;">
        <th colspan="2">Danh mục</th>
        <?php
        while ($row = mysqli_fetch_array($query_lietke_danhmuc)) {
        ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td> <a href="modules/quanlydanhmuc/controll.php?idDanhmuc=<?php echo $row['id_category'] ?>">Xóa</a>
                |<a href="?action=quanlydanhmuc&query=sua&idDanhmuc=<?php echo $row['id_category'] ?>">Sửa</a></td>
            </tr>

        <?php  } ?>
    </table>

</div>