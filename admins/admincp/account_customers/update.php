<?php
    // Lấy dữ liệu từ form
    $id = $_POST["id"];
    $name = $_POST["Name"];
    $phone = $_POST["Phone"];
    $address = $_POST["Address"];
    $email = $_POST["Email"];
    $password = $_POST["Password"];

    // Mở kết nối
    include_once "../../../Connection/open.php";

    // Kiểm tra email đã tồn tại (ngoại trừ chính người dùng đang sửa)
    $checkEmail = "SELECT *, COUNT(Id) AS count_id FROM customers WHERE Email = '$email' AND Id != '$id'";
    $results = mysqli_query($connection, $checkEmail);
    foreach ($results as $result) {
        if ($result['count_id'] == 0) {
            // Viết sql để cập nhật
            $sql = "UPDATE customers SET Name='$name', Phone='$phone', Address='$address', Email='$email', Password='$password' WHERE Id='$id'";
            // Chạy sql
            mysqli_query($connection, $sql);
            // Quay về danh sách
            header("location: ../index.php?action=quanlytaikhoankhachhang");
        } else {
            // Email đã tồn tại
            echo "<script>
                alert('Email đã tồn tại! Vui lòng sử dụng email khác!');
                window.location.href = '../index.php?action=quanlytaikhoankhachhang';
            </script>";      
        }
    }

    // Đóng kết nối
    include_once "../../../Connection/close.php";
?>
