<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}
$ten_bai_hien_tai = isset($_GET['ten_bai']) ? $_GET['ten_bai'] : "Bài tập tự do";
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thủ Thành Thông Thái - Violympic Style</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* --- CSS ĐÃ CẢI THIỆN ĐỂ GIỐNG ẢNH: Nền trời cam, mây, hàng rào, cây cối nền, khung thành trắng, thủ môn người hoạt hình --- */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            margin: 0; padding: 0; overflow: hidden;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to bottom, #FFA500 0%, #FFDEAD 40%, #228B22 40%, #006400 100%); /* Nền trời cam gradient đến cỏ xanh */
            position: relative;
        }

        .bg-scene { position: fixed; width: 100%; height: 100%; top: 0; left: 0; z-index: 0; overflow: hidden; }
        .grass-field { position: absolute; bottom: 0; width: 100%; height: 60%; background: linear-gradient(90deg, transparent 49%, rgba(34,139,34,0.1) 50%, transparent 51%), linear-gradient(0deg, #006400 0%, #228B22 100%); background-size: 80px 100%, 100% 100%; }
        .field-arc { position: absolute; bottom: 80px; left: 50%; transform: translateX(-50%); width: 400px; height: 200px; border: 3px solid rgba(255,255,255,0.6); border-top: none; border-radius: 0 0 200px 200px; box-shadow: 0 4px 8px rgba(0,0,0,0.2); }
        
        /* Thêm mây trắng */
        .cloud { position: absolute; background: white; border-radius: 50%; opacity: 0.8; animation: float 20s linear infinite; }
        .cloud::before, .cloud::after { content: ''; position: absolute; background: white; border-radius: 50%; }
        .cloud1 { top: 50px; left: 10%; width: 200px; height: 60px; }
        .cloud1::before { width: 100px; height: 100px; top: -50px; left: 50px; }
        .cloud1::after { width: 120px; height: 120px; top: -60px; left: 120px; }
        .cloud2 { top: 80px; right: 15%; width: 180px; height: 50px; animation-delay: -10s; }
        .cloud2::before { width: 90px; height: 90px; top: -45px; left: 40px; }
        .cloud2::after { width: 110px; height: 110px; top: -55px; left: 100px; }
        @keyframes float { 0% { transform: translateX(0); } 100% { transform: translateX(-100vw); } }

        /* Thêm hàng rào chain-link */
        .fence { position: absolute; bottom: 150px; width: 100%; height: 50px; background: repeating-linear-gradient(45deg, #808080, #808080 5px, transparent 5px, transparent 10px); opacity: 0.5; }

        /* Cây cối nền, thêm nhiều cây hơn */
        .tree { position: absolute; bottom: 150px; width: 100px; height: 150px; filter: drop-shadow(0 4px 6px rgba(0,0,0,0.2)); }
        .tree .trunk { position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); width: 20px; height: 50px; background: linear-gradient(#6B4423, #8B4513); border-radius: 5px; }
        .tree .leaves { position: absolute; top: 0; left: 50%; transform: translateX(-50%); width: 100px; height: 100px; background: radial-gradient(circle, #228B22 0%, #006400 100%); border-radius: 50% 50% 0 0 / 100% 100% 0 0; clip-path: polygon(50% 0%, 100% 50%, 75% 100%, 25% 100%, 0% 50%); }
        .tree1 { left: 5%; } .tree2 { left: 15%; width: 120px; height: 170px; } .tree3 { left: 25%; } 
        .tree4 { right: 5%; } .tree5 { right: 15%; width: 120px; height: 170px; } .tree6 { right: 25%; }

        .game-wrapper { position: relative; width: 100%; height: 100vh; z-index: 1; }
        .goal-container { position: absolute; top: 22%; left: 50%; transform: translateX(-50%); width: 750px; height: 280px; z-index: 1; }
        .goal-post { position: absolute; background: #FFFFFF; box-shadow: 3px 3px 8px rgba(0,0,0,0.4); border-radius: 5px; } /* Khung thành trắng */
        .post-top { top: 0; left: 0; width: 100%; height: 15px; z-index: 2; }
        .post-left { top: 0; left: 0; width: 15px; height: 100%; z-index: 2; }
        .post-right { top: 0; right: 0; width: 15px; height: 100%; z-index: 2; }
        .goal-net { width: 100%; height: 100%; background-image: linear-gradient(rgba(255,255,255,0.6) 2px, transparent 2px), linear-gradient(90deg, rgba(255,255,255,0.6) 2px, transparent 2px); background-size: 30px 30px; background-color: rgba(255,255,255,0.1); border: 2px solid rgba(255,255,255,0.4); opacity: 0.9; }
        .goalkeeper-img { height: 140px; position: absolute; bottom: 10px; left: 50%; transform: translateX(-50%); z-index: 10; transition: transform 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275); filter: drop-shadow(0 15px 10px rgba(0,0,0,0.4)); } /* Đổi tên từ frog-img sang goalkeeper-img */
        .question-board { position: absolute; top: 0; left: 50%; transform: translateX(-50%); width: 650px; height: 110px; background: linear-gradient(to bottom, #FFF8DC 0%, #F5DEB3 100%); border: 5px solid #8B4513; border-top: none; border-radius: 0 0 20px 20px; box-shadow: 0 10px 15px rgba(0,0,0,0.3); display: flex; justify-content: center; align-items: center; z-index: 90; animation: boardGlow 2s infinite alternate; }
        @keyframes boardGlow { 0% { box-shadow: 0 10px 15px rgba(0,0,0,0.3); } 100% { box-shadow: 0 10px 20px rgba(255,215,0,0.5); } }
        .nail { position: absolute; bottom: 8px; width: 8px; height: 8px; background: #4e342e; border-radius: 50%; box-shadow: inset 1px 1px 2px rgba(255,255,255,0.3); } .nail-l { left: 10px; } .nail-r { right: 10px; }
        .question-text { font-size: 26px; font-weight: bold; color: #5d4037; font-family: 'Comic Sans MS', cursive, sans-serif; text-shadow: 1px 1px 0 #fff; }
        .bottom-area { position: absolute; bottom: 20px; width: 100%; display: flex; justify-content: center; align-items: flex-end; padding-bottom: 10px; z-index: 100; }
        .ans-side { display: flex; flex-direction: column; gap: 10px; width: 280px; }
        .ball-area { width: 180px; position: relative; height: 80px; }
        .ball { width: 60px; height: 60px; background: url('https://cdn-icons-png.flaticon.com/512/53/53283.png') no-repeat center; background-size: contain; position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); z-index: 15; cursor: pointer; transition: 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275); filter: drop-shadow(0 5px 5px rgba(0,0,0,0.5)); }
        .wood-btn { background: linear-gradient(to bottom, #FFF8DC 0%, #F5DEB3 100%); border: 3px solid #A0826D; color: #4e342e; padding: 12px 15px; font-size: 18px; font-weight: bold; border-radius: 8px; cursor: pointer; text-align: left; box-shadow: 0 4px 0 #8B4513; transition: 0.1s; text-shadow: 1px 1px 0 #fff; }
        .wood-btn:hover { background: linear-gradient(to bottom, #FFE4B5 0%, #FFDAB9 100%); transform: translateY(2px); box-shadow: 0 2px 0 #8B4513; filter: brightness(1.05); }
        .hud-panel { position: absolute; top: 15px; left: 15px; z-index: 100; }
        .user-card { background: rgba(0,0,0,0.6); color: white; padding: 8px 15px; border-radius: 6px; display: flex; gap: 10px; align-items: center; border: 2px solid rgba(255,255,255,0.2); box-shadow: 0 4px 8px rgba(0,0,0,0.3); }
        .timer-text { font-size: 45px; color: white; font-weight: bold; font-family: monospace; text-shadow: 2px 2px 0 #000; margin-top: 5px; animation: timerPulse 1s infinite alternate; }
        @keyframes timerPulse { 0% { transform: scale(1); } 100% { transform: scale(1.02); } }
        .btn-exit { position: absolute; top: 15px; right: 15px; background: #f44336; color: white; padding: 8px 20px; text-decoration: none; border-radius: 20px; font-weight: bold; box-shadow: 0 4px 0 #b71c1c; z-index: 100; transition: 0.2s; }
        .btn-exit:hover { transform: translateY(-3px); box-shadow: 0 6px 0 #b71c1c; filter: brightness(1.1); }
        .anim-goal { bottom: 250px !important; transform: translateX(-50%) scale(0.6) rotate(720deg) !important; }
        .anim-miss { bottom: 120px !important; transform: translateX(150px) scale(0.7) !important; }
        .gk-jump-left { transform: translateX(-150px) translateY(-50px) rotate(-45deg) scale(1.2); } /* Animation nhảy trái giống ảnh */
        .gk-jump-right { transform: translateX(100px) translateY(-30px) rotate(45deg) scale(1.2); } /* Animation nhảy phải */
        .msg-result { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 70px; font-weight: 900; text-shadow: 3px 3px 0 #000; display: none; z-index: 200; animation: popUp 0.3s; }
        @keyframes popUp { from { transform: translate(-50%, -50%) scale(0); } to { transform: translate(-50%, -50%) scale(1); } }

        /* --- CSS CHO BẢNG ĐIỂM (MODAL) --- */
        .modal-overlay {
            position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,0.8); z-index: 1000;
            display: none;
            justify-content: center; align-items: center;
            animation: fadeIn 0.5s;
        }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        .score-board-popup {
            background: linear-gradient(to bottom, #FFF8DC 0%, #F5DEB3 100%);
            width: 450px; padding: 30px;
            border-radius: 20px; text-align: center;
            border: 8px solid #8B4513;
            box-shadow: 0 0 50px rgba(255, 235, 59, 0.6);
            animation: popUp 0.5s;
            position: relative;
        }
        .score-board-popup::before, .score-board-popup::after {
            content: ''; position: absolute; top: 10px; width: 12px; height: 12px;
            background: #4e342e; border-radius: 50%; box-shadow: inset 2px 2px 2px rgba(255,255,255,0.4);
        }
        .score-board-popup::before { left: 10px; } .score-board-popup::after { right: 10px; }

        .score-board-popup h2 { color: #d32f2f; font-size: 32px; margin-bottom: 10px; text-transform: uppercase; text-shadow: 1px 1px 0 #fff; animation: textGlow 1s infinite alternate; }
        @keyframes textGlow { 0% { text-shadow: 1px 1px 0 #fff; } 100% { text-shadow: 1px 1px 5px #ffeb3b; } }
        .final-score { font-size: 60px; font-weight: 900; color: #ff6f00; margin: 10px 0; text-shadow: 2px 2px 0 #fff8e1; animation: scoreBounce 0.5s infinite alternate; }
        @keyframes scoreBounce { 0% { transform: scale(1); } 100% { transform: scale(1.05); } }
        .btn-group { display: flex; justify-content: center; gap: 20px; margin-top: 20px; }
        .btn-popup { padding: 12px 25px; border-radius: 30px; border: none; font-size: 18px; font-weight: bold; cursor: pointer; text-decoration: none; color: white; display: inline-block; transition: 0.2s; box-shadow: 0 4px 8px rgba(0,0,0,0.2); }
        .btn-replay { background: #4caf50; box-shadow: 0 4px 0 #2e7d32; }
        .btn-home { background: #2196f3; box-shadow: 0 4px 0 #1565c0; }
        .btn-popup:hover { transform: translateY(-3px); filter: brightness(1.1); box-shadow: 0 6px 10px rgba(0,0,0,0.3); }
        
        /* Responsive */
        @media (max-width: 768px) {
            .goal-container { width: 90%; height: auto; }
            .question-board { width: 90%; font-size: 20px; }
            .ans-side { width: 40%; }
            .ball-area { width: 20%; }
            .wood-btn { font-size: 16px; padding: 10px; }
            .timer-text { font-size: 35px; }
            .score-board-popup { width: 90%; padding: 20px; }
        }
    </style>
</head>
<body>

    <div class="bg-scene">
        <div class="grass-field"></div>
        <div class="field-arc"></div>
        <div class="cloud cloud1"></div>
        <div class="cloud cloud2"></div>
        <div class="fence"></div>
        <div class="tree tree1"><div class="leaves"></div><div class="trunk"></div></div>
        <div class="tree tree2"><div class="leaves"></div><div class="trunk"></div></div>
        <div class="tree tree3"><div class="leaves"></div><div class="trunk"></div></div>
        <div class="tree tree4"><div class="leaves"></div><div class="trunk"></div></div>
        <div class="tree tree5"><div class="leaves"></div><div class="trunk"></div></div>
        <div class="tree tree6"><div class="leaves"></div><div class="trunk"></div></div>
    </div>

    <div class="game-wrapper">
        
        <div class="hud-panel">
            <div class="user-card">
                <i class="fas fa-user-circle" style="font-size: 30px;"></i>
                <div>
                    <div style="font-size:12px; color:#aaa;">PLAYER</div>
                    <div style="font-weight:bold; color:#4fc3f7;"><?php echo $_SESSION['username']; ?></div>
                </div>
                <div style="margin-left:15px; text-align:right;">
                    <div style="font-size:12px; color:#aaa;">SCORE</div>
                    <div style="font-weight:bold; color:#ffeb3b; font-size:18px;" id="score">0</div>
                </div>
            </div>
            <div class="timer-text" id="timer">20:00</div>
        </div>

        <a href="bai_hoc.php" class="btn-exit">Thoát Game</a>

        <div class="question-board">
            <div class="nail nail-l"></div> <div class="nail nail-r"></div>
            <div class="question-text" id="question">Loading...</div>
        </div>

        <div class="goal-container">
            <div class="goal-post post-top"></div> <div class="goal-post post-left"></div> <div class="goal-post post-right"></div>
            <div class="goal-net"></div>
            
            <img src="goalkeper.jpg" class="goalkeeper-img" id="goalkeeper" alt="Goalkeeper">
        </div>

        <div class="bottom-area">
            <div class="ans-side" id="ansLeft"></div>
            <div class="ball-area">
                <div id="msgResult" class="msg-result">GOAL!</div>
                <div id="ball" class="ball"></div>
            </div>
            <div class="ans-side" id="ansRight"></div>
        </div>

    </div>

    <div class="modal-overlay" id="endGameModal">
        <div class="score-board-popup">
            <h2>Kết thúc bài thi!</h2>
            <p>Điểm số của bé là:</p>
            <div class="final-score" id="finalScoreDisplay">0</div>
            
            <div class="btn-group">
                <button onclick="location.reload()" class="btn-popup btn-replay">
                    <i class="fas fa-redo"></i> Chơi lại
                </button>
                <a href="bai_hoc.php" class="btn-popup btn-home">
                    <i class="fas fa-book"></i> Về bài học
                </a>
            </div>
        </div>
    </div>

    <script>
        const questions = [
            { q: "Số liền trước của số lớn nhất có 3 chữ số?", a: [999, 998, 1000, 1001], correct: 0 },
            { q: "150 + 150 = ?", a: [200, 300, 250, 350], correct: 1 },
            { q: "500 - 300 = ?", a: [200, 400, 300, 100], correct: 0 },
            { q: "100 : 5 = ?", a: [25, 10, 20, 15], correct: 2 },
            { q: "Số chẵn liền sau 100?", a: [101, 103, 102, 104], correct: 2 }
        ];

        let currentQ = 0;
        let score = 0;
        let canClick = true;
        let timeLeft = 20 * 60; // 20 phút
        let timerInterval;

        // Đồng hồ đếm ngược
        timerInterval = setInterval(() => {
            if(timeLeft > 0){
                timeLeft--;
                let m = Math.floor(timeLeft / 60).toString().padStart(2,'0');
                let s = (timeLeft % 60).toString().padStart(2,'0');
                document.getElementById("timer").innerText = m + ":" + s;
            } else {
                endGame(); // Hết giờ tự động kết thúc
            }
        }, 1000);

        function loadQuestion() {
            if(currentQ >= questions.length){
                endGame();
                return;
            }

            const q = questions[currentQ];
            document.getElementById("question").innerText = "Câu " + (currentQ+1) + ": " + q.q;

            const left = document.getElementById("ansLeft");
            const right = document.getElementById("ansRight");
            left.innerHTML = "";
            right.innerHTML = "";

            q.a.forEach((ans, idx) => {
                let btn = document.createElement("div");
                btn.className = "wood-btn";
                btn.innerText = ans;
                btn.onclick = () => checkAnswer(idx, q.correct);
                
                if(idx < 2) left.appendChild(btn);
                else right.appendChild(btn);
            });

            resetState();
        }

        function checkAnswer(choice, correct) {
            if(!canClick) return;
            canClick = false;

            const ball = document.getElementById("ball");
            const gk = document.getElementById("goalkeeper");

            if(choice === correct) {
                ball.classList.add("anim-goal");
                gk.classList.add("gk-jump-left");
                
                score += 10;
                document.getElementById("score").innerText = score;
                showMsg("VÀOOO!", "#76ff03");
            } else {
                ball.classList.add("anim-miss");
                gk.classList.add("gk-jump-right");
                showMsg("KHÔNG VÀO!", "#ff1744");
            }

            setTimeout(() => {
                currentQ++;
                loadQuestion();
                canClick = true;
                document.getElementById("msgResult").style.display = "none";
            }, 1500);
        }

        function showMsg(txt, color) {
            const m = document.getElementById("msgResult");
            m.innerText = txt;
            m.style.color = color;
            m.style.display = "block";
        }

        function resetState() {
            const ball = document.getElementById("ball");
            const gk = document.getElementById("goalkeeper");
            ball.className = "ball";
            gk.className = "goalkeeper-img";
        }

        // --- HÀM KẾT THÚC GAME (ĐÃ SỬA LỖI) ---
        function endGame() {
            clearInterval(timerInterval);

            // 1. HIỆN BẢNG ĐIỂM
            document.getElementById("endGameModal").style.display = "flex";
            document.getElementById("finalScoreDisplay").innerText = score;

            // 2. TÍNH THỜI GIAN
            let totalSeconds = (20 * 60) - timeLeft;
            let m = Math.floor(totalSeconds / 60).toString().padStart(2, '0');
            let s = (totalSeconds % 60).toString().padStart(2, '0');
            let timeTaken = m + ":" + s;

            // 3. GỬI DỮ LIỆU VỀ SERVER
            
            // --- SỬA Ở ĐÂY: Dùng PHP để in tên bài vào biến Javascript ---
            let lessonName = "<?php echo $ten_bai_hien_tai; ?>"; 
            // -----------------------------------------------------------

            let formData = new FormData();
            formData.append('ten_bai', lessonName);
            formData.append('diem', score); 
            formData.append('thoi_gian', timeTaken);

            fetch('luu_diem.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                console.log("Đã lưu điểm: " + data);
            })
            .catch(error => {
                console.error("Lỗi khi lưu điểm:", error);
            });
        }

        loadQuestion();
    </script>
</body>
</html>