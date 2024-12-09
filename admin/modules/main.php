<div class="main_content">
    <?php
    if (isset($_GET['action']) && $_GET['query']) {
        $t = $_GET['action'];
        $query = $_GET['query'];
    } else {
        $t = '';
    }
    //danh mục
    if ($t == 'quanlydanhmuc' && $query == 'them') {
        include("modules/quanlydanhmuc/add.php");
        include("modules/quanlydanhmuc/loaddata.php");
    } 
    elseif ($t == 'quanlydanhmuc' && $query == 'sua') {
        include("modules/quanlydanhmuc/edit.php");
    } 
    //sản phẩm
    elseif ($t == 'quanlysanpham' && $query == 'load') {
        include("modules/quanlysanpham/loaddata.php");
    } 
    elseif ($t == 'quanlysanpham' && $query == 'them') {
        include("modules/quanlysanpham/add.php");
    } 
    elseif ($t == 'quanlysanpham' && $query == 'sua') {
        include("modules/quanlysanpham/edit.php");
    } 
    //thanh toán
    elseif ($t == 'quanlythanhtoan' && $query == 'them') {
        include("modules/quanlythanhtoan/index.php");
    }elseif ($t == 'quanlythanhtoan' && $query == 'sua') {
        include("modules/quanlythanhtoan/edit.php");
    }
    //đơn hàng
    elseif ($t == 'quanlydonhang' && $query == 'them') {
        include("modules/quanlydonhang/loaddata.php");
    } else {
        include("modules/dashboard.php");
    }




    ?>
</div>