<?php
// Admin dashboard shell with sidebar include.
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Two Wheels Zone Admin</title>
    <link rel="shortcut icon" href="../../assets/branding/lucent.png" type="image/x-icon">
    <link rel="stylesheet" href="../../assets/bootstrap/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background: #f5f6f8; min-height: 100vh; }
        .sidebar { min-height: 100vh; }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <aside class="col-12 col-md-3 col-lg-2 sidebar px-0">
                <?php include 'components/sidebar.php'; ?>
            </aside>
            <main class="col-12 col-md-9 col-lg-10 px-4 py-4">
                <h1 class="h3 mb-3">Dashboard</h1>
                <p class="text-muted">Replace this content with your admin widgets.</p>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

