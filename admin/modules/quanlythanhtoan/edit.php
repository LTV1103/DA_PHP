<?php
$sql = "SELECT * FROM tbl_payments WHERE id_payment = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $_GET['idTT'], PDO::PARAM_INT);
$stmt->execute();

$pttt = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<div class="form_addCate">
    <table border="1" cellpadding="10" cellspacing="0">
        <form action="modules/quanlythanhtoan/controll.php?idTT=<?php echo $_GET['idTT']; ?>" method="POST">
            <tr>
                <th colspan="2">Nhập tên PTTT</th>
            </tr>
            <tr>
                <td><input type="text" name="tenPTTT" placeholder="Tên PTTT" 
                value="<?php echo $pttt['payment_method']?>"></td>
                <td><button type="submit" name="btnEdit">Cập nhật</button></td>
            </tr>
        </form>
    </table>
</div>