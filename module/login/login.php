

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="/css/login.css">

</head>

<body>
    <div class="container">
        <form class="login-form" action="/module/login/controll.php" method="post">
            <h2>Login</h2>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="" id="email" name="email" >
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" >
            </div>
            <button type="submit" name="btnLogin">Log In</button>
        </form>
        <a href="./register.php" class="link-register">Đăng ký ở đây</a>
    </div>
</body>
<script src="/javascript/notification.js"></script>

</html>