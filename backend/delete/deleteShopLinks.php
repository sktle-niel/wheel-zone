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
try {
    $stmt = $conn->prepare('SELECT id, image_path FROM shop_links WHERE id = ?');
    $stmt->execute([$id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

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
    $delStmt->execute([$id]);

    header('Location: ../../admin/pages/shopLinks.php?status=delete_success');
    exit;
} catch (PDOException $e) {
    error_log('Database error: ' . $e->getMessage());
    header('Location: ../../admin/pages/shopLinks.php?status=delete_db_error');
    exit;
}
?>
