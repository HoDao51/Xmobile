<?php
// Mở kết nối
include_once "../../Connection/open.php";

$order_id = $_POST['order_id'];
$status = $_POST['status'];

//Viết sql lấy trạng thái hiện tại của order
$sqlGetStatus = "SELECT Order_status FROM orders WHERE Id = $order_id";
//Chạy sql
$getStatuses = mysqli_query($connection, $sqlGetStatus);
//Lấy status hiện tại
foreach ($getStatuses as $getStatus ) {
        $currentStatus = $getStatus['order_status'];
    }
//chỉ cập nhật trạng thái nếu đơn hàng đang ở trạng thái chờ xử lý
if ($currentStatus == 1 || $currentStatus == 2 || $currentStatus == 3) {
    // không cập nhập
}else{
    $sqlUpdate = "UPDATE orders SET Order_status = $status WHERE Id = $order_id";
    mysqli_query($connection, $sqlUpdate);
}
// Đóng kết nối
include_once "../../Connection/close.php";

// Quay lại trang lịch sử mua hàng
header("Location: ../index.php?action=lichsumuahang&id=$order_id");
exit;
