<?php
// Mở kết nối
include_once "../../Connection/open.php";

$order_id = $_POST['order_id'];
$status = $_POST['status'];

// Lấy trạng thái đơn hàng hiện tại
$sqlCheck = "SELECT Order_status FROM orders WHERE Id = $order_id";
$result = mysqli_query($connection, $sqlCheck);
$row = mysqli_fetch_assoc($result);

// Kiểm tra trạng thái
$currentStatus = $row['Order_status'];

$canUpdate = true;
if ($currentStatus == 2 || $currentStatus == 3) {
    // Nếu đơn đã giao (2) hoặc đã hủy (3) thì không cho phép cập nhật
    $canUpdate = false;
}

if ($canUpdate) {
    $sqlUpdate = "UPDATE orders SET Order_status = $status WHERE Id = $order_id";
    mysqli_query($connection, $sqlUpdate);
}

// Đóng kết nối
include_once "../../Connection/close.php";

// Quay lại trang lịch sử mua hàng
header("Location: ../index.php?action=lichsumuahang&id=$order_id");
exit;
