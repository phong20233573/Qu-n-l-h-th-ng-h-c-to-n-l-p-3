<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $role = $_POST['role'];

    // Kiểm tra xem đã điền đủ chưa
    if(empty($user) || empty($pass) || empty($role)){
        echo "Vui lòng điền đầy đủ thông tin!";
        exit;
    }

    // Mã hóa mật khẩu (Bảo mật: không lưu pass thô 123456 mà lưu mã hóa)
    $pass_hash = password_hash($pass, PASSWORD_DEFAULT);

    // Kiểm tra xem tên đăng nhập đã tồn tại chưa
    $check = "SELECT * FROM users WHERE username = '$user'";
    $result = $conn->query($check);

    if ($result->num_rows > 0) {
        echo "<script>alert('Tên tài khoản này đã có người dùng!'); window.history.back();</script>";
    } else {
        // Lưu vào database
        $sql = "INSERT INTO users (username, password, role) VALUES ('$user', '$pass_hash', '$role')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>
                alert('Đăng ký thành công! Hãy đăng nhập ngay.');
                window.location.href = 'login.html';
            </script>";
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    }
}
$conn->close();
?>