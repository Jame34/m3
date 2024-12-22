<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

require_once 'db/connection.php';

// 獲取使用者資料
$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    die("找不到使用者資料");
}

// 檢查 avatar 欄位是否有值，沒有則使用預設圖片
$avatar = !empty($user['avatar']) ? htmlspecialchars($user['avatar']) : 'assets/images/default-avatar.png';
?>

<?php include 'templates/header.php'; ?>
<?php include 'templates/navbar.php'; ?>
<link rel="stylesheet" href="assets/css/profile.css">

<div class="profile-container">
    <!-- Left Section -->
    <div class="left-section">
        <div class="profile-header">
            <img src="<?php echo $avatar; ?>" alt="User Avatar" class="profile-avatar">
            <button id="change-avatar" class="btn btn-secondary">更改大頭貼</button>
        </div>

        <div class="profile-info">
            <h2><?php echo htmlspecialchars($user['id']); ?></h2>
            <p><strong>ID：</strong><?php echo htmlspecialchars($user['id']); ?></p>
            <p><strong>Facebook：</strong><a href="<?php echo htmlspecialchars($user['facebook']); ?>" target="_blank"><?php echo htmlspecialchars($user['facebook'] ?: '未提供'); ?></a></p>
            <p><strong>Instagram：</strong><a href="<?php echo htmlspecialchars($user['instagram']); ?>" target="_blank"><?php echo htmlspecialchars($user['instagram'] ?: '未提供'); ?></a></p>
            <p><strong>LinkedIn：</strong><a href="<?php echo htmlspecialchars($user['linkedin']); ?>" target="_blank"><?php echo htmlspecialchars($user['linkedin'] ?: '未提供'); ?></a></p>
        </div>
        
        <div class="profile-bio">
            <h3>自我介紹</h3>
            <p><?php echo htmlspecialchars($user['bio']) ?: '暫無自我介紹內容'; ?></p>
        </div>
    </div>

    <!-- Right Section -->
    <div class="right-section">
        <!-- Learning Experience Section -->
        <div class="learning-experience">
            <h3>學習經歷</h3>
            <?php
            // 獲取學習經歷
            $exp_stmt = $pdo->prepare("SELECT category, topic FROM user_learning_experience WHERE user_id = ?");
            $exp_stmt->execute([$user_id]);
            $learning_experience = $exp_stmt->fetchAll(PDO::FETCH_ASSOC);

            // 整理學習經歷按類別分類
            $experience_by_category = [];
            foreach ($learning_experience as $exp) {
                $experience_by_category[$exp['category']][] = $exp['topic'];
            }
            ?>

            <?php foreach ($experience_by_category as $category => $topics): ?>
                <div class="section">
                    <h4><?php echo htmlspecialchars($category); ?></h4>
                    <ul>
                        <?php foreach ($topics as $topic): ?>
                            <li><?php echo htmlspecialchars($topic); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Actions -->
        <div class="profile-actions">
            <button onclick="window.location.href='gallery.php'" class="btn btn-primary">畫廊</button>
            <button onclick="window.location.href='change_password.php'" class="btn btn-primary">修改密碼</button>
        </div>
    </div>
</div>

<?php include 'templates/footer.php'; ?>
