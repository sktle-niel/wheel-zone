<?php
// Read shop links and return as JSON.
require_once '../../connection/connection.php';

header('Content-Type: application/json');

$shopLinks = [];

$sql = 'SELECT id, name, url, image_path
        FROM shop_links
        ORDER BY id DESC';

$result = $conn->query($sql);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $shopLinks[] = [
            'id' => (int) $row['id'],
            'name' => $row['name'],
            'url' => $row['url'],
            'image_path' => $row['image_path'],
        ];
    }
    $result->free();
}

$conn->close();

echo json_encode($shopLinks);
?>
