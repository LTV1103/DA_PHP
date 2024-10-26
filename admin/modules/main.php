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

    }else{
        include("dashboard.php");
    }


    ?>
</div>