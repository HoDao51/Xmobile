<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng kí</title>
    <link rel="shortcut icon" type="image/png" href="../images/header/logo.png">
    <!-- Kết nối với Font Awesome qua CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/style_login.css">
</head>
<body>
<?php
    //Mở kết nối
    include_once "../../connection/open.php";
    //Viết sql
    $sql = "SELECT * FROM customers";
    //Chạy sql
    $customers = mysqli_query($connection, $sql);
    //Đóng kết nối
    include_once "../../connection/close.php";
?>
<?php
        if(isset($_GET["success"])){
            $error = $_GET["success"];
        } else {
            $error = "";
        }
        if($error == "1"){
            echo "<script>alert('Đăng kí thành công!');</script>";   
        }
    ?>
    <div class="container">
        <h2>Đăng Ký</h2>
        <form method="post" action="register_process.php">
            <div class="input-group">
                <label for="name">TÊN</label>
                <i class="fas fa-user"></i>
                <input type="text" id="name" name="name" placeholder="Nhập tên của bạn" required>
            </div>
            <div class="input-group">
                <label for="phone">DIỆN THOẠI</label>
                <i class="fas fa-phone"></i>
                <input type="tel" id="phone" name="phone" placeholder="Nhập số điện thoại" required>
            </div>
            <div class="input-group">
                <label for="password">MẬT KHẨU</label>
                <i class="fas fa-lock"></i>
                <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
            </div>
            <div class="input-group">
                <label for="address">ĐỊA CHỈ</label>
                <i class="fas fa-map-marker-alt"></i>
                <input type="text" id="address" name="address" placeholder="Nhập địa chỉ của bạn" required>
            </div>
            <div class="input-group">
                <label for="email">EMAIL</label>
                <i class="fa-solid fa-envelope"></i>
                <input type="email" id="email" name="email" placeholder="Nhập email của bạn" required>
            </div>
            <button type="submit" class="signup-btn">ĐĂNG KÝ</button>
            <div class="login-link">
                Đã có tài khoản? <a href="login.php">Đăng nhập</a>
            </div>
        </form>
    </div>
</body>
</html>