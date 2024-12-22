<?php include 'templates/header.php'; ?>
<link rel="stylesheet" href="assets/css/style.css">
<?php include 'templates/navbar.php'; ?>

<div class="container">
    <!-- 左側影片區 -->
    <div class="video-section">
        <h3>推薦影片</h3>
        <div id="youtube-videos">
            <p>請點擊學習路徑節點以顯示相關影片</p>
        </div>
    </div>

    <!-- 右側學習路徑圖 -->
    <div class="graph-section">
        <h3>學習路徑圖</h3>
        <div style="position: relative;">
            <a href="add_path.php" class="add-path-button" style="position: absolute; top: 10px; right: 10px; padding: 8px 15px; background-color: transparent; color: #00ffff; border: 2px solid #00ffff; border-radius: 5px; text-decoration: none; font-weight: bold; cursor: pointer; z-index: 1000;">新增學習路徑</a>
            <div id="knowledge-graph" style="width: 100%; height: 80vh; position: relative;"></div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal" id="loginModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); justify-content: center; align-items: center; z-index: 1000;">
    <div class="modal-content" style="background: #ffffff; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); width: 300px; text-align: center; position: relative;">
        <span class="modal-close" id="closeModal" style="position: absolute; top: 10px; right: 10px; cursor: pointer; font-size: 5rem; font-weight: bold; color: #888888;">&times;</span>
        <h2>登入</h2>
        <form action="api/login.php" method="POST">
            <label for="username">帳號：</label>
            <input type="text" name="username" id="username" required style="width: 100%; padding: 0.5rem; margin-bottom: 1rem; border: 1px solid #cccccc; border-radius: 4px; box-sizing: border-box;">

            <label for="password">密碼：</label>
            <input type="password" name="password" id="password" required style="width: 100%; padding: 0.5rem; margin-bottom: 1rem; border: 1px solid #cccccc; border-radius: 4px; box-sizing: border-box;">

            <button type="submit" style="width: 100%; padding: 0.7rem; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 1rem;">登入</button>
        </form>
    </div>
</div>

<script src="assets/js/vis.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r110/three.min.js"></script>
<script src="assets/js/script.js"></script>

<script>
    // 確保頁面載入完成後進行初始化
    document.addEventListener('DOMContentLoaded', () => {
        console.log("頁面初始化完成，開始載入學習路徑圖...");

        const loginButton = document.createElement('button');
        loginButton.textContent = '登入';
       loginButton.style = `
    position: fixed;
    bottom: 20px;
    right: 20px;
    padding: 10px 20px;
    font-size: 20px;
    font-weight: bold;
    color: white;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 5px;
    border: none;
    text-decoration: none;
    text-shadow: 0 0 5px white;
    transition: color 0.3s, transform 0.3s, background-color 0.3s;
    cursor: pointer;
`;

loginButton.addEventListener('mouseover', () => {
    loginButton.style.transform = 'scale(1.1)'; // Slight zoom on hover
});

loginButton.addEventListener('mouseout', () => {
    loginButton.style.transform = 'scale(1)'; // Reset to original size
});
        document.body.appendChild(loginButton);

        const loginModal = document.getElementById('loginModal');
        const closeModal = document.getElementById('closeModal');

        // 打開彈窗
        loginButton.addEventListener('click', () => {
            loginModal.style.display = 'flex';
        });

        // 關閉彈窗
        closeModal.addEventListener('click', () => {
            loginModal.style.display = 'none';
        });

        // 點擊彈窗外部區域關閉
        window.addEventListener('click', (event) => {
            if (event.target === loginModal) {
                loginModal.style.display = 'none';
            }
        });
    });

    // 添加錯誤提示
    window.onerror = function (message, source, lineno, colno, error) {
        console.error("頁面錯誤捕捉：", { message, source, lineno, colno, error });
        alert("頁面載入時發生錯誤，請檢查瀏覽器的開發者工具進行排查。");
    };
</script>

<?php include 'templates/footer.php'; ?>
