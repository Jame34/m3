<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

require_once 'db/connection.php';

// 獲取用戶的作品
$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM user_projects WHERE user_id = ? ORDER BY created_at DESC");
$stmt->execute([$user_id]);
$projects = $stmt->fetchAll(PDO::FETCH_ASSOC);

include 'templates/header.php';
include 'templates/navbar.php';
?>

<link rel="stylesheet" href="assets/css/gallery.css">

<div class="gallery-container">
    <h2>學習畫廊</h2>
    <div class="actions">
        <button onclick="window.location.href='upload_project.php'">新增作品</button>
    </div>
    <div class="projects">
        <?php if (count($projects) > 0): ?>
            <?php foreach ($projects as $project): ?>
                <div class="project-card">
                    <h3>作品名：<?php echo htmlspecialchars($project['project_name']); ?></h3>
                    <p>類別：<?php echo htmlspecialchars($project['category']); ?></p>
                    <p>日期：<?php echo date('Y-m-d', strtotime($project['created_at'])); ?></p>
                    <a href="project_detail.php?id=<?php echo $project['id']; ?>">[查看更多]</a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>目前尚無作品。</p>
        <?php endif; ?>
    </div>
</div>

<?php include 'templates/footer.php'; ?>
