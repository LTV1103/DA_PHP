<?php
$sql_loatDanhmuc = "SELECT * FROM tbl_categories";
$query_lietke_danhmuc = mysqli_query($mysqli, $sql_loatDanhmuc);
?>

<div class="list_category">
    
    <table border="1 solid #f0f0f0" style="border-style: dashed;">

        <th>Danh mục</th>
        <?php
            $i = 0;


            while($row = mysqli_fetch_array($query_lietke_danhmuc)){
                $i++;
        ?>
        <tr>
            <td><?php echo $row['name'] ;?></td>
        </tr>

        <?php  }?>
    </table>

</div>