<?php
include("../../config/config.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['btnAdd'])) {
        // Thêm phương thức thanh toán
        $tenPTTT = $_POST['tenPTTT'];
        if (!empty($tenPTTT)) {
            $stmt = $pdo->prepare("INSERT INTO tbl_payments (payment_method) VALUES (:payment_method)");
            $stmt->execute(['payment_method' => $tenPTTT]);
        }
        header("Location: ../../index.php?action=quanlythanhtoan&query=them&message=success");
        exit();
    } elseif (isset($_POST['btnEdit'])) {
        // Sửa phương thức thanh toán
        $newName = $_POST['tenPTTT'];
        $idTT = intval($_GET['idTT']);

        if (!empty($newName)) {
            $stmt = $pdo->prepare("UPDATE tbl_payments SET payment_method = :name WHERE id_payment = :id");
            $stmt->execute(['name' => $newName, 'id' => $idTT]);
        }
        header("Location: ../../index.php?action=quanlythanhtoan&query=them&message=update");
        exit();
    }
}

// Kiểm tra query string (GET)
if (isset($_GET['idTT'])) {
    $idTT = intval($_GET['idTT']);
    if (isset($_GET['ac']) && $_GET['ac'] === 'delete') {
        // Xóa phương thức thanh toán
        $stmt = $pdo->prepare("DELETE FROM tbl_payments WHERE id_payment = :id");
        $stmt->execute(['id' => $idTT]);
        header("Location: ../../index.php?action=quanlythanhtoan&query=them&message=delSuccess");
        exit();
    }
}
