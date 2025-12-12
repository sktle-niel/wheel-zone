<?php
// Handles branch creation: upload image + insert DB row.
require_once '../../connection/connection.php';

// Only accept POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../../admin/pages/branches.php');
    exit;
}

$name = trim($_POST['name'] ?? '');
$address = trim($_POST['address'] ?? '');
$maps = trim($_POST['maps'] ?? '');
$facebook = trim($_POST['facebook'] ?? '');
$hours = trim($_POST['hours'] ?? '');
$services = trim($_POST['services'] ?? '');

if ($name === '' || $address === '') {
    header('Location: ../../admin/pages/branches.php?status=invalid');
    exit;
}

$stmt = $conn->prepare(
    'INSERT INTO branches (name, address, maps, facebook, hours, services)
     VALUES (?, ?, ?, ?, ?, ?)'
);
if (!$stmt) {
    header('Location: ../../admin/pages/branches.php?status=db_prepare_error');
    exit;
}

$stmt->bind_param('ssssss', $name, $address, $maps, $facebook, $hours, $services);
$ok = $stmt->execute();
$stmt->close();
$conn->close();

if ($ok) {
    header('Location: ../../admin/pages/branches.php?status=success');
    exit;
}

header('Location: ../../admin/pages/branches.php?status=db_error');
exit;
