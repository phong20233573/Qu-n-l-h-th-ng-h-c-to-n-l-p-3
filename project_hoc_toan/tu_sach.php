<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html> 
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tủ Sách Lớp 3 - Hoc10</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="with-hoc10-header" style="background-color: #f9f9f9;">

   <header class="header-hoc10-wrapper">
        <div class="header-hoc10-container">
            <div class="header-left-section">
                <a href="index.php" class="brand-logo">
                    <img src="https://hoc10.vn/images/logo.svg" alt="Hoc10" 
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                    <div style="display:none;" class="logo-text">HocToan<span>3</span></div>
                </a>
                <nav class="nav-menu">
                    <a href="index.php" class="nav-item">
                        <i class="fas fa-home"></i> Trang chủ
                    </a>
                    
                </nav>
            </div>
            <div class="header-right-section">
                <span style="color: #4a5568; font-size: 14px; font-weight: 500;">
                    <i class="fas fa-user-graduate" style="color: #F58220;"></i>
                    Xin chào, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>
                </span>
            </div>
        </div>
    </header>

    <div class="book-page-container">
        
        <div class="book-header-text">
            <h1>Tủ sách</h1>
            <p>Tủ sách là nơi chứa sách giáo khoa chuẩn dành cho học sinh lớp 3, học sinh có thể đọc trước kiến thức, tương tác làm bài tập trực tiếp tại sách ở đây trước khi xem video bài giảng và làm đề kiểm tra.</p>
        </div>

        <div class="class-filter-bar">
            <div class="label-orange-arrow">LỚP</div>
            <div class="class-tab active">Lớp 3</div>
            
        </div>

        <div class="books-wrapper">
            <h2 class="subject-title">TOÁN LỚP 3</h2>

            <div class="books-grid-layout">
                
                <div class="book-category-col">
                    <h3 class="category-label"><i class="fas fa-bookmark" style="color:#F58220"></i> Sách giáo khoa</h3>
                    <div class="book-cards-row">
                        <div class="book-card">
                            <img src="anh_trang/toan3_tap 1.png" alt="Toán 3 Tập 1">
                            <div class="book-info">
                                <h4>Toán 3 - Tập 1</h4>
                                <a href="doc_sach.php?title=Toán 3 Tập 1" class="btn-read-now">Xem ngay</a>
                            </div>
                        </div>
                        <div class="book-card">
                            <img src="anh_trang/toan3_tap 2.png" alt="Toán 3 Tập 2">
                            <div class="book-info">
                                <h4>Toán 3 - Tập 2</h4>
                                <a href="#" class="btn-read-now">Xem ngay</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="book-category-col">
                    <h3 class="category-label"><i class="fas fa-pencil-alt" style="color:#F58220"></i> Vở bài tập</h3>
                    <div class="book-cards-row">
                        <div class="book-card">
                            <img src="anh_trang/toanbt3_tap1.png" alt="VBT Toán 3 Tập 1">
                            <div class="book-info">
                                <h4>Vở bài tập Toán 3 - Tập 1</h4>
                                <a href="#" class="btn-read-now">Xem ngay</a>
                            </div>
                        </div>
                        <div class="book-card">
                            <img src="anh_trang/toanbt3_tap2.png" alt="VBT Toán 3 Tập 2">
                            <div class="book-info">
                                <h4>Vở bài tập Toán 3 - Tập 2</h4>
                                <a href="#" class="btn-read-now">Xem ngay</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

</body>
</html>