<?php
// Only call session_start if it hasn't already been called
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$isLoggedIn = isset($_SESSION['user_id']); // Check if user is logged in
?>
<nav class="navbar">
    <div class="navbar-logo">
        <a href="index.php">
            <img src="assets/images/mm_logo.png" alt="Logo" class="logo-image">
        </a>
    </div>
    <ul class="navbar-list">
        <li><a href="index.php">網站首頁</a></li>
        <li><a href="recommend_jobs.php">職業推薦</a></li>
        <li><a href="gallery.php">學習畫廊</a></li>
        <li><a href="profile.php">我的個人資料</a></li>
        <?php if ($isLoggedIn): ?>
            <li><a href="logout.php">登出</a></li>
        <?php endif; ?>
    </ul>
</nav>

<style>
.navbar {
    background-color: rgba(0, 0, 0, 0.7); /* Increased transparency */
    border-bottom: 2px solid #0e2747;
    padding: 15px 0;
    text-align: center;
    box-shadow: 0 0 10px rgba(0, 255, 255, 0.2);
    position: relative;
    z-index: 1000;
    background: linear-gradient(145deg, rgba(17, 42, 82, 0.7), rgba(10, 28, 59, 0.7)); /* Added transparency to gradient */
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.navbar-logo {
    margin-left: 20px; /* logo 左側留白 */
}

.logo-image {
    height: 50px; /* 調整 logo 大小 */
}

.navbar-list {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
}

.navbar-list li {
    margin: 0 20px;
}

.navbar-list a {
    text-decoration: none;
    color: white; /* 將字體顏色設為白色 */
    font-size: 20px; /* 字體放大 */
    font-weight: bold;
    text-shadow: 0 0 5px white;
    transition: color 0.3s, transform 0.3s; /* 新增字體放大效果 */
    padding: 10px 20px; /* 增加按鈕感 */
    border-radius: 5px; /* 圓角背景 */
    background: rgba(255, 255, 255, 0.1); /* 淡白色背景 */
    transition: background-color 0.3s, transform 0.3s;
}

.navbar-list a:hover {
    color: #1e90ff; /* 懸停時字體顏色變為藍色 */
    transform: scale(1.1); /* 懸停時放大 */
    text-shadow: 0 0 10px #1e90ff;
    background-color: rgba(255, 255, 255, 0.3); /* 懸停時背景變亮 */
}
</style>
