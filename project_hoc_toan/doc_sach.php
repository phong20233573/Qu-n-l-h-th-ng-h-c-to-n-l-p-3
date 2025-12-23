<?php
session_start();
$book_title = isset($_GET['title']) ? $_GET['title'] : "Toán 3 - Tập 1";
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đọc sách: <?php echo $book_title; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* --- 1. CẤU TRÚC CHUNG (LAYOUT) --- */
        body { margin: 0; padding: 0; font-family: 'Segoe UI', sans-serif; background-color: #e0e0e0; height: 100vh; overflow: hidden; display: flex; flex-direction: column; }
        
        /* HEADER */
        .viewer-header { height: 50px; background: #e0e0e0; display: flex; align-items: center; padding: 0 20px; border-bottom: 1px solid #ccc; z-index: 100; }
        .btn-back-home { text-decoration: none; color: #555; font-weight: bold; display: flex; align-items: center; gap: 10px; }
        .book-title-header { margin-left: 20px; text-transform: uppercase; font-weight: bold; color: #333; }

        /* BODY CONTAINER */
        .viewer-container { display: flex; flex: 1; height: calc(100vh - 50px - 60px); }
        
        /* SIDEBAR TRÁI */
        .viewer-sidebar { width: 80px; background: white; display: flex; flex-direction: column; align-items: center; padding-top: 20px; border-right: 1px solid #ddd; gap: 25px; }
        .sidebar-tool { display: flex; flex-direction: column; align-items: center; color: #777; font-size: 12px; cursor: pointer; text-align: center; }
        .sidebar-tool i { font-size: 20px; margin-bottom: 5px; color: #555; }
        .sidebar-tool:hover, .sidebar-tool:hover i { color: #F58220; }
        .mini-book-cover { margin-top: auto; margin-bottom: 20px; width: 60px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.2); }

        /* KHU VỰC HIỂN THỊ SÁCH (STAGE) */
        .book-stage { flex: 1; display: flex; justify-content: center; align-items: center; background: #dcdcdc; overflow: auto; position: relative; }
        #book-page-img { max-height: 75%; max-width: 75%; box-shadow: 0 5px 15px rgba(0,0,0,0.2); transition: opacity 0.3s; }

        /* NÚT CHUYỂN TRANG (MŨI TÊN) */
        .nav-arrow { position: absolute; top: 50%; transform: translateY(-50%); background: rgba(0,0,0,0.1); width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; color: #555; font-size: 20px; transition: 0.2s; z-index: 50; }
        .nav-arrow:hover { background: rgba(0,0,0,0.3); color: white; }
        .prev-arrow { left: 20px; }
        .next-arrow { right: 20px; }

        /* FOOTER (THANH CÔNG CỤ DƯỚI) */
        .viewer-footer { height: 60px; background: white; border-top: 1px solid #ccc; display: flex; justify-content: center; align-items: center; gap: 20px; }
        .page-control-box { display: flex; align-items: center; gap: 10px; background: #f0f0f0; padding: 5px 15px; border-radius: 30px; }
        .page-input { width: 50px; text-align: center; border: 1px solid #ccc; border-radius: 5px; padding: 5px; }
        .zoom-btn { cursor: pointer; font-size: 18px; color: #555; }

        /* --- 2. CSS CHO VÙNG BẤM TƯƠNG TÁC (HOTSPOT) --- */
      

        /* KHI DI CHUỘT VÀO: HIỆN MÀU XANH + VIỀN SÁNG */
        .click-zone {
            position: absolute;
            /* CĂN CHỈNH VỊ TRÍ BÀI 2 (Bạn có thể sửa % nếu chưa khớp) */
            top: 60%; 
            left: 10%; 
            width: 62%; 
            height: 33%;
            
            cursor: pointer;
            z-index: 60;
            
            /* MẶC ĐỊNH TRONG SUỐT */
            background: transparent; 
            border: none;
            
            /* Hiệu ứng chuyển màu mượt mà */
            transition: all 0.3s ease;
        } 

        .click-zone:hover {
            background: rgba(0, 150, 255, 0.2); /* Màu xanh dương nhạt (20% độ đậm) */
            box-shadow: 0 0 15px rgba(0, 150, 255, 0.6); /* Viền tỏa sáng */
            border: 1px solid rgba(0, 150, 255, 0.8);
        }


        /* --- 3. CSS CHO CỬA SỔ IFRAME (MODAL) --- */
       /* ... (Giữ nguyên các CSS cũ) ... */

    /* --- CẬP NHẬT GIAO DIỆN MODAL (KHUNG CHỨA) --- */
    .iframe-overlay {
        position: fixed; top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(0,0,0,0.8);
        display: none;
        justify-content: center; align-items: center; 
        z-index: 9999;
    }
    .iframe-wrapper {
        /* Kéo dài giao diện ra (98%) */
        width: 72%; height: 90%;
        background: white;
        border-radius: 8px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 0 25px rgba(0,0,0,0.5);
    }
    .iframe-content {
        width: 100%; height: 100%;
        border: none;
    }
    
    /* NÚT THOÁT DẤU X (Góc phải) */
    .btn-close-simple {
        position: absolute; 
        top: 10px; right: 15px;
        font-size: 28px; 
        color: #888;
        cursor: pointer; 
        z-index: 10000;
        transition: 0.2s;
        width: 40px; height: 40px;
        display: flex; justify-content: center; align-items: center;
        background: rgba(255,255,255,0.8);
        border-radius: 50%;
    }
    .btn-close-simple:hover { 
        color: #ff4444; 
        background: white;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    </style>
</head>
<body>

    <div class="viewer-header">
        <a href="tu_sach.php" class="btn-back-home"><i class="fas fa-arrow-left"></i> Trang chủ</a>
        <div class="book-title-header"><?php echo $book_title; ?></div>
    </div>

    <div class="viewer-container">
        <div class="viewer-sidebar">
            <div class="sidebar-tool"><i class="fas fa-bars"></i><span>Mục lục</span></div>
            <div class="sidebar-tool"><i class="fas fa-pen"></i><span>Công cụ</span></div>
            <div class="sidebar-tool"><i class="fas fa-question-circle"></i><span>Hướng dẫn</span></div>
            <img src="anh_trang/trang1toan_lop3.jpg" class="mini-book-cover" onerror="this.style.display='none'">
        </div>

        <div class="book-stage">
            <div class="nav-arrow prev-arrow" onclick="changePage(-1)"><i class="fas fa-chevron-left"></i></div>
            
            <div style="position: relative; display: inline-block;">
                <img src="" id="book-page-img" alt="Trang sách">
                
                <div id="hotspot-bai2" class="click-zone" style="display: none;" onclick="openExternalFile()"></div>
            </div>

            <div class="nav-arrow next-arrow" onclick="changePage(1)"><i class="fas fa-chevron-right"></i></div>
        </div>
    </div>

    <div class="viewer-footer">
        <div class="zoom-btn"><i class="fas fa-minus-circle"></i></div>
        <div class="page-control-box">
            <i class="fas fa-chevron-left" onclick="changePage(-1)" style="cursor:pointer"></i>
            <input type="text" id="page-input" class="page-input" value="1" onchange="jumpToPage()">
            <span>/ <span id="total-pages">125</span></span>
            <i class="fas fa-chevron-right" onclick="changePage(1)" style="cursor:pointer"></i>
        </div>
        <div class="zoom-btn"><i class="fas fa-plus-circle"></i></div>
    </div>

    <div id="modal-interactive" class="iframe-overlay">
    <div class="iframe-wrapper">
        <div class="btn-close-simple" onclick="closeInteractive()" title="Thoát">
            <i class="fas fa-times"></i>
        </div>
        
        <iframe id="interactive-frame" class="iframe-content" src=""></iframe>
    </div>
</div>

    <script>
        // --- CẤU HÌNH ---
        const totalPages = 125; 
        let currentPage = 1; // Mặc định vào trang 1

        // 1. HÀM LẤY ĐƯỜNG DẪN ẢNH SÁCH
        function getPageUrl(pageNum) {
            // Nếu là trang <= 7 thì lấy trong thư mục 'anh_trang'
            if (pageNum <= 7) {
                // Tên file phải chuẩn: anh_trang/trang1toan_lop3.jpg
                return `anh_trang/trang${pageNum}toan_lop3.png`;
            } else {
                // Các trang sau hiện ảnh placeholder
                return `https://via.placeholder.com/600x800/ffffff/aaaaaa?text=Trang+${pageNum}+dang+cap+nhat`;
            }
        }

        // 2. HÀM HIỂN THỊ TRANG
        function renderPage() {
            const img = document.getElementById('book-page-img');
            const input = document.getElementById('page-input');
            const hotspot = document.getElementById('hotspot-bai2');

            // Cập nhật ảnh
            img.src = getPageUrl(currentPage);
            input.value = currentPage;

            // XỬ LÝ HOTSPOT: Chỉ hiện khi ở trang 7
            if (currentPage === 7) {
                hotspot.style.display = 'block';
            } else {
                hotspot.style.display = 'none';
            }
        }

        // 3. CHUYỂN TRANG
        function changePage(step) {
            let newPage = currentPage + step;
            if (newPage >= 1 && newPage <= totalPages) {
                currentPage = newPage;
                renderPage();
            }
        }

        function jumpToPage() {
            const input = document.getElementById('page-input');
            let page = parseInt(input.value);
            if (page >= 1 && page <= totalPages) {
                currentPage = page;
                renderPage();
            } else {
                alert("Trang không hợp lệ!");
                input.value = currentPage;
            }
        }

        // --- 4. HÀM XỬ LÝ MỞ FILE RỜI (IFRAME) ---
        function openExternalFile() {
            const modal = document.getElementById('modal-interactive');
            const frame = document.getElementById('interactive-frame');
            
            // Bước quan trọng: Load file intro_bai2.php vào iframe
            frame.src = 'intro_bai2.php'; 
            
            // Hiện khung modal lên
            modal.style.display = 'flex';
        }

        // Đóng modal, tắt iframe
        function closeInteractive() {
            document.getElementById('modal-interactive').style.display = 'none';
            document.getElementById('interactive-frame').src = ''; // Xóa nguồn để dừng script bên trong
        }

        // --- KHỞI CHẠY LẦN ĐẦU ---
        renderPage();
    </script>
</body>
</html>