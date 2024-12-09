<?php
require_once dirname(dirname(__DIR__)) . "/admin/config/config.php";

if (isset($_GET['status']) && $_GET['status'] == 'logout') {
    session_unset();
    session_destroy();
    header("Location: ./login.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btnLogin'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        try {
            // Tìm người dùng dựa trên email
            $sql = "SELECT * FROM tbl_users WHERE email = :email AND role = :role";
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':role', $role, PDO::PARAM_STR);

            $role = 'user';

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $us = $stmt->fetch();
                // Kiểm tra mật khẩu
                if (password_verify($password, $us['password'])) {
                    // Mật khẩu đúng, lưu thông tin vào session
                    $_SESSION['loginUser'] = $us['name'];
                    $_SESSION['idUser'] = $us['id_user'];
                    header('Location: ../../index.php');
                } else {
                    // Sai mật khẩu
                    header('Location:login.php?error=invalidPassword');
                }
            } else {
                // Không tìm thấy người dùng
                header('Location:login.php?error=userNotFound');
            }
        } catch (PDOException $e) {
            header('Location:login.php?error=dbError');
        }
    } else {
        // Xử lý đăng ký ở đây (để nguyên như code cũ)
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (strlen($password) < 8) {
            header("Location: ./register.php?error=pass");
            exit();
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ./register.php?error=email");
            exit();
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        try {
            $stmt = $pdo->prepare("SELECT * FROM tbl_users WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch();

            if ($user) {
                header("Location: ?&error=emailInvalid");
            } else {
                $stmt = $pdo->prepare("INSERT INTO tbl_users (name, email, password, role) VALUES (?, ?, ?, 'user')");
                $stmt->execute([$name, $email, $hashedPassword]);

                header("Location: ../../index.php?message=success");
            }
        } catch (PDOException $e) {
            header("Location: ?error");
        }
    }
}
