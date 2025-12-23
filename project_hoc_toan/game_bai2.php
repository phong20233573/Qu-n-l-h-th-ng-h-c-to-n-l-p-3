<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Làm bài tập</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* --- CẤU TRÚC CƠ BẢN --- */
        body { margin: 0; padding: 20px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #fff; display: flex; justify-content: center; min-height: 100vh; box-sizing: border-box; }
        .game-container { max-width: 800px; width: 90%; text-align: center; position: relative; padding-bottom: 80px; }
        
        /* Nút tắt tiếng */
        .mute-btn { position: absolute; top: 0; right: 0; font-size: 24px; color: #333; cursor: pointer; }
        
        /* Tiêu đề & Ảnh */
        .main-title { font-size: 26px; font-weight: normal; text-align: left; margin: 20px 0 30px; color: #000; }
        .illustration-img { max-width: 100%; height: auto; display: block; margin: 0 auto 30px; }
        
        /* Khu vực câu hỏi */
        .questions-area { text-align: left; font-family: 'Times New Roman', Times, serif; font-size: 24px; color: #000; line-height: 1.6; }
        .question-item { margin-bottom: 30px; }
        
        /* Ô NHẬP LIỆU */
        .input-box { width: 60px; height: 40px; text-align: center; font-size: 22px; font-family: 'Times New Roman', Times, serif; border: 1px solid #aaa; background: #fdfdfd; margin: 0 5px; display: inline-block; vertical-align: middle; border-radius: 4px; transition: 0.3s; }
        .input-box:focus { outline: 2px solid #00b9f2; }
        
        /* MÀU SẮC Ô INPUT KHI ĐÚNG/SAI */
        .input-box.is-correct { border: 2px solid #28a745 !important; background-color: #e8f5e9; color: #155724; }
        .input-box.is-wrong { border: 2px solid #dc3545 !important; background-color: #f8d7da; color: #721c24; }

        .question-b-line { margin-top: 15px; }
        .input-wrapper { display: inline-block; white-space: nowrap; position: relative; }

        /* ICON KẾT QUẢ (TICK / X) */
        .result-mark { font-size: 24px; margin-left: 8px; vertical-align: middle; display: inline-block; }
        .correct { color: #28a745; /* Màu xanh lá */ }
        .wrong { color: #dc3545; /* Màu đỏ */ }

        /* NÚT BẤM */
        .btn-action { position: absolute; bottom: 0; right: 0; border: none; padding: 12px 30px; font-size: 18px; cursor: pointer; border-radius: 50px; font-family: 'Segoe UI', sans-serif; font-weight: bold; transition: all 0.2s; outline: none; }
        .btn-check { background-color: #555; color: white; }
        .btn-check:hover { background-color: #333; }
        .btn-retry { background-color: #00b9f2; color: white; display: none; box-shadow: 0 4px 10px rgba(0, 185, 242, 0.4); }
        .btn-retry:hover { background-color: #009ecc; transform: translateY(-2px); }

        /* POPUP KẾT QUẢ */
        .result-popup { position: fixed; top: 40%; left: 50%; transform: translate(-50%, -50%); background-color: #fdecec; padding: 20px 40px; border-radius: 10px; box-shadow: 0 5px 20px rgba(0,0,0,0.2); display: none; flex-direction: row; align-items: center; gap: 20px; z-index: 1000; border: 1px solid #f5c6cb; animation: popIn 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275); }
        .popup-emoji { font-size: 50px; }
        .popup-text-content { text-align: left; }
        .popup-score { font-size: 22px; font-weight: bold; color: #0096c7; margin-bottom: 5px; }
        .popup-msg { font-size: 18px; color: #8b3e3e; font-weight: 500; }
        .popup-close { position: absolute; top: 5px; right: 10px; font-size: 24px; color: #a96666; cursor: pointer; font-weight: bold; }
        .popup-close:hover { color: #dc3545; }
        @keyframes popIn { from { opacity: 0; transform: translate(-50%, -60%); } to { opacity: 1; transform: translate(-50%, -50%); } }
        
        /* Popup khi đúng hết */
        .result-popup.perfect { background-color: #d4edda; border-color: #c3e6cb; }
        .result-popup.perfect .popup-msg { color: #155724; }
        .result-popup.perfect .popup-close { color: #155724; }
    </style>
</head>
<body>

    <div class="game-container">
        <audio id="sound-correct" src="dung.mp3"></audio>
        <audio id="sound-wrong" src="sai.mp3"></audio>

        <div class="mute-btn" onclick="toggleMute()"><i id="icon-mute" class="fas fa-volume-up"></i></div>

        <h1 class="main-title">Quan sát tranh, thực hiện các yêu cầu sau:</h1>
        
        <img src="anh_trang/anhbai2sgk.png" alt="Tranh minh họa" class="illustration-img">

        <div class="questions-area">
            <div class="question-item">
                a) Bạn thu gom được nhiều vỏ chai nhựa nhất là bạn
                <span class="input-wrapper">
                    <input type="text" id="ans-a" class="input-box" autocomplete="off">
                </span> .
            </div>
            <div class="question-item">
                b) Các bạn thu gom số lượng vỏ chai nhựa từ nhiều đến ít là:
                <div class="question-b-line">
                    <span class="input-wrapper"><input type="text" id="ans-b1" class="input-box" autocomplete="off"></span> ,
                    <span class="input-wrapper"><input type="text" id="ans-b2" class="input-box" autocomplete="off"></span> ,
                    <span class="input-wrapper"><input type="text" id="ans-b3" class="input-box" autocomplete="off"></span> ,
                    <span class="input-wrapper"><input type="text" id="ans-b4" class="input-box" autocomplete="off"></span> .
                </div>
            </div>
        </div>

        <button id="btn-check" class="btn-action btn-check" onclick="checkResult()">Kiểm tra</button>
        <button id="btn-retry" class="btn-action btn-retry" onclick="resetGame()">Làm lại</button>
    </div>

    <div id="result-popup" class="result-popup">
        <div class="popup-close" onclick="closePopup()">&times;</div>
        <div class="popup-emoji" id="popup-emoji">😟</div>
        <div class="popup-text-content">
            <div class="popup-score" id="popup-score">0/5 đáp án đúng</div>
            <div class="popup-msg" id="popup-msg">Cố gắng hơn nhé!</div>
        </div>
    </div>

    <script>
        let isMuted = false;

        function toggleMute() {
            isMuted = !isMuted;
            const icon = document.getElementById('icon-mute');
            icon.className = isMuted ? 'fas fa-volume-mute' : 'fas fa-volume-up';
        }

        function playSound(type) {
            if (isMuted) return;
            const audioCorrect = document.getElementById('sound-correct');
            const audioWrong = document.getElementById('sound-wrong');
            
            // Reset âm thanh để phát lại từ đầu
            audioCorrect.pause(); audioCorrect.currentTime = 0;
            audioWrong.pause(); audioWrong.currentTime = 0;

            if (type === 'correct') audioCorrect.play().catch(e => console.log("Lỗi play: " + e));
            else audioWrong.play().catch(e => console.log("Lỗi play: " + e));
        }

        // --- HÀM KIỂM TRA KẾT QUẢ ---
        function checkResult() {
            let correctCount = 0;
            const totalQuestions = 5;

            // Hàm kiểm tra từng ô
            function validate(id, correctVal) {
                let el = document.getElementById(id);
                let val = el.value.trim();
                let wrapper = el.closest('.input-wrapper');

                // 1. Xóa dấu cũ và class màu cũ
                let old = wrapper.querySelector('.result-mark');
                if(old) old.remove();
                el.classList.remove('is-correct', 'is-wrong');

                // 2. Tạo thẻ chứa icon
                let span = document.createElement('span');
                span.className = 'result-mark';

                // 3. So sánh
                if(val.toLowerCase() === correctVal.toLowerCase()) {
                    // ĐÚNG: Hiện dấu tích tròn (check-circle)
                    span.innerHTML = '<i class="fas fa-check-circle"></i>'; 
                    span.classList.add('correct');
                    el.classList.add('is-correct'); // Tô xanh ô input
                    return 1;
                } else {
                    // SAI: Hiện dấu X tròn (times-circle)
                    span.innerHTML = '<i class="fas fa-times-circle"></i>'; 
                    span.classList.add('wrong');
                    el.classList.add('is-wrong'); // Tô đỏ ô input
                    return 0;
                }
                wrapper.appendChild(span);
            }

            // --- THỰC THI ---
            correctCount += validate('ans-a', 'Hương');
            correctCount += validate('ans-b1', 'Hương');
            correctCount += validate('ans-b2', 'Hải');
            correctCount += validate('ans-b3', 'Xuân');
            correctCount += validate('ans-b4', 'Mạnh');

            // --- HIỂN THỊ POPUP ---
            const popup = document.getElementById('result-popup');
            const emoji = document.getElementById('popup-emoji');
            const scoreText = document.getElementById('popup-score');
            const msgText = document.getElementById('popup-msg');

            scoreText.innerHTML = `<span style="color:#00b9f2">${correctCount}</span>/${totalQuestions} đáp án đúng`;

            if (correctCount === totalQuestions) {
                playSound('correct'); 
                popup.classList.add('perfect'); 
                emoji.innerText = '🤩'; 
                msgText.innerText = 'Tuyệt vời! Bạn làm đúng hết rồi!';
            } else {
                playSound('wrong'); 
                popup.classList.remove('perfect'); 
                emoji.innerText = '😟'; 
                msgText.innerText = 'Cố gắng hơn nhé!';
            }

            popup.style.display = 'flex';
            
            // Đổi nút Kiểm tra -> Làm lại
            document.getElementById('btn-check').style.display = 'none';
            document.getElementById('btn-retry').style.display = 'inline-block';
        }

        // --- HÀM LÀM LẠI ---
        function resetGame() {
            // Xóa nội dung và màu sắc input
            const inputs = document.querySelectorAll('.input-box');
            inputs.forEach(input => {
                input.value = '';
                input.classList.remove('is-correct', 'is-wrong');
            });

            // Xóa hết các dấu tick/x
            const marks = document.querySelectorAll('.result-mark');
            marks.forEach(mark => mark.remove());

            // Ẩn popup và đổi lại nút
            closePopup();
            document.getElementById('btn-retry').style.display = 'none';
            document.getElementById('btn-check').style.display = 'inline-block';
        }

        function closePopup() {
            document.getElementById('result-popup').style.display = 'none';
        }
    </script>
</body>
</html>