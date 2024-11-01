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
        include("quanlisanpham/loaddata.php");

    }
    else if ($t == 'quanlisanpham/add.php') {
        include("quanlisanpham/add.php");
    }
    else if ($t == 'quanlisanpham/remove.php') {
        include("quanlisanpham/remove.php");
    }
    
    
    
    else{
        include("dashboard.php");
    }


    ?>
</div>