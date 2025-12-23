<?php
session_start();
// Kết nối DB (Copy y hệt file trên)
$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "user";

$conn = new mysqli($servername, $username_db, $password_db, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : "Khách";
    $ten_bai = $_POST['ten_bai'];
    $diem = $_POST['diem'];
    $thoi_gian = $_POST['thoi_gian'];

    $sql = "INSERT INTO ket_qua_thi (username, ten_bai_thi, diem_so, thoi_gian_lam)
            VALUES ('$username', '$ten_bai', '$diem', '$thoi_gian')";

    if ($conn->query($sql) === TRUE) {
        echo "Lưu thành công";
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
$conn->close();
?>