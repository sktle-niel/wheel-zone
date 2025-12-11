<?php
// Delete a featured product and its image file.
require_once '../../connection/connection.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../../admin/pages/featuredProducts.php');
    exit;
}

$id = (int) ($_POST['id'] ?? 0);
if ($id <= 0) {
    header('Location: ../../admin/pages/featuredProducts.php?status=delete_invalid');
    exit;
}

// Fetch image path first to delete the file.
$stmt = $conn->prepare('SELECT image_path FROM featured_products WHERE id = ?');
if (!$stmt) {
    header('Location: ../../admin/pages/featuredProducts.php?status=delete_db_error');
    exit;
}
$stmt->bind_param('i', $id);
$stmt->execute();
$stmt->bind_result($imagePath);
$hasRow = $stmt->fetch();
$stmt->close();

if (!$hasRow) {
    header('Location: ../../admin/pages/featuredProducts.php?status=delete_not_found');
    exit;
}

// Delete DB row
$delStmt = $conn->prepare('DELETE FROM featured_products WHERE id = ?');
if (!$delStmt) {
    error_log('Delete prepare failed: ' . $conn->error);
    header('Location: ../../admin/pages/featuredProducts.php?status=delete_db_error');
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
    // Remove file if present
    if (!empty($imagePath)) {
        $fullPath = realpath(__DIR__ . '/../../' . ltrim($imagePath, '/'));
        if ($fullPath && strpos($fullPath, realpath(__DIR__ . '/../../assets/featured')) === 0 && file_exists($fullPath)) {
            @unlink($fullPath);
        }
    }
    header('Location: ../../admin/pages/featuredProducts.php?status=delete_success');
    exit;
}

header('Location: ../../admin/pages/featuredProducts.php?status=delete_db_error');
exit;
