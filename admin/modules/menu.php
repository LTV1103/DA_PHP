<?php
if (isset($_GET['status']) == 'logout') {
    unset($_SESSION['login']);
    header('Location:login.php');
}
?>

<div>
    <h1 style="color: blue; text-align: center;">Admin</h1>
</div>

<div class="nav_bar">
    <ul>
        <li><a href="index.php?action=quanlydanhmuc&query=them">Quản lí danh mục</a></li>
        <li><a href="index.php?action=quanlysanpham&query=load">Quản lí sản phẩm</a></li>
        <li><a href="index.php?action=quanlydonhang&query=them">Quản lí đơn hàng</a></li>
        <li><a href="index.php?status=logout">Đăng Xuất | <?php if (isset($_SESSION['login'])) {
                                                                echo $_SESSION['login'];
                                                            } ?></a></li>

    </ul>
</div>