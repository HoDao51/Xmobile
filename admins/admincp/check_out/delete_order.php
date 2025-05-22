<?php
session_start();
//mở kết nối
include_once "../../../Connection/open.php";

// Nhận ID đơn hàng từ URL
$order_id = $_GET['id'];

// Xóa chi tiết đơn hàng trước
$sqlDeleteDetails = "DELETE FROM order_details WHERE Order_id = $order_id";
mysqli_query($connection, $sqlDeleteDetails);

// Sau đó xóa đơn hàng
$sqlDeleteOrder = "DELETE FROM orders WHERE Id = $order_id";
mysqli_query($connection, $sqlDeleteOrder);

// Quay lại trang quản lý đơn hàng
header("Location: ../index.php?action=quanlydonhang");
//đóng kết nối
include_once "../../../Connection/close.php";
?>
