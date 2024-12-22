<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

require_once 'db/connection.php';

$project_id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM user_projects WHERE id = ?");
$stmt->execute([$project_id]);
$project = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$project || $project['user_id'] != $_SESSION['user_id']) {
    die("無權訪問該作品。");
}

include 'templates/header.php';
include 'templates/navbar.php';
?>

<link rel="stylesheet" href="assets/css/detail.css">

<div class="detail-container">
    <h2>作品詳細頁面</h2>
    <div class="detail">
        <h3>作品名：<?php echo htmlspecialchars($project['project_name']); ?></h3>
        <p>類別：<?php echo htmlspecialchars($project['category']); ?></p>
        <p>描述：<?php echo htmlspecialchars($project['project_description']); ?></p>
        <p>上傳時間：<?php echo date('Y-m-d', strtotime($project['created_at'])); ?></p>
        <a href="<?php echo htmlspecialchars($project['file_path']); ?>" download>下載檔案</a>
    </div>
</div>

<?php include 'templates/footer.php'; ?>
