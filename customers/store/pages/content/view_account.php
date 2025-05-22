<?php
//lấy id khách hàng
$customerId = $_SESSION["customer_id"];
// Mở kết nối
include_once "../../connection/open.php";

// Lấy thông tin tài khoản người dùng
$sql = "SELECT * FROM customers WHERE Id = $customerId";
//chạy query
$customer = mysqli_query($connection, $sql);

// Đóng kết nối
include_once "../../connection/close.php";
?>

<link rel="stylesheet" href="css/style_table.css">

<div class="container mx-auto max-w-3xl p-4">
    <h2 class="text-2xl font-semibold mb-4">Thông tin tài khoản của bạn</h2>
    <?php
        foreach ($customer as $customer) {
    ?>
        <table class="w-full table-auto border border-gray-300 text-left text-sm">
            <tbody>
                <tr class="border-b">
                    <th class="p-3 bg-gray-100 w-1/4">Họ và tên:</th>
                    <td class="p-3"><?php echo $customer['Name']; ?></td>
                </tr>
                <tr class="border-b">
                    <th class="p-3 bg-gray-100">Email:</th>
                    <td class="p-3"><?php echo $customer['Email']; ?></td>
                </tr>
                <tr class="border-b">
                    <th class="p-3 bg-gray-100">Mật khẩu:</th>
                    <td class="p-3">*********</td>
                </tr>
                <tr class="border-b">
                    <th class="p-3 bg-gray-100">Số điện thoại:</th>
                    <td class="p-3"><?php echo $customer['Phone']; ?></td>
                </tr>
                <tr class="border-b">
                    <th class="p-3 bg-gray-100">Địa chỉ:</th>
                    <td class="p-3"><?php echo $customer['Address']; ?></td>
                </tr>
            </tbody>
        </table>
    <?php
        }
    ?>
    <div class="mt-6">
        <a href="index.php?action=suataikhoan" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Sửa thông tin
        </a>
        <a href="../logout.php" class="bg-red-500 px-4 py-2 rounded inline-block ml-3 text-white hover:bg-red-700">
            Đăng xuất
        </a>
    </div>
</div>
