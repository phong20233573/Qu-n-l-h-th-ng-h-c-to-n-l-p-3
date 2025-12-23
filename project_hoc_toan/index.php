<?php
session_start(); // <--- BẮT BUỘC PHẢI CÓ DÒNG NÀY Ở DÒNG SỐ 1
?>
<!DOCTYPE html> 
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bé Vui Học Toán Lớp 3</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="with-hoc10-header">

   <header class="header-hoc10-wrapper">
        <div class="header-hoc10-container">
            
            <div class="header-left-section">
                <a href="index.php" class="brand-logo">
    <div class="logo-text">HocToan<span>3</span></div>
</a>

                <nav class="nav-menu">
                    
                    <a href="#" class="nav-item">Giới thiệu </a>
                    <a href="tu_sach.php" class="nav-item">Tủ sách</a>
                    <a href="bai_giang.php" class="nav-item">Bài giảng</a>
                    <a href="bai_hoc.php" class="nav-item" style="font-weight: 600;">Đề kiểm tra</a>
                    <a href="bang_diem.php" class="nav-item">Bảng điểm</a>
                </nav>
            </div>

            <div class="header-right-section">
                

                <a href="#" class="nav-item">Hỗ trợ <i class="fas fa-chevron-down"></i></a>

                <i class="fas fa-bell icon-bell"></i>

                <?php if (isset($_SESSION['username'])): ?>
    <div style="display: flex; align-items: center; gap: 10px;">
        
        <div class="user-profile-box" onclick="window.location.href='#'" title="Trang cá nhân" style="cursor: pointer;">
            <div class="avatar-placeholder">
                <i class="fas fa-user"></i>
            </div>
            <span class="user-name-text"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
        </div>

        <a href="logout.php" class="btn-logout" title="Đăng xuất" style="color: #e53e3e; text-decoration: none; padding: 5px;">
            <i class="fas fa-sign-out-alt"></i>
        </a>
        
    </div>
<?php else: ?>
                    <a href="login.html" class="btn-kich-hoat" style="background:#F58220; color:white;">Đăng Nhập</a>
                <?php endif; ?>
            </div>

        </div>
    </header>

    <header class="hero">
        <div class="hero-content">
            <div class="hero-image">
                <img src="hoc_sinh_cute.png" alt="Bé học toán vui">
            </div>
            <div class="hero-text">
                <h1>Chào mừng bé đến với thế giới Toán Lớp 3!</h1>
                <p>Học phép nhân, chia, làm quen với phân số và khám phá hình học đầy màu sắc. Học mà chơi, chơi mà học!</p>
                
                <div class="hero-buttons">
                    <a href="tu_sach.php" class="btn btn-kid-primary pulse-animation">Bắt đầu học thôi! <i class="fas fa-rocket"></i></a>
                </div>
            </div>
        </div>
    </header>
    <section class="features-section">
    <div class="features-container">
        
        <div class="features-image">
            <img src="https://img.freepik.com/free-vector/teacher-explaining-math-lesson-students_74855-6576.jpg?w=996&t=st=1715761200~exp=1715761800~hmac=8a9b6c5d4e3f2a1b0c9d8e7f6g5h4i3j2k1l0m" alt="Lớp học toán vui vẻ tương tác">
        </div>

        <div class="features-text">
            <h2 class="features-title">
                Học Toán Lớp 3 - <span class="highlight-text">Vui Hơn, Dễ Hơn!</span>
            </h2>
            <p class="features-desc">Khám phá phương pháp học tập hiện đại giúp bé yêu thích môn Toán ngay từ hôm nay.</p>
            
            <ul class="features-list">
                <li>
                    <div class="feature-icon-box blue-box"><i class="fas fa-video"></i></div>
                    <span>Video bài giảng hoạt hình sinh động, dễ hiểu.</span>
                </li>
                <li>
                    <div class="feature-icon-box green-box"><i class="fas fa-gamepad"></i></div>
                    <span>Vừa học vừa chơi với hàng ngàn câu hỏi tương tác.</span>
                </li>
                <li>
                    <div class="feature-icon-box purple-box"><i class="fas fa-tasks"></i></div>
                    <span>Theo dõi tiến độ học tập và nhận huy hiệu khen thưởng.</span>
                </li>
                <li>
                    <div class="feature-icon-box yellow-box"><i class="fas fa-chalkboard-teacher"></i></div>
                    <span>Ba mẹ dễ dàng đồng hành cùng con mỗi ngày.</span>
                </li>
            </ul>

            <a href="register.html" class="btn btn-kid-primary btn-feature pulse-animation">Đăng Ký Học Thử Ngay!</a>
        </div>

    </div>
