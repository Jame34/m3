<?php
include 'db_connection.php';

$category = $_GET['category'] ?? '';

$sqlNodes = "SELECT * FROM knowledge_nodes WHERE id IN (
    SELECT id FROM learning_paths WHERE category = ?)";
$sqlRelations = "SELECT * FROM knowledge_relations WHERE source_node_id IN (
    SELECT id FROM knowledge_nodes WHERE id IN (
        SELECT id FROM learning_paths WHERE category = ?))";

$stmtNodes = $conn->prepare($sqlNodes);
$stmtNodes->bind_param("s", $category);
$stmtNodes->execute();
$nodes = $stmtNodes->get_result()->fetch_all(MYSQLI_ASSOC);

$stmtRelations = $conn->prepare($sqlRelations);
$stmtRelations->bind_param("s", $category);
$stmtRelations->execute();
$relations = $stmtRelations->get_result()->fetch_all(MYSQLI_ASSOC);

echo json_encode(['nodes' => $nodes, 'relations' => $relations]);
