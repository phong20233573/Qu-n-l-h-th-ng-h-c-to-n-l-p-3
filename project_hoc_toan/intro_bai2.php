<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giới thiệu bài tập</title>
    <style>
        /* --- CẤU TRÚC CHUNG --- */
        body {
            margin: 0; padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Font mặc định cho toàn trang */
            background-color: #fff;
            height: 100vh;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            
            /* Khoảng trống cho nút X ở trang mẹ */
            padding-top: 50px; 
            box-sizing: border-box;
        }

        /* 1. HEADER */
        .header-bar {
            height: 80px; /* Tăng chiều cao header lên chút để chứa chữ to */
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 40px; 
            background: #fff;
            flex-shrink: 0;
        }

        /* --- PHẦN BẠN MUỐN SỬA --- */
        .question-title {
            display: flex;
            align-items: center;
            
            /* 1. CỠ CHỮ TO RA */
            font-size: 28px; 
            
            /* 2. ĐỔI KIỂU CHỮ (Ví dụ: Times New Roman cho giống sách) */
            font-family: 'Times New Roman', Times, serif;
            
            font-weight: 700; /* Độ đậm */
            color: #203696;   /* Màu xanh đậm */
        }

        /* Số 2 tròn (Chỉnh to lên theo chữ) */
        .circle-number {
            width: 40px; height: 40px; /* To hơn cũ (32px) */
            border-radius: 50%;
            background-color: #00b9f2; 
            color: white;
            display: flex; justify-content: center; align-items: center;
            font-weight: bold;
            margin-right: 15px;
            
            /* Font số bên trong */
            font-family: 'Segoe UI', sans-serif; /* Số để font thường cho dễ nhìn */
            font-size: 25px; 
        }

        .btn-start {
            background-color: #00b9f2;
            color: white;
            font-weight: bold;
            text-decoration: none;
            padding: 12px 34px; /* Nút to hơn chút cho cân đối */
            border-radius: 8px;
            font-size: 18px;
            transition: background 0.2s;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            font-family: 'Segoe UI', sans-serif; /* Nút giữ font hiện đại */
        }
        .btn-start:hover { background-color: #0090bd; }

        /* 2. NỘI DUNG CHÍNH */
        .content-area {
            flex: 1;
            padding: 10px 40px 40px 40px;
            display: flex;
            flex-direction: column; 
            align-items: center;
            overflow-y: auto; 
        }

        .content-area img {
            max-width: 100%;
            height: auto;
            max-height: 50vh; 
            object-fit: contain;
            margin-bottom: 20px;
        }

        .questions-text {
            width: 100%;
            max-width: 900px; 
            text-align: left;
            
            /* Font chữ cho phần câu hỏi a, b dưới cùng */
            font-size: 30px; /* Cũng tăng lên cho dễ đọc */
            font-family: 'Times New Roman', Times, serif; /* Đồng bộ với tiêu đề */
            line-height: 1.6;
            color: #333;
        }
        
        .q-item {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <div class="header-bar">
        <div class="question-title">
            <div class="circle-number">2</div>
            <span>Quan sát tranh, thực hiện các yêu cầu sau:</span>
        </div>
        <a href="game_bai2.php" class="btn-start">Bắt đầu</a>
    </div>

    <div class="content-area">
        <img src="anh_trang/anhbai2sgk.png" alt="Tranh minh họa">

        <div class="questions-text">
            <div class="q-item">a) Nêu tên bạn thu gom được nhiều vỏ chai nhựa nhất.</div>
            <div class="q-item">b) Nêu tên các bạn thu gom số lượng vỏ chai nhựa theo thứ tự từ nhiều đến ít.</div>
        </div>
    </div>

</body>
</html>