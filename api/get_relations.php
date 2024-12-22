<?php
require_once '../db/connection.php';

try {
    $query = "SELECT * FROM knowledge_relations";
    $stmt = $pdo->query($query);
    $relations = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($relations);
} catch (PDOException $e) {
    echo json_encode(['error' => "獲取關係資料失敗：" . $e->getMessage()]);
}
?>
