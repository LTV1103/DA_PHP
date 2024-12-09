<?php
require_once dirname(dirname(__DIR__)) . "/config/config.php";

try {
    // Truy vấn danh mục
    $sql_categories = "SELECT * FROM tbl_categories";
    $stmt_categories = $pdo->prepare($sql_categories);
    $stmt_categories->execute();
    $categories = $stmt_categories->fetchAll(PDO::FETCH_ASSOC);

    if (isset($_POST['sbm'])) {
        $name = $_POST['namepro'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];

        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $id_category = $_POST['id_category'];

        // Chèn dữ liệu sản phẩm vào bảng
        $sql_insert = "INSERT INTO tbl_products (namepro, description, price, stock, image, id_category)
                           VALUES (:namepro, :description, :price, :stock, :image, :id_category)";
        $stmt_insert = $pdo->prepare($sql_insert);
        $stmt_insert->execute([
            'namepro' => $name,
            'description' => $description,
            'price' => $price,
            'stock' => $stock,
            'image' => $image,
            'id_category' => $id_category
        ]);

        // Di chuyển ảnh tải lên
        move_uploaded_file($image_tmp, ROOT . '/image/' . $image);

        // Chuyển hướng
        header('Location: /admin/index.php?action=quanlysanpham&query=load&message=success');
        exit;
    }
} catch (PDOException $e) {
    header('Location: /admin/index.php?action=quanlysanpham&query=load&message=error');

    exit;
}
?>

<div class="card mt-5 mx-auto" style="width: 50%;">
    <div class="card-header">
        <h1>Thêm Sản Phẩm</h1>
    </div>
    <div class="card-body">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group mb-3">
                <label for="">Tên Sản Phẩm</label>
                <input type="text" name="namepro" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="">Mô Tả</label>
                <input type="text" name="description" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="">Giá Tiền</label>
                <input type="number" name="price" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="">Số Lượng</label>
                <input type="number" name="stock" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="">Hình Ảnh Sản Phẩm</label><br>
                <input type="file" name="image" class="form-control-file" required>
            </div>
            <div class="form-group mb-3">
                <label for="">Danh Mục</label>
                <select class="form-control" name="id_category" required>
                    <?php foreach ($categories as $row_cate) { ?>
                        <option value="<?php echo $row_cate['id_category']; ?>">
                            <?php echo htmlspecialchars($row_cate['name']); ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <button name="sbm" class="btn btn-success" type="submit">THÊM SẢN PHẨM</button>
        </form>
    </div>
</div>