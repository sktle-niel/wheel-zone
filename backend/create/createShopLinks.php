<?php
// Handles shop link creation: upload image + insert DB row.
require_once '../../connection/connection.php';

// Only accept POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../../admin/pages/shopLinks.php');
    exit;
}

$name = trim($_POST['name'] ?? '');
$url = trim($_POST['url'] ?? '');

if ($name === '' || $url === '') {
    header('Location: ../../admin/pages/shopLinks.php?status=invalid');
    exit;
}

// Handle image upload
$imagePath = '';
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['image']['tmp_name'];
    $fileName = $_FILES['image']['name'];
    $fileSize = $_FILES['image']['size'];
    $fileType = $_FILES['image']['type'];

    // Check file type
    $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];
    if (!in_array($fileType, $allowedTypes)) {
        header('Location: ../../admin/pages/shopLinks.php?status=type_error');
        exit;
    }

    // Check file size (5MB max)
    if ($fileSize > 5 * 1024 * 1024) {
        header('Location: ../../admin/pages/shopLinks.php?status=size_error');
        exit;
    }

    // Generate unique filename
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    $newFileName = 'shop_link_' . uniqid() . '.' . $fileExtension;
    $uploadDir = '../../assets/shopLinks/';
    $destPath = $uploadDir . $newFileName;

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    if (!move_uploaded_file($fileTmpPath, $destPath)) {
        header('Location: ../../admin/pages/shopLinks.php?status=path_error');
        exit;
    }

    $imagePath = 'assets/shopLinks/' . $newFileName;
} else {
    header('Location: ../../admin/pages/shopLinks.php?status=upload_error');
    exit;
}

try {
    $stmt = $conn->prepare(
        'INSERT INTO shop_links (name, url, image_path)
         VALUES (?, ?, ?)'
    );

    $stmt->execute([$name, $url, $imagePath]);
    header('Location: ../../admin/pages/shopLinks.php?status=success');
    exit;
} catch (PDOException $e) {
    error_log('Database error: ' . $e->getMessage());
    header('Location: ../../admin/pages/shopLinks.php?status=db_error');
    exit;
}
?>
