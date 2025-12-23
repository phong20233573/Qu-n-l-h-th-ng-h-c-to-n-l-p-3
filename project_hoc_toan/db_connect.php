<?php
$servername = "localhost";
$username = "root";  // Tên mặc định của XAMPP
$password = "";      // Mật khẩu mặc định là rỗng
$dbname = "user"; // Tên database vừa tạo ở Bước 1

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
// Để gõ tiếng Việt không bị lỗi font
$conn->set_charset("utf8");
?>