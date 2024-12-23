<?php
session_start();
require_once '../db/connection.php';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if ($username && $password) {
    try {
        // 從資料庫獲取使用者資料
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch();

        if ($user && $password === $user['password']) { // 直接比對明文密碼
            // 登入成功，儲存 Session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header('Location: ../index.php'); // 跳轉到首頁
            exit;
        } else {
            echo "帳號或密碼錯誤！";
        }
    } catch (PDOException $e) {
        die("登入失敗：" . $e->getMessage());
    }
} else {
    echo "請輸入帳號和密碼！";
}
?>
