<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moto Page</title>
    <link rel="shortcut icon" href="../lucent.png" type="image/x-icon">
    <?php include '../config/config.php'; ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: "Bookman Old Style", serif !important;

        }

        body {
            background: linear-gradient(135deg, #FFF0F0 0%, #F0FFF0 100%);
            min-height: 100vh;
            position: relative;
        }
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 20% 50%, rgba(65, 206, 52, 0.03) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(243, 22, 20, 0.03) 0%, transparent 50%),
                radial-gradient(circle at 40% 20%, rgba(65, 206, 52, 0.02) 0%, transparent 50%);
            background-size: 100% 100%;
            pointer-events: none;
            z-index: 0;
        }
        body::after {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                repeating-linear-gradient(45deg, transparent, transparent 35px, rgba(65, 206, 52, 0.02) 35px, rgba(65, 206, 52, 0.02) 70px),
                repeating-linear-gradient(-45deg, transparent, transparent 35px, rgba(243, 22, 20, 0.015) 35px, rgba(243, 22, 20, 0.015) 70px);
            pointer-events: none;
            z-index: 0;
        }
        body > * {
            position: relative;
            z-index: 1;
        }
    </style>
</head>

<body>
    <?php include 'components/navigationBar.php'; ?>
    <?php include 'components/carousel.php'; ?>
    <?php include 'components/franchiseBtn.php'; ?>
    <?php include 'components/about.php'; ?>
    <?php include 'components/featuredProducts.php'; ?>
    <?php include 'components/onlineStore.php'; ?>
    <?php include 'components/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>
