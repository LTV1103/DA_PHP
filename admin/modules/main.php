<div class="main_content">
    <?php
    if (isset($_GET['action'])) {
        $t = $_GET['action'];
    } else {
        $t = '';
    }
    if($t == 'quanlidanhmuc'){
        include("quanlidanhmuc/add.php");
        include("quanlidanhmuc/loaddata.php");

    }else if ($t == 'quanlisanpham') {
        include("quanlisanpham/add.php");
        include("quanlisanpham/loaddata.php");

    }else{
        include("dashboard.php");
    }


    ?>
</div>