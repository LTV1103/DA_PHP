<?php
include("./admin/config/config.php");


if (isset($_GET['idDanhmuc'])) {
    $idDanhmuc = $_GET['idDanhmuc'];
    $sql = "SELECT * FROM tbl_categories WHERE id_category = $idDanhmuc";
    $query = mysqli_query($mysqli, $sql);

    if ($query && mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        $categoryName = $row['name'];
        $title = $categoryName;
    }
}

if (isset($_GET['quanly'])) {
    $action = $_GET['quanly'];
} else {
    $action = "";
}

if ($action == "danhmucsanpham") {
    if (!isset($categoryName)) {
        $title = "Sản phẩm";
    } else {
        $title = "Mô hình " . $categoryName;
    }
} elseif ($action == "giohang") {
    $title = "Giỏ Hàng";
} elseif ($action == "thanhtoan") {
        $title = "Thanh Toan";
} elseif ($action == "lienhe") {
    $title = "Liên Hệ";
} else {
    $title = "Trang Chủ";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <title><?php echo $title ?></title>
</head>

<body>
    <div class="wrapper">

        <?php
        include("./admin/config/config.php");

        include("./module/menu.php");
        include("./module/main.php");
        include("./module/footer.php");
        ?>




    </div>


</body>

</html>