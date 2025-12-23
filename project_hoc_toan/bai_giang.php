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
    <title>Bài Giảng - Toán Lớp 3</title>
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

    <div class="lecture-container">
        
        <div class="lecture-header-text">
            <h1>Bài giảng</h1>
            
        </div>

        <div class="toolbar-section">
            <div class="class-tabs">
                <div class="class-badge active">Lớp 3</div>
            </div>

            <div class="search-filters">
                <select class="select-week">
                    <option>Chọn tuần</option>
                    <option>Tuần 1</option>
                    <option>Tuần 2</option>
                </select>
                
                <div class="search-input-group">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Nhập tên bài giảng cần tìm">
                </div>

                <button class="btn-search-orange">Tìm Kiếm</button>
            </div>
        </div>

        <div id="all-pages-container">
           <div id="page-1" class="lectures-grid page-content">
            <div class="lecture-card">
                <div class="card-top-decor"></div>
                <div class="card-content">
                    <div class="week-badge">Tuần 1</div>
                    <h3>Bài 1: Ôn tập về các số trong phạm vi 1000</h3>
                    <div class="tags"><span class="tag">Toán</span><span class="tag">Lớp 3</span></div>
                    <button class="btn-view-quick">Xem nhanh</button>
                </div>
                <div class="card-stats"><span><i class="fas fa-download"></i> 6517</span><span><i class="fas fa-eye"></i> 11218</span></div>
            </div>
            <div class="lecture-card">
                <div class="card-top-decor"></div>
                <div class="card-content">
                    <div class="week-badge">Tuần 1</div>
                    <h3>Bài 2: Ôn tập về phép cộng, phép trừ trong phạm vi 1000 - Tiết 1</h3>
                    <div class="tags"><span class="tag">Toán</span><span class="tag">Lớp 3</span></div>
                    <a href="xem_video.php" target="_blank" class="btn-view-quick" style="text-decoration:none; display:block; text-align:center;">Xem nhanh</a>
                </div>
                <div class="card-stats"><span><i class="fas fa-download"></i> 6628</span><span><i class="fas fa-eye"></i> 11496</span></div>
            </div>
            <div class="lecture-card">
                <div class="card-top-decor"></div>
                <div class="card-content">
                    <div class="week-badge">Tuần 1</div>
                    <h3>Bài 2: Ôn tập về phép cộng, phép trừ trong phạm vi 1000 - Tiết 2</h3>
                    <div class="tags"><span class="tag">Toán</span><span class="tag">Lớp 3</span></div>
                    <button class="btn-view-quick">Xem nhanh</button>
                </div>
                <div class="card-stats"><span><i class="fas fa-download"></i> 6517</span><span><i class="fas fa-eye"></i> 11218</span></div>
            </div>
           
           
            <div class="lecture-card">
                <div class="card-top-decor"></div>
                <div class="card-content">
                    <div class="week-badge">Tuần 1</div>
                    <h3>Bài 3: Ôn tập về hình học và đo lường - Tiết 1</h3>
                    <div class="tags"><span class="tag">Toán</span><span class="tag">Lớp 3</span></div>
                    <button class="btn-view-quick">Xem nhanh</button>
                </div>
                <div class="card-stats"><span><i class="fas fa-download"></i> 6510</span><span><i class="fas fa-eye"></i> 9884</span></div>
            </div>
            <div class="lecture-card">
                <div class="card-top-decor"></div>
                <div class="card-content">
                    <div class="week-badge">Tuần 1</div>
                    <h3>Bài 3: Ôn tập về hình học và đo lường - Tiết 2</h3>
                    <div class="tags"><span class="tag">Toán</span><span class="tag">Lớp 3</span></div>
                    <button class="btn-view-quick">Xem nhanh</button>
                </div>
                <div class="card-stats"><span><i class="fas fa-download"></i> 6581</span><span><i class="fas fa-eye"></i> 9453</span></div>
            </div>
            <div class="lecture-card">
                <div class="card-top-decor"></div>
                <div class="card-content">
                    <div class="week-badge">Tuần 2</div>
                    <h3>Bài 4: Mi-li-mét - Tiết 1</h3>
                    <div class="tags"><span class="tag">Toán</span><span class="tag">Lớp 3</span></div>
                    <button class="btn-view-quick">Xem nhanh</button>
                </div>
                <div class="card-stats"><span><i class="fas fa-download"></i> 7119</span><span><i class="fas fa-eye"></i> 11233</span></div>
            </div>
        </div>

        <div id="page-2" class="lectures-grid page-content" style="display: none;">
            <div class="lecture-card">
                <div class="card-top-decor"></div>
                <div class="card-content">
                    <div class="week-badge">Tuần 2</div>
                    <h3>Bài 4: Mi-li-mét - Tiết 2</h3>
                    <div class="tags"><span class="tag">Toán</span><span class="tag">Lớp 3</span></div>
                    <button class="btn-view-quick">Xem nhanh</button>
                </div>
                <div class="card-stats"><span><i class="fas fa-download"></i> 6448</span><span><i class="fas fa-eye"></i> 9920</span></div>
            </div>
            <div class="lecture-card">
                <div class="card-top-decor"></div>
                <div class="card-content">
                    <div class="week-badge">Tuần 2</div>
                    <h3>Bài 5: Ôn tập về phép nhân, bảng nhân 2, bảng nhân 5</h3>
                    <div class="tags"><span class="tag">Toán</span><span class="tag">Lớp 3</span></div>
                    <button class="btn-view-quick">Xem nhanh</button>
                </div>
                <div class="card-stats"><span><i class="fas fa-download"></i> 6643</span><span><i class="fas fa-eye"></i> 9873</span></div>
            </div>
            <div class="lecture-card">
                <div class="card-top-decor"></div>
                <div class="card-content">
                    <div class="week-badge">Tuần 2</div>
                    <h3>Bài 6: Bảng nhân 3 - Tiết 1</h3>
                    <div class="tags"><span class="tag">Toán</span><span class="tag">Lớp 3</span></div>
                    <button class="btn-view-quick">Xem nhanh</button>
                </div>
                <div class="card-stats"><span><i class="fas fa-download"></i> 7131</span><span><i class="fas fa-eye"></i> 10546</span></div>
            </div>
            <div class="lecture-card">
                <div class="card-top-decor"></div>
                <div class="card-content">
                    <div class="week-badge">Tuần 2</div>
                    <h3>Bài 6: Bảng nhân 3 - Tiết 2</h3>
                    <div class="tags"><span class="tag">Toán</span><span class="tag">Lớp 3</span></div>
                    <button class="btn-view-quick">Xem nhanh</button>
                </div>
                <div class="card-stats"><span><i class="fas fa-download"></i> 6749</span><span><i class="fas fa-eye"></i> 10080</span></div>
            </div>
            <div class="lecture-card">
                <div class="card-top-decor"></div>
                <div class="card-content">
                    <div class="week-badge">Tuần 3</div>
                    <h3>Bài 7: Bảng nhân 4 - Tiết 1</h3>
                    <div class="tags"><span class="tag">Toán</span><span class="tag">Lớp 3</span></div>
                    <button class="btn-view-quick">Xem nhanh</button>
                </div>
                <div class="card-stats"><span><i class="fas fa-download"></i> 7303</span><span><i class="fas fa-eye"></i> 11393</span></div>
            </div>
            <div class="lecture-card">
                <div class="card-top-decor"></div>
                <div class="card-content">
                    <div class="week-badge">Tuần 3</div>
                    <h3>Bài 7: Bảng nhân 4 - Tiết 2</h3>
                    <div class="tags"><span class="tag">Toán</span><span class="tag">Lớp 3</span></div>
                    <button class="btn-view-quick">Xem nhanh</button>
                </div>
                <div class="card-stats"><span><i class="fas fa-download"></i> 6902</span><span><i class="fas fa-eye"></i> 10384</span></div>
            </div>
        </div>

        <div id="page-3" class="lectures-grid page-content" style="display: none;">
            <div class="lecture-card">
                <div class="card-top-decor"></div>
                <div class="card-content">
                    <div class="week-badge">Tuần 3</div>
                    <h3>Bài 8: Bảng nhân 6 - Tiết 1</h3>
                    <div class="tags"><span class="tag">Toán</span><span class="tag">Lớp 3</span></div>
                    <button class="btn-view-quick">Xem nhanh</button>
                </div>
                <div class="card-stats"><span><i class="fas fa-download"></i> 7277</span><span><i class="fas fa-eye"></i> 10524</span></div>
            </div>
            <div class="lecture-card">
                <div class="card-top-decor"></div>
                <div class="card-content">
                    <div class="week-badge">Tuần 3</div>
                    <h3>Bài 8: Bảng nhân 6 - Tiết 2</h3>
                    <div class="tags"><span class="tag">Toán</span><span class="tag">Lớp 3</span></div>
                    <button class="btn-view-quick">Xem nhanh</button>
                </div>
                <div class="card-stats"><span><i class="fas fa-download"></i> 6755</span><span><i class="fas fa-eye"></i> 9890</span></div>
            </div>
            <div class="lecture-card">
                <div class="card-top-decor"></div>
                <div class="card-content">
                    <div class="week-badge">Tuần 3</div>
                    <h3>Bài 9: Gấp một số lên một số lần</h3>
                    <div class="tags"><span class="tag">Toán</span><span class="tag">Lớp 3</span></div>
                    <button class="btn-view-quick">Xem nhanh</button>
                </div>
                <div class="card-stats"><span><i class="fas fa-download"></i> 7064</span><span><i class="fas fa-eye"></i> 10625</span></div>
            </div>
            <div class="lecture-card">
                <div class="card-top-decor"></div>
                <div class="card-content">
                    <div class="week-badge">Tuần 4</div>
                    <h3>Bài 10: Bảng nhân 7 - Tiết 1</h3>
                    <div class="tags"><span class="tag">Toán</span><span class="tag">Lớp 3</span></div>
                    <button class="btn-view-quick">Xem nhanh</button>
                </div>
                <div class="card-stats"><span><i class="fas fa-download"></i> 7044</span><span><i class="fas fa-eye"></i> 10991</span></div>
            </div>
            <div class="lecture-card">
                <div class="card-top-decor"></div>
                <div class="card-content">
                    <div class="week-badge">Tuần 4</div>
                    <h3>Bài 10: Bảng nhân 7 - Tiết 2</h3>
                    <div class="tags"><span class="tag">Toán</span><span class="tag">Lớp 3</span></div>
                    <button class="btn-view-quick">Xem nhanh</button>
                </div>
                <div class="card-stats"><span><i class="fas fa-download"></i> 6516</span><span><i class="fas fa-eye"></i> 9833</span></div>
            </div>
            <div class="lecture-card">
                <div class="card-top-decor"></div>
                <div class="card-content">
                    <div class="week-badge">Tuần 4</div>
                    <h3>Bài 11: Bảng nhân 8 - Tiết 2</h3>
                    <div class="tags"><span class="tag">Toán</span><span class="tag">Lớp 3</span></div>
                    <button class="btn-view-quick">Xem nhanh</button>
                </div>
                <div class="card-stats"><span><i class="fas fa-download"></i> 6554</span><span><i class="fas fa-eye"></i> 9880</span></div>
            </div>
        </div>

        <div id="page-empty" class="page-content" style="display: none; text-align: center; padding: 50px;">
            <img src="https://cdn-icons-png.flaticon.com/512/7486/7486744.png" style="width: 100px; opacity: 0.5; margin-bottom: 20px;">
            <h3 style="color: #999;">Dữ liệu đang được cập nhật...</h3>
        </div>

    </div>

    <div class="pagination-container">
        <a href="javascript:void(0)" onclick="changePage(currentP - 1)" class="page-link prev"><i class="fas fa-chevron-left"></i></a>
        
        <a href="javascript:void(0)" onclick="changePage(1)" class="page-link page-num active" id="btn-1">1</a>
        <a href="javascript:void(0)" onclick="changePage(2)" class="page-link page-num" id="btn-2">2</a>
        <a href="javascript:void(0)" onclick="changePage(3)" class="page-link page-num" id="btn-3">3</a>
        <a href="javascript:void(0)" onclick="changePage(4)" class="page-link page-num" id="btn-4">4</a>
        
        <span class="page-dots">...</span>
        <a href="javascript:void(0)" onclick="changePage(25)" class="page-link page-num" id="btn-25">25</a>

        <a href="javascript:void(0)" onclick="changePage(currentP + 1)" class="page-link next"><i class="fas fa-chevron-right"></i></a>
    </div>

    <script>
        let currentP = 1;

        function changePage(pageNum) {
            if (pageNum < 1) pageNum = 1;
            if (pageNum > 26) pageNum = 26;
            
            currentP = pageNum;

            // 1. Ẩn tất cả trang
            var contents = document.getElementsByClassName("page-content");
            for (var i = 0; i < contents.length; i++) {
                contents[i].style.display = "none";
            }

            // 2. Hiện trang tương ứng
            if (pageNum === 1) {
                document.getElementById("page-1").style.display = "grid";
            } else if (pageNum === 2) {
                document.getElementById("page-2").style.display = "grid";
            } else if (pageNum === 3) {
                document.getElementById("page-3").style.display = "grid";
            } else {
                document.getElementById("page-empty").style.display = "block";
            }

            // 3. Cập nhật màu nút (active)
            var buttons = document.getElementsByClassName("page-num");
            for (var i = 0; i < buttons.length; i++) {
                buttons[i].classList.remove("active");
            }
            var activeBtn = document.getElementById("btn-" + pageNum);
            if (activeBtn) activeBtn.classList.add("active");
        }
    </script>
    </div>

</body>
</html>