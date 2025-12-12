<?php
// Database connection helper. Update credentials to match your setup.
$db_server = getenv('DB_HOST') ?: 'localhost';
$dbUser = getenv('DB_USER') ?: 'root';
$dbPass = getenv('DB_PASS') ?: '';
$dbName = getenv('DB_NAME') ?: 'database_twz';

try {
    $conn = new PDO("mysql:host=$db_server;dbname=$dbName;charset=utf8mb4", $dbUser, $dbPass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    http_response_code(500);
    die('Database connection failed: ' . $e->getMessage());
}

