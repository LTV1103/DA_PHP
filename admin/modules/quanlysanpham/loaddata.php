<?php
require_once dirname(dirname(__DIR__)) . "/config/config.php";

try {
    // Truy vấn lấy danh sách sản phẩm
    $sqlsp = "SELECT tbl_products.*, tbl_categories.name AS category_name 
                  FROM tbl_products 
                  INNER JOIN tbl_categories ON tbl_products.id_category = tbl_categories.id_category";
    $stmt = $pdo->prepare($sqlsp);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Lỗi truy vấn!";
    exit;
}
?>

<div class="form_addCate_item">
    <div class="card">
        <div class="card-header">
            <h2>DANH SÁCH SẢN PHẨM</h2>
            <a class="btn btn-success" href="?action=quanlysanpham&query=them">Thêm</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>TT</th>
                        <th>Tên</th>
                        <th>Mô Tả</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Ảnh</th>
                        <th>Danh Mục</th>
                        <th colspan="2">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($products as $row) { ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo htmlspecialchars($row['namepro']); ?></td>
                            <td><?php echo htmlspecialchars($row['description']); ?></td>
                            <td><?php echo number_format($row['price'], 0); ?> VND</td>
                            <td><?php echo htmlspecialchars($row['stock']); ?></td>
                            <td>
                                <img src=".././image/<?php echo htmlspecialchars($row['image']); ?>" width="100px">
                            </td>
                            <td><?php echo htmlspecialchars($row['category_name']); ?></td>
                            <td><a class="btn btn-secondary" href="?action=quanlysanpham&query=sua&id=<?php echo $row['id_product']; ?>">Sửa</a></td>
                            <td><a class="btn btn-danger delete-btn" href="./modules/quanlysanpham/remove.php?id=<?php echo $row['id_product']; ?>">Xóa</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>