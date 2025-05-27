<?php
    include_once "../../../connection/open.php";

    // Lấy dữ liệu từ form
    $id = $_POST["id"];
    $images = $_FILES["image"]["name"];
    $name = $_POST["Name"];
    $ram = $_POST["Ram"];
    $chip = $_POST["Chip"];
    $rom = $_POST["Rom"];
    $sim = $_POST["Sim"];
    $mobile_network = $_POST["Mobile_Network"];
    $resolution = $_POST["Resolution"];
    $screen_size = $_POST["Screen_size"];
    $camera = $_POST["Camera"];
    $operating_system = $_POST["Operating_System"];
    $battery_capacity = $_POST["Battery_Capacity"];
    $color = $_POST["Color"];
    $price = $_POST["Price"];
    $brand = $_POST["Brand"];
    $type = $_POST["Type"];
    $description = $_POST["Description"];

    //Viết sql
    if($images == null){
        // Update sản phẩm
        $sql_products = "UPDATE products 
            SET Name='$name', Ram='$ram', Chip='$chip', Rom='$rom', Sim='$sim', Mobile_Network='$mobile_network', 
                Resolution='$resolution', Screen_size='$screen_size', Camera='$camera', Operating_System='$operating_system', 
                Battery_Capacity='$battery_capacity', Color='$color', Price='$price', Brand='$brand', Type='$type', 
                Description='$description' 
                WHERE Id = '$id'";
        mysqli_query($connection, $sql_products);
    } else {
        // Update sản phẩm
        $sql_products = "UPDATE products 
            SET Name='$name', Ram='$ram', Chip='$chip', Rom='$rom', Sim='$sim', Mobile_Network='$mobile_network', 
                Resolution='$resolution', Screen_size='$screen_size', Camera='$camera', Operating_System='$operating_system', 
                Battery_Capacity='$battery_capacity', Color='$color', Price='$price', Brand='$brand', Type='$type', 
                Description='$description' 
                WHERE Id = '$id'";
        mysqli_query($connection, $sql_products);

        // update ảnh
        $sql_images = "UPDATE images SET Name='$images' WHERE Product_id='$id'";
        mysqli_query($connection, $sql_images);
        // Kiểm tra nếu ảnh hợp lệ và chưa có trong thư mục thì lưu
        if ($_FILES["image"]["error"] == 0 && !file_exists("../images/" . $images)) {
        $path = $_FILES["image"]["tmp_name"];
        move_uploaded_file($path, "../images/" . $images);
}
    }
    // Đóng kết nối
    include_once "../../../connection/close.php";

    // Quay về danh sách sản phẩm
    header("Location: ../index.php?action=quanlysanpham");
?>
