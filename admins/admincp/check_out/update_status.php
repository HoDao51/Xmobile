<?php
//mở kết nối
include_once "../../../Connection/open.php";

$order_id = $_POST['order_id'];
$status = $_POST['status'];

$sqlUpdate = "UPDATE orders SET Order_status = $status WHERE Id = $order_id";
mysqli_query($connection, $sqlUpdate);

//đóng kết nối
include_once "../../../Connection/close.php";

// Quay lại trang chi tiết đơn hàng
header("Location: ../index.php?action=chitietdonhang&id=$order_id");
exit;
