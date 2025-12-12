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
$stmt = $conn->prepare('SELECT id FROM shop_links WHERE id = ?');
if (!$stmt) {
    header('Location: ../../admin/pages/shopLinks.php?status=update_error');
    exit;
}
$stmt->bind_param('i', $id);
$stmt->execute();
$hasRow = $stmt->fetch();
$stmt->close();

if (!$hasRow) {
    header('Location: ../../admin/pages/shopLinks.php?status=update_error');
    exit;
}

// Update DB row
$updateStmt = $conn->prepare('UPDATE shop_links SET name = ?, url = ? WHERE id = ?');
if (!$updateStmt) {
    error_log('Update prepare failed: ' . $conn->error);
    header('Location: ../../admin/pages/shopLinks.php?status=update_error');
    exit;
}
$updateStmt->bind_param('ssi', $name, $url, $id);
$ok = $updateStmt->execute();
if (!$ok) {
    error_log('Update execute failed: ' . $updateStmt->error);
}
$updateStmt->close();
$conn->close();

if ($ok) {
    header('Location: ../../admin/pages/shopLinks.php?status=update_success');
    exit;
}

header('Location: ../../admin/pages/shopLinks.php?status=update_error');
exit;
?>
