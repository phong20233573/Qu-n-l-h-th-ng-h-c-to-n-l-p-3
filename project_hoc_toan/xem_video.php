<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Xem Bài Giảng - Toán Lớp 3</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        /* CSS riêng cho trang xem video */
        .video-container {
            max-width: 1000px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            text-align: center;
        }

        .video-title {
            color: #F58220;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
        }

        /* Khung bao quanh video để responsive (tự co giãn) */
        .video-wrapper {
            position: relative;
            padding-bottom: 56.25%; /* Tỷ lệ khung hình 16:9 */
            height: 0;
            overflow: hidden;
            border-radius: 10px;
            background: #000;
        }

        .video-wrapper iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }

        .btn-back {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 25px;
            background: #e0e0e0;
            color: #333;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: 0.2s;
        }
        .btn-back:hover {
            background: #ccc;
        }
    </style>
</head>
<body class="with-hoc10-header" style="background-color: #f5f7fa;">

    <header class="header-hoc10-wrapper">
        <div class="header-hoc10-container">
            <div class="header-left-section">
                <a href="index.php" class="brand-logo">
                    <img src="https://hoc10.vn/images/logo.svg" alt="Hoc10" 
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                    <div style="display:none;" class="logo-text">Hoc<span>10</span></div>
                </a>
                <nav class="nav-menu">
                    <a href="#" class="nav-item">Mua sách</a>
                    <a href="#" class="nav-item">Giới thiệu <i class="fas fa-chevron-down"></i></a>
                    <a href="#" class="nav-item">Tủ sách</a>
                    <a href="#" class="nav-item">Học liệu</a>
                    <a href="bai_giang.php" class="nav-item" style="color: #F58220; font-weight: 600;">Bài giảng</a>
                    <a href="bai_hoc.php" class="nav-item">Đề kiểm tra</a>
                </nav>
            </div>
            <div class="header-right-section">
                <a href="#" class="btn-kich-hoat"><i class="fas fa-key"></i> Kích hoạt sách</a>
                <i class="fas fa-bell icon-bell"></i>
                <?php if (isset($_SESSION['username'])): ?>
                    <div class="user-profile-box">
                        <div class="avatar-placeholder"><i class="fas fa-user"></i></div>
                        <span class="user-name-text"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
                    </div>
                <?php else: ?>
                    <a href="login.html" class="btn-kich-hoat" style="background:#F58220; color:white;">Đăng Nhập</a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <div class="video-container">
        <h2 class="video-title">Bài giảng: Ôn tập phép cộng, phép trừ</h2>
        
        <div class="video-wrapper">
            <iframe 
                src="https://www.youtube.com/embed/QRhc9zvMTd4" 
                title="YouTube video player" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                allowfullscreen>
            </iframe>
        </div>

        <a href="javascript:window.close();" class="btn-back"><i class="fas fa-times"></i> Đóng Tab</a>
    </div>

</body>
</html>