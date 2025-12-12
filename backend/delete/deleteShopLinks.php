<?php
// Delete a shop link.
require_once '../../connection/connection.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../../admin/pages/shopLinks.php');
    exit;
}

$id = (int) ($_POST['id'] ?? 0);
if ($id <= 0) {
    header('Location: ../../admin/pages/shopLinks.php?status=delete_invalid');
    exit;
}

// Check if shop link exists and get image path
$stmt = $conn->prepare('SELECT id, image_path FROM shop_links WHERE id = ?');
if (!$stmt) {
    header('Location: ../../admin/pages/shopLinks.php?status=delete_db_error');
    exit;
}
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();

if (!$row) {
    header('Location: ../../admin/pages/shopLinks.php?status=delete_not_found');
    exit;
}

// Delete image file if exists
if (!empty($row['image_path'])) {
    $imagePath = '../../' . $row['image_path'];
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }
}

// Delete DB row
$delStmt = $conn->prepare('DELETE FROM shop_links WHERE id = ?');
if (!$delStmt) {
    error_log('Delete prepare failed: ' . $conn->error);
    header('Location: ../../admin/pages/shopLinks.php?status=delete_db_error');
    exit;
}
$delStmt->bind_param('i', $id);
$ok = $delStmt->execute();
if (!$ok) {
    error_log('Delete execute failed: ' . $delStmt->error);
}
$delStmt->close();
$conn->close();

if ($ok) {
    header('Location: ../../admin/pages/shopLinks.php?status=delete_success');
    exit;
}

header('Location: ../../admin/pages/shopLinks.php?status=delete_db_error');
exit;
?>
