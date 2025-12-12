<?php
// Handles carousel image uploads and saves record to database.

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

// Basic validation for file input.
if (!isset($_FILES['image']) || !is_uploaded_file($_FILES['image']['tmp_name'])) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'No image uploaded']);
    exit;
}

$title = trim($_POST['title'] ?? '');
$displayOrder = isset($_POST['display_order']) ? (int) $_POST['display_order'] : 1;
$file = $_FILES['image'];

// Enforce max size 5MB.
$maxSize = 5 * 1024 * 1024;
if ($file['size'] > $maxSize) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'File exceeds 5MB limit']);
    exit;
}

// Validate mime type.
$finfo = new finfo(FILEINFO_MIME_TYPE);
$mime = $finfo->file($file['tmp_name']);
$allowed = ['image/jpeg' => 'jpg', 'image/png' => 'png'];

if (!isset($allowed[$mime])) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Only JPEG or PNG allowed']);
    exit;
}

// Build storage path.
$uploadDir = __DIR__ . '/../../assets/carousel';
if (!is_dir($uploadDir) && !mkdir($uploadDir, 0775, true)) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Upload folder is missing and could not be created']);
    exit;
}

$fileName = uniqid('carousel_', true) . '.' . $allowed[$mime];
$targetPath = $uploadDir . '/' . $fileName;
$publicPath = 'assets/carousel/' . $fileName; // path to store in DB/UI

if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Failed to save uploaded file']);
    exit;
}

require_once __DIR__ . '/../../connection/connection.php';

// Use file name as fallback title.
if ($title === '') {
    $title = pathinfo($file['name'], PATHINFO_FILENAME);
}

$stmt = $conn->prepare('INSERT INTO carousel_items (title, image_path, display_order) VALUES (?, ?, ?)');
if (!$stmt) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Failed to prepare statement']);
    exit;
}

$stmt->bind_param('ssi', $title, $publicPath, $displayOrder);

if (!$stmt->execute()) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Failed to save record']);
    exit;
}

echo json_encode([
    'success' => true,
    'message' => 'Carousel item saved',
    'data' => [
        'id' => $stmt->insert_id,
        'title' => $title,
        'image_path' => $publicPath,
        'display_order' => $displayOrder,
    ],
]);

$stmt->close();
$conn->close();

