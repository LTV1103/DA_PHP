<?php
if (isset($_POST['btn_Gui'])) {
    $name = $_POST['name'];
    $phone_number = $_POST['phone_number'];
    $message = $_POST['message'];

    try {
        $sql = "INSERT INTO tbl_contact (name, phone, content) VALUES (:name, :phone, :content)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone_number, PDO::PARAM_STR);
        $stmt->bindParam(':content', $message, PDO::PARAM_STR);

        $stmt->execute();
        header("Location: ?");
    } catch (PDOException $e) {
        echo "Lỗi khi thêm dữ liệu!";
    }
}
?>




<div class="contact">
    <div class="breadcrumb">
        <!-- <a href="javascript:history.back()">Quay lại</a> -->
    </div>
    <div class="contact-info">
        <div class="socials socials-icons">
            <a href="#"><i class="fa-brands fa-facebook"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-twitter"></i></a>
            <a href="https://github.com/LTV1103/DA_PHP"><i class="fa-brands fa-github"></i></a>
        </div>
        <div class="form_contact">
            <form class="contact-form" method="POST">
                <label for="name">Họ và tên:</label>
                <input type="text" id="name" name="name" required>
                <label for="name">Số điện thoại:</label>
                <input type="number" id="phone_number" name="phone_number" required>

                <label for="message">Nội dung:</label>
                <textarea id="message" name="message" required></textarea>

                <button type="submit" name="btn_Gui">Gửi thắc mắc</button>
            </form>

        </div>

    </div>
</div>