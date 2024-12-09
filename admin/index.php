<?php
include("config/config.php");

if (!isset($_SESSION['login'])) {
    header('Location:login.php');
}

$timeout = 600; // 10 phút

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $timeout)) {
    session_unset();
    session_destroy();
    header("Location: login.php?status=timeout");
    exit();
}
$_SESSION['last_activity'] = time();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/styleadmin.css">
    <link rel="stylesheet" type="text/css" href="./css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="shortcut icon" type="image/png" href="/image/admin.jpg">
    <title>Admin</title>
</head>

<body>
    <div class="hidden" id="notification">
    </div>
    <div class="wrapper">
        <?php
        
        include("./modules/menu.php");
        include("./modules/main.php");
        ?>
    </div>
</body>
<script src="/javascript/notification.js"></script>

</html>