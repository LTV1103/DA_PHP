<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/styleadmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <title>Admin</title>
</head>

<body>
    <div class="wrapper">
        <?php
        include("config/config.php");
        include("./modules/menu.php");
        include("./modules/main.php");
        // include("./modules/footer.php");

        ?>
    </div>
</body>

</html>