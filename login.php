<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: index.php'); // 已登入則跳轉首頁
    exit;
}
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: #ffffff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        .container h2 {
            margin-bottom: 1.5rem;
            color: #333333;
        }

        .container label {
            display: block;
            margin-bottom: 0.5rem;
            text-align: left;
            font-weight: bold;
            color: #555555;
        }

        .container input {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
            border: 1px solid #cccccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .container button {
            width: 100%;
            padding: 0.7rem;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
        }

        .container button:hover {
            background-color: #0056b3;
        }

        .back-button {
            margin-top: 1rem;
            padding: 0.5rem;
            background-color: #e0e0e0;
            color: #333;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
        }

        .back-button:hover {
            background-color: #cccccc;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>登入</h2>
        <form action="api/login.php" method="POST">
            <label for="username">帳號：</label>
            <input type="text" name="username" id="username" required>

            <label for="password">密碼：</label>
            <input type="password" name="password" id="password" required>

            <button type="submit">登入</button>
        </form>

        <button class="back-button" onclick="window.history.back();">返回</button>
    </div>
</body>
</html>
