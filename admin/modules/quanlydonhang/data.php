<?php
require_once dirname(dirname(__DIR__)) . "/config/config.php";


if (isset($_GET['id'])) {
    $orderId = $_GET['id'];

    try {
        // Truy vấn đơn hàng
        $sql_order = " SELECT tbl_users.email ,tbl_order.id,tbl_order.customer_name,tbl_order.customer_address,tbl_order.customer_phone,tbl_order.notes,tbl_order.total_price,tbl_order.total_price,tbl_order.created_at 
        FROM tbl_users JOIN tbl_order ON tbl_users.id_user = tbl_order.id_user WHERE id = :id";
        $stmt_order = $pdo->prepare($sql_order);
        $stmt_order->execute(['id' => $orderId]);
        $order = $stmt_order->fetch(PDO::FETCH_ASSOC);

        // Nếu không tìm thấy đơn hàng
        if (!$order) {
            exit;
        }

        // Truy vấn chi tiết đơn hàng
        $sql_order_details = "SELECT tbl_products.namepro , tbl_order_details.quantity ,tbl_order_details.price , tbl_order_details.order_id  
        FROM tbl_order_details JOIN tbl_products ON tbl_order_details.product_id = tbl_products.id_product  WHERE order_id = :order_id";
        $stmt_order_details = $pdo->prepare($sql_order_details);
        $stmt_order_details->execute(['order_id' => $orderId]);
        $order_details = $stmt_order_details->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Lỗi truy vấn: " . $e->getMessage();
        exit;
    }
} else {
   
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #f4f4f4;
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        table th {
            background-color: #2a9d8f;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>

<body>

    <h2>Chi tiết đơn hàng  <?php echo htmlspecialchars($order['email']); ?></h2>
    <h3>Thông tin đơn hàng</h3>
    <p>Tên khách hàng: <?php echo htmlspecialchars($order['customer_name']); ?></p>
    <p>Địa chỉ: <?php echo htmlspecialchars($order['customer_address']); ?></p>
    <p>Số điện thoại: <?php echo htmlspecialchars($order['customer_phone']); ?></p>
    <p>Ghi chú: <?php echo htmlspecialchars($order['notes']); ?></p>
    <p>Tổng tiền: <?php echo number_format($order['total_price'], 0, ',', '.'); ?> đ</p>
    <p>Ngày tạo: <?php echo htmlspecialchars($order['created_at']); ?></p>

    <h3>Chi tiết sản phẩm</h3>
    <table>
        <thead>
            <tr>
                <th>Mã Đơn</th>
                <th>Tên Sản Phảm</th>
                <th>Số Lượng</th>
                <th>Giá</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($order_details as $detail): ?>
                <tr>
                    <td><?php echo htmlspecialchars($detail['order_id']); ?></td>
                    <td><?php echo htmlspecialchars($detail['namepro']); ?></td>
                    <td><?php echo htmlspecialchars($detail['quantity']); ?></td>
                    <td><?php echo number_format($detail['price'], 0, ',', '.'); ?> đ</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="/admin/index.php?action=quanlydonhang&query=them">Quay lại</a>

</body>

</html>