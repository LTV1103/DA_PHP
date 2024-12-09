<?php
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

try {
    $sql_product = "SELECT * FROM tbl_products WHERE id_product = :id LIMIT 1";
    $stmt = $pdo->prepare($sql_product);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC); 
} catch (PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
    exit();
}
?>

<div class="product-details">
    <?php if ($product) { ?>
        <div class="product-image">
            <img src="./image/<?php echo htmlspecialchars($product['image'], ENT_QUOTES, 'UTF-8'); ?>?height=300&width=300" alt="Product Image">
        </div>
        <form action="/module/main/capnhatgiohang.php?idsp=<?php echo $product['id_product']; ?>" method="post">
            <div class="product-info">
                <h1 class="product-name"><?php echo htmlspecialchars($product['namepro'], ENT_QUOTES, 'UTF-8'); ?></h1>
                <p class="product-price"><?php echo number_format($product['price'], 0, ',', '.'); ?>₫</p>
            </div>
         
            <div class="button-group">
                <button class="button button-secondary" name="themgiohang">
                    <i data-lucide="shopping-cart"></i>
                    Thêm giỏ hàng
                </button>
            </div>
            <div class="product-description">
                <h2>Mô tả:</h2>
                <p><?php echo htmlspecialchars($product['description'], ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
        </form>
    <?php } else { ?>
        <p>Không tìm thấy sản phẩm.</p>
    <?php } ?>
</div>