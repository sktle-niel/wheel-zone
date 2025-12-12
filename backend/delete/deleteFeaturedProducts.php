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
try {
    $stmt = $conn->prepare('SELECT image_path FROM featured_products WHERE id = ?');
    $stmt->execute([$id]);
    $imagePath = $stmt->fetchColumn();

    if ($imagePath === false) {
        header('Location: ../../admin/pages/featuredProducts.php?status=delete_not_found');
        exit;
    }

    // Delete DB row
    $delStmt = $conn->prepare('DELETE FROM featured_products WHERE id = ?');
    $delStmt->execute([$id]);

    // Remove file if present
    if (!empty($imagePath)) {
        $fullPath = realpath(__DIR__ . '/../../' . ltrim($imagePath, '/'));
        if ($fullPath && strpos($fullPath, realpath(__DIR__ . '/../../assets/featured')) === 0 && file_exists($fullPath)) {
            @unlink($fullPath);
        }
    }
    header('Location: ../../admin/pages/featuredProducts.php?status=delete_success');
    exit;
} catch (PDOException $e) {
    error_log('Database error: ' . $e->getMessage());
    header('Location: ../../admin/pages/featuredProducts.php?status=delete_db_error');
    exit;
}
