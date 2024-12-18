<?php
require_once dirname(dirname(__DIR__)) . "/config/config.php";

try {
    // Truy vấn cơ sở dữ liệu
    $sql = "SELECT tbl_users.email ,tbl_order.id,
                    tbl_order.customer_name,tbl_order.customer_address,
                    tbl_order.customer_phone,tbl_order.notes,tbl_order.total_price,
                    tbl_order.total_price,tbl_order.created_at 
    FROM tbl_users JOIN tbl_order ON tbl_users.id_user = tbl_order.id_user ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Lỗi truy vấn";
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php if (!empty($orders)) { ?>
        <table>
            <thead>
                <tr>  
                    <th>Mã đơn</th>  
                    <th>Email</th>
                    <th>Tên khách hàng</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Ghi chú</th>
                    <th>Tổng tiền (VNĐ)</th>
                    <th>Ngày tạo</th>
                    <th>Chi Tiết</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $row) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>  
                        <td> <?php echo $row['email']?></td>
                        <td><?php echo htmlspecialchars($row['customer_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['customer_address']); ?></td>
                        <td><?php echo htmlspecialchars($row['customer_phone']); ?></td>
                        <td><?php echo htmlspecialchars($row['notes']); ?></td>
                        <td><?php echo number_format($row['total_price'], 0, ',', '.'); ?> đ</td>
                        <td><?php echo $row['created_at']; ?></td>
                        <td><a href="/admin/modules/quanlydonhang/data.php?id=<?php echo $row['id']; ?>">Xem chi tiết</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } ?>

</body>

</html>