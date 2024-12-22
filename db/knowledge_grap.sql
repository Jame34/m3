-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-12-19 04:38:01
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `knowledge_grap`
--

-- --------------------------------------------------------

--
-- 資料表結構 `knowledge_nodes`
--

CREATE TABLE `knowledge_nodes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `completed` tinyint(1) DEFAULT 0,
  `level` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `knowledge_nodes`
--

INSERT INTO `knowledge_nodes` (`id`, `name`, `description`, `created_at`, `updated_at`, `completed`, `level`) VALUES
(1, 'Python', 'Python 程式語言的基本語法和應用', '2024-12-19 07:20:43', '2024-12-19 07:20:43', 0, 1),
(2, 'JavaScript', 'JavaScript 程式語言的基本語法和應用', '2024-12-19 07:20:43', '2024-12-19 07:20:43', 0, 1),
(3, 'Python 資料處理', '使用 pandas 處理數據', '2024-12-19 07:20:43', '2024-12-19 07:20:43', 0, 2),
(4, 'Python 機器學習', '使用 scikit-learn 進行機器學習', '2024-12-19 07:20:43', '2024-12-19 07:20:43', 0, 2),
(5, 'Python 網站開發', '使用 Flask 和 Django 建立網站', '2024-12-19 07:20:43', '2024-12-19 07:20:43', 0, 3),
(6, 'JavaScript DOM 操作', '操作 HTML DOM 結構', '2024-12-19 07:20:43', '2024-12-19 07:20:43', 0, 2),
(7, 'JavaScript 網站開發', '使用 Node.js 和 Express 建立網站', '2024-12-19 07:20:43', '2024-12-19 07:20:43', 0, 3),
(8, '網站開發基礎', '學習如何使用前後端技術進行網站開發', '2024-12-19 07:20:43', '2024-12-19 07:20:43', 0, 3),
(9, 'RESTful API 開發', '學習如何設計和實現 RESTful API', '2024-12-19 07:20:43', '2024-12-19 07:20:43', 0, 4),
(10, 'C 語言基礎', '學習 C 語言的基本語法和結構', '2024-12-19 07:20:43', '2024-12-19 07:20:43', 0, 1),
(11, '數字型態', '理解 C 語言中的整數、浮點數和字符型態', '2024-12-19 07:20:43', '2024-12-19 07:20:43', 0, 2),
(12, '指標', '學習指標的概念和用法', '2024-12-19 07:20:43', '2024-12-19 07:20:43', 0, 3),
(13, '陣列', '學習如何使用陣列處理數據', '2024-12-19 07:20:43', '2024-12-19 07:20:43', 0, 3),
(14, '字串處理', '學習如何操作字串', '2024-12-19 07:20:43', '2024-12-19 07:20:43', 0, 4),
(15, '函數', '學習函數的定義與使用', '2024-12-19 07:20:43', '2024-12-19 07:20:43', 0, 4),
(16, '記憶體管理', '理解 C 語言的動態記憶體分配', '2024-12-19 07:20:43', '2024-12-19 07:20:43', 0, 5),
(17, '資料結構', '學習鏈結串列、堆疊和佇列', '2024-12-19 07:20:43', '2024-12-19 07:20:43', 0, 5),
(18, '資料科學基礎', '資料清洗與前處理', '2024-12-19 07:20:43', '2024-12-19 07:20:43', 0, 1),
(19, '統計與機率', '資料科學中的統計基礎', '2024-12-19 07:20:43', '2024-12-19 07:20:43', 0, 2),
(20, '機器學習概念', '理解基本的機器學習模型', '2024-12-19 07:20:43', '2024-12-19 07:20:43', 0, 2),
(21, '視覺化工具', '使用 Matplotlib 和 Seaborn 進行數據視覺化', '2024-12-19 07:20:43', '2024-12-19 07:20:43', 0, 3),
(22, '自然語言處理 NLP', 'NLP 技術應用', '2024-12-19 07:20:43', '2024-12-19 07:20:43', 0, 3),
(28, '視覺化工具', '使用 Matplotlib 和 Seaborn 進行數據視覺化', '2024-12-19 07:11:39', '2024-12-19 07:11:39', 0, 3),
(29, '網站開發基礎', '學習如何使用前後端技術進行網站開發', '2024-12-19 07:16:18', '2024-12-19 07:16:18', 0, 3),
(30, 'Python 網站開發', '使用 Flask 和 Django 建立網站', '2024-12-19 07:16:18', '2024-12-19 07:16:18', 0, 4),
(31, 'JavaScript 網站開發', '使用 Node.js 和 Express 建立網站', '2024-12-19 07:16:18', '2024-12-19 07:16:18', 0, 4),
(32, 'RESTful API 開發', '學習如何設計和實現 RESTful API', '2024-12-19 07:16:18', '2024-12-19 07:16:18', 0, 5);

-- --------------------------------------------------------

--
-- 資料表結構 `knowledge_relations`
--

CREATE TABLE `knowledge_relations` (
  `id` int(11) NOT NULL,
  `source_node_id` int(11) NOT NULL,
  `target_node_id` int(11) NOT NULL,
  `relation_type` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `knowledge_relations`
--

INSERT INTO `knowledge_relations` (`id`, `source_node_id`, `target_node_id`, `relation_type`, `created_at`) VALUES
(43, 1, 3, '依賴', '2024-12-19 07:21:29'),
(44, 1, 4, '依賴', '2024-12-19 07:21:29'),
(45, 1, 5, '依賴', '2024-12-19 07:21:29'),
(46, 5, 8, '依賴', '2024-12-19 07:21:29'),
(47, 2, 6, '依賴', '2024-12-19 07:21:29'),
(48, 2, 7, '依賴', '2024-12-19 07:21:29'),
(49, 7, 8, '依賴', '2024-12-19 07:21:29'),
(50, 8, 9, '依賴', '2024-12-19 07:21:29'),
(51, 10, 11, '依賴', '2024-12-19 07:21:29'),
(52, 11, 12, '依賴', '2024-12-19 07:21:29'),
(53, 12, 13, '依賴', '2024-12-19 07:21:29'),
(54, 13, 14, '依賴', '2024-12-19 07:21:29'),
(55, 13, 15, '依賴', '2024-12-19 07:21:29'),
(56, 14, 16, '依賴', '2024-12-19 07:21:29'),
(57, 15, 17, '依賴', '2024-12-19 07:21:29'),
(58, 18, 19, '依賴', '2024-12-19 07:21:29'),
(59, 18, 20, '依賴', '2024-12-19 07:21:29'),
(60, 20, 22, '依賴', '2024-12-19 07:21:29'),
(61, 18, 21, '依賴', '2024-12-19 07:21:29');

-- --------------------------------------------------------

--
-- 資料表結構 `learning_paths`
--

CREATE TABLE `learning_paths` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `subcategory` varchar(255) NOT NULL,
  `goal` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `learning_paths`
--

INSERT INTO `learning_paths` (`id`, `category`, `subcategory`, `goal`, `created_at`) VALUES
(1, '程式語言與開發', 'python基礎', '掌握python程式語言', '2024-12-18 10:24:52'),
(2, '程式語言與開發', 'python基礎', '掌握python程式語言', '2024-12-18 10:26:51'),
(3, '語言學習', '英文初級', '提升英文基礎能力，通過 TOEIC 600 分', '2024-12-18 10:28:32'),
(4, '數學與統計', 'python基礎', '掌握python程式語言', '2024-12-18 23:23:36');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `facebook`, `instagram`, `linkedin`, `bio`, `created_at`) VALUES
(1, 'test_user', 'Test@1234', 'test_user@example.com', 'https://facebook.com/test_user', 'https://instagram.com/test_user', 'https://linkedin.com/in/test_user', '嗨！我是小趙，這是我的自我介紹，熱愛學習 Python 和 AI。', '2024-12-18 11:50:24');

-- --------------------------------------------------------

--
-- 資料表結構 `users_skills`
--

CREATE TABLE `users_skills` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `skill_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `users_skills`
--

