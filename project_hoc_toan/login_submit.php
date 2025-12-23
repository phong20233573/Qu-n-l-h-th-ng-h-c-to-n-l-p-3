<?php
session_start(); // Khởi động phiên làm việc (Session)
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Lấy thông tin user từ database
    $sql = "SELECT * FROM users WHERE username = '$user'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Kiểm tra mật khẩu (So sánh pass nhập vào với pass mã hóa trong DB)
        if (password_verify($pass, $row['password'])) {
            // Đăng nhập THÀNH CÔNG -> Lưu thông tin vào Session
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];

            // Chuyển hướng vào trang chủ
            header("Location: index.php"); 
        } else {
            echo "<script>alert('Sai mật khẩu!'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Tài khoản không tồn tại!'); window.history.back();</script>";
    }
}
$conn->close();
?>