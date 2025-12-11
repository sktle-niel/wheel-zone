<?php
// Handles carousel item creation: upload image + insert DB row.
require_once '../../connection/connection.php';

// Only accept POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../../admin/pages/carousel.php');
    exit;
}

$title = trim($_POST['title'] ?? '');
$displayOrder = (int) ($_POST['display_order'] ?? 0);

if ($title === '' || $displayOrder < 1 || !isset($_FILES['image'])) {
    header('Location: ../../admin/pages/carousel.php?status=invalid');
    exit;
}

$file = $_FILES['image'];
$maxSize = 5 * 1024 * 1024; // 5MB
$allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];

if ($file['error'] !== UPLOAD_ERR_OK) {
    header('Location: ../../admin/pages/carousel.php?status=upload_error');
    exit;
}

if (!in_array(mime_content_type($file['tmp_name']), $allowedTypes, true)) {
    header('Location: ../../admin/pages/carousel.php?status=type_error');
    exit;
}

if ($file['size'] > $maxSize) {
    header('Location: ../../admin/pages/carousel.php?status=size_error');
    exit;
}

$uploadDir = realpath(__DIR__ . '/../../assets/carousel');
if ($uploadDir === false) {
    header('Location: ../../admin/pages/carousel.php?status=path_error');
    exit;
}

$extension = pathinfo($file['name'], PATHINFO_EXTENSION);
$safeExtension = strtolower($extension);
$newFileName = 'carousel_' . uniqid('', true) . '.' . $safeExtension;
$targetPath = $uploadDir . DIRECTORY_SEPARATOR . $newFileName;
$relativePath = 'assets/carousel/' . $newFileName;

if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
    header('Location: ../../admin/pages/carousel.php?status=save_error');
    exit;
}

$stmt = $conn->prepare(
    'INSERT INTO carousel_items (title, image_path, display_order, created_at, updated_at)
     VALUES (?, ?, ?, NOW(), NOW())'
);

if (!$stmt) {
    header('Location: ../../admin/pages/carousel.php?status=db_prepare_error');
    exit;
}

$stmt->bind_param('ssi', $title, $relativePath, $displayOrder);
$ok = $stmt->execute();
$stmt->close();
$conn->close();

if ($ok) {
    header('Location: ../../admin/pages/carousel.php?status=success');
    exit;
}

header('Location: ../../admin/pages/carousel.php?status=db_error');
exit;
