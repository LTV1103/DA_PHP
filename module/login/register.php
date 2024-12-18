<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="/css/login.css">
</head>

<body>
    <div class="form-container">
        <h2>Đăng Ký</h2>
        <form action="/module/login/controll.php" method="POST">
            <div class="input-group">
                <label for="name">Tên:</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required autocomplete="off">
            </div>

            <div class="input-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password" required autocomplete="new-password">
            </div>

            <div class="button-group">
                <button type="submit">Đăng Ký</button>
            </div>
        </form>
        <a href="./login.php" class="link-register">Đăng nhập</a>

    </div>
</body>
<script src="/javascript/notification.js"></script>
</html>