INSERT INTO `users_skills` (`id`, `user_id`, `skill_name`) VALUES
(1, 1, 'Python 資料處理'),
(2, 1, 'Python 視覺化'),
(3, 1, 'C++ 遊戲開發'),
(4, 1, 'JavaScript 網頁開發'),
(5, 1, 'Python 資料處理'),
(6, 1, 'Python 視覺化'),
(7, 1, 'C++ 遊戲開發'),
(8, 1, 'JavaScript 網頁開發');

-- --------------------------------------------------------

--
-- 資料表結構 `user_learning_experience`
--

CREATE TABLE `user_learning_experience` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `topic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `user_learning_experience`
--

INSERT INTO `user_learning_experience` (`id`, `user_id`, `category`, `topic`) VALUES
(1, 1, 'Python', '爬蟲'),
(2, 1, 'Python', '資料處理'),
(3, 1, 'Python', '機器學習'),
(4, 1, 'Python', '視覺化'),
(5, 1, 'C 語言', '記憶體管理'),
(6, 1, 'C 語言', '資料結構'),
(7, 1, 'C++', 'SLT'),
(8, 1, 'C++', '遊戲開發'),
(9, 1, 'C++', '嵌入式');


-- --------------------------------------------------------

--
-- 資料表結構 `user_learning_status`
--

CREATE TABLE `user_learning_status` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `node_id` int(11) NOT NULL,
  `completed_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `knowledge_nodes`
