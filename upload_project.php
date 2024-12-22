<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

require_once 'db/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $project_name = $_POST['project_name'];
    $category = $_POST['category'];
    $project_description = $_POST['project_description'];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        $stmt = $pdo->prepare(query: "INSERT INTO user_projects (user_id, project_name, category, project_description) VALUES (?, ?, ?, ?)");
        $stmt->execute([$user_id, $project_name, $category, $project_description]);
        header('Location: gallery.php');
    } else {
        $error = "檔案上傳失敗。";
    }
}

include 'templates/header.php';
include 'templates/navbar.php';
?>

<link rel="stylesheet" href="assets/css/upload.css">

<div class="upload-container">
    <h2>新增作品</h2>
    <form method="POST" enctype="multipart/form-data">
        <label>作品名稱</label>
        <input type="text" name="project_name" required>
        
        <label>選擇分類</label>
        <select name="category" required>
            <option value="Python">Python</option>
            <option value="C++">C++</option>
            <option value="Java">Java</option>
            <option value="HTML/CSS">HTML/CSS</option>
        </select>

        <label>檔案上傳</label>
        <input type="file" name="file" accept=".zip,.jpg,.png" required>

        <label>作品描述</label>
        <textarea name="description"></textarea>

        <button type="submit">上傳</button>
        <?php if (isset($error)): ?>
            <p><?php echo $error; ?></p>
        <?php endif; ?>
    </form>
</div>

<?php include 'templates/footer.php'; ?>