</section>
    <section class="student-section">
    <div class="features-container">
        
        <div class="student-text">
            <h2 class="features-title">
                <span class="highlight-orange">Học sinh</span> - Trải nghiệm <br>
                học mới mẻ và thú vị
            </h2>
            
            <ul class="student-list">
                <li>
                    <div class="icon-circle"><i class="fas fa-robot"></i></div>
                    <div class="text-content">
                        <strong>40,000+ câu hỏi tương tác</strong>
                        <p>Bài tập được chia nhỏ theo từng bài học SGK.</p>
                    </div>
                </li>
                <li>
                    <div class="icon-circle"><i class="fas fa-map-marker-alt"></i></div>
                    <div class="text-content">
                        <strong>Làm bài miễn phí 100%</strong>
                        <p>Trả kết quả tức thì, sửa lỗi sai chi tiết.</p>
                    </div>
                </li>
                <li>
                    <div class="icon-circle"><i class="fas fa-chart-bar"></i></div>
                    <div class="text-content">
                        <strong>Giao diện bắt mắt, vui nhộn</strong>
                        <p>Hình ảnh hoạt hình giúp bé hứng thú hơn.</p>
                    </div>
                </li>
                <li>
                    <div class="icon-circle"><i class="fas fa-history"></i></div>
                    <div class="text-content">
                        <strong>Lưu lịch sử làm bài</strong>
                        <p>Dễ dàng theo dõi sự tiến bộ mỗi ngày.</p>
                    </div>
                </li>
            </ul>

            <a href="register.html" class="btn btn-orange pulse-animation">Luyện tập ngay</a>
        </div>

        <div class="student-image">
            <img src="https://img.freepik.com/free-vector/kids-online-lessons_52683-36818.jpg?w=996&t=st=1715765000~exp=1715765600~hmac=abcdef123456" alt="Bé trải nghiệm học toán vui">
            <div class="floating-icon icon-1"><i class="fas fa-plus"></i></div>
            <div class="floating-icon icon-2"><i class="fas fa-divide"></i></div>
        </div>

    </div>
</section>
    <section class="courses-section">
        <h2>Hôm nay chúng mình khám phá gì nhỉ?</h2>
        <img src="https://cdn-icons-png.flaticon.com/512/1046/1046283.png" class="deco-icon" alt="decoration">
        
        <div class="grid-container">
            <div class="card card-yellow">
                <div class="card-icon"><i class="fas fa-times-circle"></i></div>
                <h3>Phép Nhân & Chia</h3>
                <p>Bảng cửu chương, tính nhẩm siêu tốc.</p>
            </div>

            <div class="card card-blue">
                <div class="card-icon"><i class="fas fa-pizza-slice"></i></div>
                <h3>Làm Quen Phân Số</h3>
                <p>Một nửa quả cam, một phần tư chiếc bánh.</p>
            </div>

            <div class="card card-green">
                <div class="card-icon"><i class="fas fa-ruler-combined"></i></div>
                <h3>Hình Học Vui Nhộn</h3>
                <p>Góc vuông, chu vi hình chữ nhật, hình vuông.</p>
            </div>

            <div class="card card-purple">
                <div class="card-icon"><i class="fas fa-weight-hanging"></i></div>
                <h3>Đo Lường & Tiền Việt Nam</h3>
                <p>Ki-lô-gam, lít, xem đồng hồ và tính tiền.</p>
            </div>
        </div>
    </section>

</body>
</html>