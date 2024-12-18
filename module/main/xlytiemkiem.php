<?php
require_once dirname(dirname(__DIR__)) . "/admin/config/config.php";

$products = []; 
$search = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
    $search = trim($_POST['search']); 

    if (!empty($search)) {
        // Truy vấn tìm kiếm sản phẩm
        $sql = "SELECT * FROM tbl_products WHERE namepro LIKE :search";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC); // Lấy tất cả kết quả
    }
}
?>

<!-- Giao diện form tìm kiếm -->
<div class="search-box">
    <form action="" method="post">
        <input type="text" name="search" placeholder="Tìm kiếm">
        <button type="submit" class="btn-serach"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
</div>

<!-- Hiển thị danh sách sản phẩm -->
<div class="product_list">
    <?php if (!empty($products)) { ?>
        <p>Có <?php echo count($products); ?> kết quả từ "<?php echo htmlspecialchars($search, ENT_QUOTES, 'UTF-8'); ?>"</p>
        <?php foreach ($products as $row) { ?>
            <a href="index.php?quanly=sanpham&id=<?php echo $row['id_product']; ?>">
                <div class="product_item">
                    <div class="product_image">
                        <img src="./image/<?php echo htmlspecialchars($row['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="Product Image">
                    </div>
                    <div class="product_info">
                        <p class="title_product"><?php echo htmlspecialchars($row['namepro'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="product_info">
                        <p class="price_product"><?php echo number_format($row['price'], 0, ',', '.'); ?>₫</p>
                    </div>
                    <div class="box_buy">
                        <button class="buy-now">Mua Ngay</button>
                        <a href="#" class="cart-icon">
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                    </div>
                </div>
            </a>
        <?php } ?>
    <?php } ?>
</div>