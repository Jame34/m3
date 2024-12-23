<?php
session_start();
require_once '../db/connection.php';

$username = filter_var($_POST['username'] ?? '', FILTER_SANITIZE_STRING);
$password = trim($_POST['password'] ?? '');

if ($username && $password) {
    try {
        // Fetch user data from database
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            // Login successful, regenerate session ID and store session data
            session_regenerate_id(true);
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header('Location: ../index.php'); // Redirect to home page
            exit;
        } else {
            echo "帳號或密碼錯誤！";
        }
    } catch (PDOException $e) {
        die("登入失敗，請稍後再試！");
    }
} else {
    echo "請輸入帳號和密碼！";
}
