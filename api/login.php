<?php
session_start();
require_once '../db/connection.php';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($username) || empty($password)) {
    echo "請輸入帳號和密碼！";
    exit;
}

try {
    // 從資料庫獲取使用者資料
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();

    if ($user) {
        var_dump($user); // 除錯：檢查從資料庫獲取的資料
        if (password_verify($password, $user['password'])) {
            // 登入成功，儲存 Session
            session_regenerate_id(true); // 防止 Session 固定攻擊
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header('Location: ../index.php'); // 跳轉到首頁
            exit;
        } else {
            echo "密碼驗證失敗！";
            var_dump($password, $user['password']); // 除錯：檢查密碼
        }
    } else {
        echo "找不到使用者！";
    }
} catch (PDOException $e) {
    die("登入失敗：" . $e->getMessage());
}
