<?php
require_once dirname(dirname(__DIR__)) . "/config/config.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Chuẩn bị câu truy vấn xóa sản phẩm
        $sql = "DELETE FROM tbl_products WHERE id_product = :id";
        $stmt = $pdo->prepare($sql);

        // Thực thi truy vấn với tham số
        $stmt->execute([':id' => $id]);

        // Chuyển hướng sau khi xóa thành công
        header('Location: /admin/index.php?action=quanlysanpham&query=load&message=delSuccess');
        exit;
    } catch (PDOException $e) {
        header('Location: /admin/index.php?action=quanlysanpham&query=load&message=error');
        exit;
    }
} else {
    header('Location: /admin/index.php?action=quanlysanpham&query=load&message=');
    exit;
}
?>
