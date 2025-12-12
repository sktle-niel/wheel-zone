<?php
// Update a shop link (name and URL only).
require_once '../../connection/connection.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../../admin/pages/shopLinks.php');
    exit;
}

$id = (int) ($_POST['id'] ?? 0);
$name = trim($_POST['name'] ?? '');
$url = trim($_POST['url'] ?? '');

if ($id <= 0 || $name === '' || $url === '') {
    header('Location: ../../admin/pages/shopLinks.php?status=update_error');
    exit;
}

// Check if shop link exists
try {
    $stmt = $conn->prepare('SELECT id FROM shop_links WHERE id = ?');
    $stmt->execute([$id]);
    $hasRow = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$hasRow) {
        header('Location: ../../admin/pages/shopLinks.php?status=update_error');
        exit;
    }

    // Update DB row
    $updateStmt = $conn->prepare('UPDATE shop_links SET name = ?, url = ? WHERE id = ?');
    $updateStmt->execute([$name, $url, $id]);

    header('Location: ../../admin/pages/shopLinks.php?status=update_success');
    exit;
} catch (PDOException $e) {
    error_log('Database error: ' . $e->getMessage());
    header('Location: ../../admin/pages/shopLinks.php?status=update_error');
    exit;
}
?>
