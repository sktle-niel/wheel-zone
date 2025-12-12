<?php
// Delete a branch.
require_once '../../connection/connection.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../../admin/pages/branches.php');
    exit;
}

$id = (int) ($_POST['id'] ?? 0);
if ($id <= 0) {
    header('Location: ../../admin/pages/branches.php?status=delete_invalid');
    exit;
}

// Check if branch exists
$stmt = $conn->prepare('SELECT id FROM branches WHERE id = ?');
if (!$stmt) {
    header('Location: ../../admin/pages/branches.php?status=delete_db_error');
    exit;
}
$stmt->bind_param('i', $id);
$stmt->execute();
$hasRow = $stmt->fetch();
$stmt->close();

if (!$hasRow) {
    header('Location: ../../admin/pages/branches.php?status=delete_not_found');
    exit;
}

// Delete DB row
$delStmt = $conn->prepare('DELETE FROM branches WHERE id = ?');
if (!$delStmt) {
    error_log('Delete prepare failed: ' . $conn->error);
    header('Location: ../../admin/pages/branches.php?status=delete_db_error');
    exit;
}
$delStmt->bind_param('i', $id);
$ok = $delStmt->execute();
if (!$ok) {
    error_log('Delete execute failed: ' . $delStmt->error);
}
$delStmt->close();
$conn->close();

if ($ok) {
    header('Location: ../../admin/pages/branches.php?status=delete_success');
    exit;
}

header('Location: ../../admin/pages/branches.php?status=delete_db_error');
exit;
