<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moto Page</title>
    <?php include '../config/config.php'; ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
</head>

<style>
    body {
        font-family: "Zen Dots", sans-serif;
        font-weight: 400;
        font-style: normal;
        letter-spacing: 1px;
    }

</style>

<body>
    <?php include 'components/navigationBar.php'; ?>
    <?php include 'components/carousel.php'; ?>
    <?php include 'components/franchiseBtn.php'; ?>
    <?php include 'components/about.php'; ?>
    <?php include 'components/services.php'; ?>
    <?php include 'components/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>
