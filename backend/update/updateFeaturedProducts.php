<?php
// Handles featured product update: only name can be edited.
require_once '../../connection/connection.php';

// Only accept POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../../admin/pages/featuredProducts.php');
    exit;
}

$id = (int) ($_POST['id'] ?? 0);
$name = trim($_POST['name'] ?? '');

if ($id < 1 || $name === '') {
    header('Location: ../../admin/pages/featuredProducts.php?status=invalid');
    exit;
}

try {
    $stmt = $conn->prepare(
        'UPDATE featured_products SET name = ? WHERE id = ?'
    );

    $stmt->execute([$name, $id]);
    header('Location: ../../admin/pages/featuredProducts.php?status=update_success');
    exit;
} catch (PDOException $e) {
    error_log('Database error: ' . $e->getMessage());
    header('Location: ../../admin/pages/featuredProducts.php?status=update_error');
    exit;
}
