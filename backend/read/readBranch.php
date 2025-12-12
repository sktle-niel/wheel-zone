<?php
// Fetch branches from DB in display_order asc, newest fallback.
require_once '../../connection/connection.php';

header('Content-Type: application/json');

$sql = 'SELECT id, name, address, maps, facebook, hours, services, created_at, updated_at
        FROM branches
        ORDER BY id DESC';

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
        'address' => $row['address'],
        'maps' => $row['maps'],
        'facebook' => $row['facebook'],
        'hours' => $row['hours'],
        'services' => $row['services'],
        'created_at' => $row['created_at'],
        'updated_at' => $row['updated_at'],
    ];
}

$result->free();
$conn->close();

echo json_encode(['success' => true, 'data' => $items]);
exit;
