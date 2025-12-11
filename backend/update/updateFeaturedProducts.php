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

$stmt = $conn->prepare(
    'UPDATE featured_products SET name = ? WHERE id = ?'
);
if (!$stmt) {
    header('Location: ../../admin/pages/featuredProducts.php?status=db_prepare_error');
    exit;
}

$stmt->bind_param('si', $name, $id);
$ok = $stmt->execute();
$stmt->close();
$conn->close();

if ($ok) {
    header('Location: ../../admin/pages/featuredProducts.php?status=update_success');
    exit;
}

header('Location: ../../admin/pages/featuredProducts.php?status=update_error');
exit;
