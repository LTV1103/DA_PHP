<div class="menu">
    <ul class="list_menu">
        <li><a href="index.php">Trang Chủ</a></li>
        <li><a href="index.php?quanly=danhmucsanpham">Sản Phẩm</a></li>
        <li><a href="index.php?quanly=giohang">Giỏ Hàng</a></li>
        <li><a href="index.php?quanly=lienhe">Liên Hệ</a></li>
        <li><i class="fas fa-user user-icon"></i>
            <div class="dropdown-menu">
                <?php if (isset($_SESSION['loginUser'])) { ?>
                    <a style="color: #000;" href="/module/login/controll.php?status=logout" class="btn_action">Logout <?php echo $_SESSION['loginUser']?></a>
                <?php  } else { ?>
                    <a style="color: #000;" href="/module/login/register.php" class="btn_action">Đăng ký</a>
                    <a style="color: #000;" href="/module/login/login.php" class="btn_action">Đăng nhập</a>
                <?php } ?>
            </div>
        </li>
    </ul>
</div>