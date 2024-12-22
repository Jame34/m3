<?php
require_once '../db/connection.php';

try {
    $query = "SELECT * FROM knowledge_nodes";
    $stmt = $pdo->query($query);
    $nodes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($nodes);
} catch (PDOException $e) {
    echo json_encode(['error' => "獲取節點資料失敗：" . $e->getMessage()]);
}
?>
