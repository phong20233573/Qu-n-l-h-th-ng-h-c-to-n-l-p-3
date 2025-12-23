<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}
// 1. KẾT NỐI DATABASE (Tên database là 'user' như bạn đã sửa)
$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "user"; 

$conn = new mysqli($servername, $username_db, $password_db, $dbname);
if ($conn->connect_error) { die("Kết nối thất bại: " . $conn->connect_error); }

// 2. LẤY THÔNG TIN USER
// Nếu chưa đăng nhập thì hiện là "Khách"
$current_user = isset($_SESSION['username']) ? $_SESSION['username'] : "Khách";

// ID giả lập (hoặc bạn có thể query lấy ID thật từ bảng users)
$user_id_fake = "38746555"; 

// 3. LẤY DỮ LIỆU ĐIỂM
$sql = "SELECT * FROM ket_qua_thi WHERE username = '$current_user' ORDER BY ngay_thi DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bảng điểm cá nhân</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f4f4f4; margin: 0; padding: 20px; position: relative; }
        
        /* --- NÚT THOÁT VỀ TRANG CHỦ (Góc phải) --- */
        .btn-home {
            position: absolute;
            top: 20px; right: 20px;
            text-decoration: none;
            color: #555;
            font-weight: bold;
            display: flex; align-items: center; gap: 8px;
            background: white; padding: 10px 20px; border-radius: 30px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: 0.2s; border: 1px solid #ddd;
        }
        .btn-home:hover { background: #0096ff; color: white; border-color: #0096ff; }

        /* HEADER PROFILE CARD */
        .profile-card {
            background: white; padding: 20px; border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05); display: flex; align-items: center; margin-bottom: 20px;
            border: 1px solid #eee;
            margin-top: 50px; /* Đẩy xuống để không bị nút Home che */
        }
        
        /* --- AVATAR HÌNH ẢNH (Thay cho vòng tròn chữ) --- */
        .avatar-img {
            width: 80px; height: 80px; 
            border-radius: 50%; 
            object-fit: cover; /* Đảm bảo ảnh tròn đẹp không bị méo */
            margin-right: 20px;
            border: 2px solid #eee;
        }

        .user-info h2 { margin: 0 0 5px 0; color: #0096ff; font-size: 22px; }
        .user-meta { color: #333; font-size: 14px; }
        .user-meta strong { font-weight: 600; }
        
        .status-badges { margin-left: auto; display: flex; gap: 10px; }
        .badge { padding: 5px 15px; border-radius: 20px; font-size: 13px; font-weight: 600; border: 1px solid; display: flex; align-items: center; gap: 5px; }
        .badge-warning { color: #d9534f; border-color: #d9534f; background: #fff5f5; }
        .badge-success { color: #28a745; border-color: #28a745; background: #f0fff4; }

        /* SCOREBOARD CARD */
        .score-card { background: white; padding: 20px; border-radius: 15px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        .filter-bar { display: flex; justify-content: space-between; margin-bottom: 15px; }
        .subject-select { padding: 8px 15px; border: 1px solid #ddd; border-radius: 5px; min-width: 150px; color: #333; }
        .btn-update-rank { background-color: #007bff; color: white; border: none; padding: 8px 20px; border-radius: 5px; cursor: pointer; font-weight: 600; }
        .btn-update-rank:hover { background-color: #0056b3; }

        /* TABLE */
        .score-table { width: 100%; border-collapse: collapse; }
        .score-table th { background-color: #0099ff; color: white; text-align: left; padding: 12px 15px; font-size: 14px; text-transform: uppercase; }
        .score-table td { padding: 12px 15px; border-bottom: 1px solid #eee; font-size: 14px; color: #333; }
        .score-table tr:last-child td { border-bottom: none; }
        .score-table th:first-child { border-top-left-radius: 5px; }
        .score-table th:last-child { border-top-right-radius: 5px; }
        .time-icon { color: #0099ff; margin-right: 5px; }
    </style>
</head>
<body>

    <a href="index.php" class="btn-home">
        <i class="fas fa-home"></i> Trang chủ
    </a>

    <div class="profile-card">
        <img src="image_272f10.png" alt="Avatar" class="avatar-img" 
             onerror="this.src='https://cdn-icons-png.flaticon.com/512/149/149071.png'">
        
        <div class="user-info">
            <h2><?php echo $current_user; ?></h2>
            <div class="user-meta">
                Tên đăng nhập: <strong><?php echo $current_user; ?></strong> &nbsp;|&nbsp; ID: <strong><?php echo $user_id_fake; ?></strong>
            </div>
        </div>
        
        <div class="status-badges">
            <div class="badge badge-success"><i class="fas fa-check-circle"></i> Đã xác thực</div>
        </div>
    </div>

    <div class="score-card">
        <div class="filter-bar">
            <select class="subject-select">
                <option>Toán</option>
               
            </select>
            <button class="btn-update-rank">Cập nhật bảng xếp hạng</button>
        </div>

        <table class="score-table">
            <thead>
                <tr>
                    <th style="width: 40%;">BÀI THI</th>
                    <th style="width: 15%;">LƯỢT THI</th>
                    <th style="width: 10%;">ĐIỂM</th>
                    <th style="width: 20%;">THỜI GIAN HOÀN THÀNH</th>
                    <th style="width: 15%;">NGÀY HOÀN THÀNH</th>
                </tr>
            </thead>
           <tbody>
                <?php
                if ($result && $result->num_rows > 0) {
                    // CÁCH SỬA: Lấy tổng số bài thi hiện có làm số bắt đầu
                    // Ví dụ: Có 5 bài thì bài mới nhất (hiện đầu tiên) sẽ là Lần 5
                    $lan_thi = $result->num_rows; 

                    while($row = $result->fetch_assoc()) {
                        $date = date("d/m/Y", strtotime($row['ngay_thi']));
                        echo "<tr>";
                        echo "<td>" . $row['ten_bai_thi'] . "</td>";
                        
                        // --- SỬA Ở DÒNG NÀY ---
                        // Thay vì dùng $row['id'], ta dùng biến $lan_thi tự tính
                        echo "<td>Lần thi " . $lan_thi . "</td>"; 
                        $lan_thi--; // Sau khi in xong thì giảm xuống (5 -> 4 -> 3...)
                        // ----------------------

                        echo "<td><b>" . $row['diem_so'] . "/50</b></td>";
                        echo "<td><i class='far fa-clock time-icon'></i> " . $row['thoi_gian_lam'] . "</td>";
                        echo "<td>" . $date . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' style='text-align:center; padding: 20px; color:#777;'>Bạn chưa làm bài thi nào. Hãy thử làm một bài nhé!</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>