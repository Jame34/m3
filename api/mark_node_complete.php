<?php
header('Content-Type: application/json');
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'error' => '只允許 POST 請求']);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);
if (!isset($data['nodeId'])) {
    echo json_encode(['success' => false, 'error' => '缺少 nodeId']);
    exit;
}

require_once 'db/connection.php';

$nodeId = intval($data['nodeId']);
$userId = $_SESSION['user_id'] ?? null;

if (!$userId) {
    echo json_encode(['success' => false, 'error' => '未登入']);
    exit;
}

$stmt = $pdo->prepare("INSERT INTO user_learning_status (user_id, node_id) VALUES (?, ?) 
                       ON DUPLICATE KEY UPDATE completed_at = CURRENT_TIMESTAMP");
if ($stmt->execute([$userId, $nodeId])) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => '無法更新學習進度']);
}
?>
