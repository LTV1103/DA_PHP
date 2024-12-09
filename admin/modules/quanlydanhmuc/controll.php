<?php
include("../../config/config.php");

if (isset($_POST['btnAdd'])) {
    $tenDanhmuc = $_POST['tenDanhmuc'];
    if (!empty($tenDanhmuc)) {
        try {
            $sql_add = "INSERT INTO tbl_categories (name) VALUES (:name)";
            $stmt = $pdo->prepare($sql_add);
            $stmt->bindParam(':name', $tenDanhmuc, PDO::PARAM_STR);
            if ($stmt->execute()) {
                header('Location:../../index.php?action=quanlydanhmuc&query=them&message=success');
                exit();
            } else {
                header('Location:../../index.php?action=quanlydanhmuc&query=them&message=error');
            }
        } catch (PDOException $e) {
            header('Location:../../index.php?action=quanlydanhmuc&query=them&message=error');
        }
    } else {
        header('Location:../../index.php?action=quanlydanhmuc&query=them&message=empty');
    }
} elseif (isset($_POST['btnEdit'])) {
    $tenDanhmuc = $_POST['suaDanhmuc'];
    if (!empty($tenDanhmuc)) {
        try {
            $sql_update = "UPDATE tbl_categories SET name = :name WHERE id_category = :id";
            $stmt = $pdo->prepare($sql_update);
            $stmt->bindParam(':name', $tenDanhmuc, PDO::PARAM_STR);
            $stmt->bindParam(':id', $_GET['idDanhmuc'], PDO::PARAM_INT);
            if ($stmt->execute()) {
                header('Location:../../index.php?action=quanlydanhmuc&query=them&message=update');
                exit();
            } else {
                header('Location:../../index.php?action=quanlydanhmuc&query=them&message=error');
            }
        } catch (PDOException $e) {
            header('Location:../../index.php?action=quanlydanhmuc&query=them&message=error');
        }
    } else {
        header('Location:../../index.php?action=quanlydanhmuc&query=them&message=empty');
    }
} else {
    $id = $_GET['idDanhmuc'];
    try {
        $sql_delete = "DELETE FROM tbl_categories WHERE id_category = :id";
        $stmt = $pdo->prepare($sql_delete);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            header('Location:../../index.php?action=quanlydanhmuc&query=them&message=delSuccess');
            exit();
        } else {
            header('Location:../../index.php?action=quanlydanhmuc&query=them&message=error');
        }
    } catch (PDOException $e) {
        header('Location:../../index.php?action=quanlydanhmuc&query=them&message=error');
    }
}