--
ALTER TABLE `knowledge_nodes`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `knowledge_relations`
--
ALTER TABLE `knowledge_relations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `source_node_id` (`source_node_id`),
  ADD KEY `target_node_id` (`target_node_id`);

--
-- 資料表索引 `learning_paths`
--
ALTER TABLE `learning_paths`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- 資料表索引 `users_skills`
--
ALTER TABLE `users_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- 資料表索引 `user_learning_experience`
--
ALTER TABLE `user_learning_experience`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- 資料表索引 `user_learning_status`
--
ALTER TABLE `user_learning_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `node_id` (`node_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `knowledge_nodes`
--
ALTER TABLE `knowledge_nodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `knowledge_relations`
--
ALTER TABLE `knowledge_relations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `learning_paths`
--
ALTER TABLE `learning_paths`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users_skills`
--
ALTER TABLE `users_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user_learning_experience`
--
ALTER TABLE `user_learning_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user_learning_status`
--
ALTER TABLE `user_learning_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `knowledge_relations`
--
ALTER TABLE `knowledge_relations`
  ADD CONSTRAINT `knowledge_relations_ibfk_1` FOREIGN KEY (`source_node_id`) REFERENCES `knowledge_nodes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `knowledge_relations_ibfk_2` FOREIGN KEY (`target_node_id`) REFERENCES `knowledge_nodes` (`id`) ON DELETE CASCADE;

--
-- 資料表的限制式 `users_skills`
--
ALTER TABLE `users_skills`
  ADD CONSTRAINT `users_skills_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- 資料表的限制式 `user_learning_experience`
--
ALTER TABLE `user_learning_experience`
  ADD CONSTRAINT `user_learning_experience_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- 資料表的限制式 `user_learning_status`
--
ALTER TABLE `user_learning_status`
  ADD CONSTRAINT `user_learning_status_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_learning_status_ibfk_2` FOREIGN KEY (`node_id`) REFERENCES `knowledge_nodes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE TABLE `user_projects` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `project_name` VARCHAR(255) NOT NULL,
    `project_description` TEXT,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
);

ALTER TABLE `user_projects`
ADD `category` VARCHAR(255) NOT NULL;
