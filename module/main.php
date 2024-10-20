<div id="main">
    <?php
    include("sidebar/sidebar.php");
    ?>
    <div class="main_content">
        
        <?php
        if (isset($_GET['quanly'])) {
            $t = $_GET['quanly'];
        } else {
            $t = '';
        }
        if ($t == 'danhmucsanpham') {
            include("main/sanpham.php");
        } elseif ($t == 'giohang') {
            include("main/giohang.php");
        } elseif ($t == 'lienhe') {
            include("main/lienhe.php");
        } else {
            include("main/index_mainContent.php");
        }
        ?>

    </div>
</div>