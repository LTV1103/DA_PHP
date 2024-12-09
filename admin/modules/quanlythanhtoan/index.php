<?php
function getPayments($pdo)
{
    $stmt = $pdo->prepare("SELECT * FROM tbl_payments");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
$payment = getPayments($pdo);



?>

<div class="form_addCate">
    <table border="1" cellpadding="10" cellspacing="0">
        <form action="modules/quanlythanhtoan/controll.php" method="POST">
            <tr>
                <th colspan="2">Nhập tên PTTT</th>
            </tr>
            <tr>
                <td><input type="text" name="tenPTTT" placeholder="Tên PTTT"></td>
                <td><button type="submit" name="btnAdd">Thêm</button></td>
            </tr>
        </form>
    </table>
</div>

<div class="list_category">
    <table border="1 solid #f0f0f0" style="border-style: dashed;">
        <th colspan="2">Phương thức thanh toán</th>
        <?php
        if (!empty($payment)) {
            foreach ($payment as $row) {
        ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['payment_method'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>
                        <a class="delete-btn" href="modules/quanlythanhtoan/controll.php?ac=delete&idTT=<?php echo $row['id_payment']; ?>">Xóa</a>
                        |
                        <a href="?action=quanlythanhtoan&query=sua&idTT=<?php echo $row['id_payment']; ?>">Sửa</a>
                    </td>
                </tr>
        <?php
            }
        } else {
            echo "<tr><td colspan='2'>Không có phương thức thanh toán nào!</td></tr>";
        }
        ?>
    </table>
</div>
<script src="/javascript/notification.js"></script>