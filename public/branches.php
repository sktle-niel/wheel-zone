<?php
require_once '../connection/connection.php';

$sql = "SELECT `id`, `name`, `address`, `maps`, `facebook`, `hours`, `services`, `created_at`, `updated_at` FROM `branches` WHERE 1";
$result = $conn->query($sql);

$branches = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $branches[] = $row;
    }
    $result->free();
} else {
    // Handle query failure, set empty array
    $branches = [];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Branches - Two Wheels Zone</title>
    <link rel="shortcut icon" href="../lucent.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/branches.css">
</head>
<body>
    <?php include 'components/navigationBar.php'; ?>

    <section class="parallax" style="background-image: url('../assets/carousel/w1.jpg');">
        <div class="parallax-content">
            <h1>Our Branches</h1>
            <p>Find a Two Wheels Zone branch near you. Visit us for all your motorcycle needs.</p>
        </div>
    </section>

    <section class="branches-content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center">Locate Our Branches</h2>
                    <p class="text-center">We have multiple locations to serve you better. Choose the branch closest to you.</p>
                </div>
            </div>
            <?php if (empty($branches)): ?>
                <div class="row mt-5">
                    <div class="col-12">
                        <p class="text-center">No branches found.</p>
                    </div>
                </div>
            <?php else: ?>
                <?php $counter = 0; ?>
                <?php foreach ($branches as $branch): ?>
                    <?php if ($counter % 2 == 0): ?>
                        <div class="row mt-5">
                    <?php endif; ?>
                    <div class="col-md-6">
                        <div class="branch-card">
                            <h3><?php echo htmlspecialchars($branch['name']); ?></h3>
                            <p><i class="bi bi-geo-alt"></i> <strong>Address:</strong> <?php echo htmlspecialchars($branch['address']); ?></p>
                            <p><i class="bi bi-map"></i> <strong>Google Maps:</strong> <a href="<?php echo htmlspecialchars($branch['maps']); ?>" target="_blank">View on Google Maps</a></p>
                            <p><i class="bi bi-facebook"></i> <strong>Facebook:</strong> <a href="<?php echo htmlspecialchars($branch['facebook']); ?>" target="_blank">Two Wheels Zone</a></p>
                            <p><i class="bi bi-clock"></i> <strong>Hours:</strong> <?php echo htmlspecialchars($branch['hours']); ?></p>
                            <p><i class="bi bi-car-front"></i> <strong>Services:</strong> <?php echo htmlspecialchars($branch['services']); ?></p>
                        </div>
                    </div>
                    <?php $counter++; ?>
                    <?php if ($counter % 2 == 0 || $counter == count($branches)): ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
            <div class="row mt-5 align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="branch-map-copy">
                        <h3 class="mb-3">See Our Locations</h3>
                        <p class="mb-3">Find the nearest Two Wheels Zone branch on the map. Each pin marks one of our branches across Palawan, ready to serve your motorcycle needs.</p>
                        <p class="mb-0 text-muted" style="font-size: 0.95rem;">Tip: Click the branch cards above for exact Google Maps links and details.</p>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="../assets/branches/map.jpg" class="img-fluid branches-map" alt="Philippines map with branch locations">
                </div>
            </div>
        </div>
    </section>

    <?php include 'components/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
