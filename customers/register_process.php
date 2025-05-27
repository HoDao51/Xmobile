<?php
    //Lấy dữ liệu trong form
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    //Mở kết nối
    include_once "../Connection/open.php";
    //Viết sql
    $sql = "INSERT INTO customers (Name, Phone, Address, Email, Password) VALUES ('$name', '$phone', '$address', '$email', '$password')";
    //Chạy sql
    mysqli_query($connection, $sql);
    //Đóng kết nối
    include_once "../Connection/close.php";
    //Quay về danh sách
    header("location: register.php?success=1");
?>