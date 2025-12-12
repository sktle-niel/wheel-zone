<?php
// Handles featured product creation: upload image + insert DB row.
require_once '../../connection/connection.php';

// Only accept POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../../admin/pages/featuredProducts.php');
    exit;
}

$name = trim($_POST['name'] ?? '');

if ($name === '' || !isset($_FILES['image'])) {
    header('Location: ../../admin/pages/featuredProducts.php?status=invalid');
    exit;
}

$file = $_FILES['image'];
$maxSize = 5 * 1024 * 1024; // 5MB
$allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];

if ($file['error'] !== UPLOAD_ERR_OK) {
    header('Location: ../../admin/pages/featuredProducts.php?status=upload_error');
    exit;
}

if (!in_array(mime_content_type($file['tmp_name']), $allowedTypes, true)) {
    header('Location: ../../admin/pages/featuredProducts.php?status=type_error');
    exit;
}

if ($file['size'] > $maxSize) {
    header('Location: ../../admin/pages/featuredProducts.php?status=size_error');
    exit;
}

$uploadDir = realpath(__DIR__ . '/../../assets/featured');
if ($uploadDir === false) {
    header('Location: ../../admin/pages/featuredProducts.php?status=path_error');
    exit;
}

$extension = pathinfo($file['name'], PATHINFO_EXTENSION);
$safeExtension = strtolower($extension);
$newFileName = 'featured_' . uniqid('', true) . '.' . $safeExtension;
$targetPath = $uploadDir . DIRECTORY_SEPARATOR . $newFileName;
$relativePath = 'assets/featured/' . $newFileName;

if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
    header('Location: ../../admin/pages/featuredProducts.php?status=save_error');
    exit;
}

try {
    $stmt = $conn->prepare(
        'INSERT INTO featured_products (name, image_path)
         VALUES (?, ?)'
    );

    $stmt->execute([$name, $relativePath]);
    header('Location: ../../admin/pages/featuredProducts.php?status=success');
    exit;
} catch (PDOException $e) {
    error_log('Database error: ' . $e->getMessage());
    header('Location: ../../admin/pages/featuredProducts.php?status=db_error');
    exit;
}
