<?php
// Database connection helper. Update credentials to match your setup.
$dbHost = getenv('DB_HOST') ?: 'localhost';
$dbUser = getenv('DB_USER') ?: 'root';
$dbPass = getenv('DB_PASS') ?: '';
$dbName = getenv('DB_NAME') ?: 'database_twz';

$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

if ($conn->connect_error) {
    http_response_code(500);
    die('Database connection failed: ' . $conn->connect_error);
}

// Ensure utf8mb4 for emoji/special chars.
$conn->set_charset('utf8mb4');

