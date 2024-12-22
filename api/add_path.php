<?php
require_once '../db/connection.php';
header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);

$category = $data['category'] ?? null;
$subcategory = $data['subcategory'] ?? null;
$goal = $data['goal'] ?? null;

if (!$category || !$subcategory || !$goal) {
    echo json_encode(['success' => false, 'error' => '所有欄位皆為必填']);
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO learning_paths (category, subcategory, goal) VALUES (?, ?, ?)");
    $stmt->execute([$category, $subcategory, $goal]);
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>
