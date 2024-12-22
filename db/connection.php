<?php
$host = 'localhost'; // 資料庫主機
$db   = 'knowledge_grap'; // 資料庫名稱
$user = 'root'; // 使用者帳號
$pass = ''; // 使用者密碼
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    die("資料庫連接失敗：" . $e->getMessage());
}
?>
