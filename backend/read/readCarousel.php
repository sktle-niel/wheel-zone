<?php
// Fetch carousel items from DB in display_order asc, newest fallback.
require_once '../../../connection/connection.php';

header('Content-Type: application/json');

$sql = 'SELECT id, title, image_path, display_order, created_at, updated_at
        FROM carousel_items
        ORDER BY display_order ASC, id DESC';

$result = $conn->query($sql);

if ($result === false) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Query failed']);
    exit;
}

$items = [];
while ($row = $result->fetch_assoc()) {
    $items[] = [
        'id' => (int) $row['id'],
        'title' => $row['title'],
        'image_path' => $row['image_path'],
        'display_order' => (int) $row['display_order'],
        'created_at' => $row['created_at'],
        'updated_at' => $row['updated_at'],
    ];
}

$result->free();
$conn->close();

echo json_encode(['success' => true, 'data' => $items]);
exit;
