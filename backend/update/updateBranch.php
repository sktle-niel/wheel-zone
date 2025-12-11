<?php
// Handles branch update: update DB row, handle image upload if provided.
require_once '../../connection/connection.php';

// Only accept POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../../admin/pages/branches.php');
    exit;
}

$id = (int) ($_POST['id'] ?? 0);
$name = trim($_POST['name'] ?? '');
$address = trim($_POST['address'] ?? '');
$maps = trim($_POST['maps'] ?? '');
$facebook = trim($_POST['facebook'] ?? '');
$hours = trim($_POST['hours'] ?? '');
$services = trim($_POST['services'] ?? '');

if ($id <= 0 || $name === '' || $address === '') {
    header('Location: ../../admin/pages/branches.php?status=invalid');
    exit;
}

$stmt = $conn->prepare(
    'UPDATE branches SET name = ?, address = ?, maps = ?, facebook = ?, hours = ?, services = ?, updated_at = NOW() WHERE id = ?'
);
if (!$stmt) {
    header('Location: ../../admin/pages/branches.php?status=db_prepare_error');
    exit;
}

$stmt->bind_param('ssssssi', $name, $address, $maps, $facebook, $hours, $services, $id);

$ok = $stmt->execute();
$stmt->close();
$conn->close();

if ($ok) {
    header('Location: ../../admin/pages/branches.php?status=update_success');
    exit;
}

header('Location: ../../admin/pages/branches.php?status=update_error');
exit;
