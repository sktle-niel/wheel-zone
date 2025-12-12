<?php
// Fetch featured products from DB in display_order asc, newest fallback.
require_once '../../../connection/connection.php';

header('Content-Type: application/json');

$sql = 'SELECT id, name, image_path, display_order
        FROM featured_products
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
        'name' => $row['name'],
        'image_path' => $row['image_path'],
        'display_order' => (int) $row['display_order'],
    ];
}

$result->free();
$conn->close();

echo json_encode(['success' => true, 'data' => $items]);
exit;
