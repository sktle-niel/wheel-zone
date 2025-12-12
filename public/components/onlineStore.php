<?php
require_once '../connection/connection.php';

$shopLinks = [];

$sql = 'SELECT id, name, url, image_path FROM shop_links ORDER BY id DESC';

// Check if connection is still valid
if ($conn && !$conn->connect_errno) {
    $result = $conn->query($sql);
} else {
    // Reconnect if connection is closed
    require_once '../connection/connection.php';
    $result = $conn->query($sql);
}

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $shopLinks[] = [
            'id' => (int) $row['id'],
            'name' => $row['name'],
            'url' => $row['url'],
            // Prepend ../ so public view resolves correctly
            'image' => '../' . ltrim($row['image_path'], '/'),
        ];
    }
    $result->free();
}


?>
<link rel="stylesheet" href="../assets/css/onlineStore.css">
<section class="online-store py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center mb-5">
                <h2 style="color: #41CE34; font-family: 'Bebas Neue', sans-serif; text-transform: uppercase; font-size: 3rem; letter-spacing: 2px;">Shop Online</h2>
                <p style="font-size: 1.2rem; font-family: 'Bebas Neue', sans-serif; letter-spacing: 1px; color: #34495e;">Find us on your favorite online platforms</p>
            </div>
        </div>
        <div class="row justify-content-center g-4">
            <?php foreach ($shopLinks as $link): ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="store-card text-center p-4 h-100">
                        <div class="store-icon mb-3">
                            <img src="<?php echo htmlspecialchars($link['image']); ?>" alt="<?php echo htmlspecialchars($link['name']); ?>" style="width: 100px; height: 100px; object-fit: contain;" onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwIiBoZWlnaHQ9IjEwMCIgdmlld0JveD0iMCAwIDEwMCAxMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSIxMDAiIGhlaWdodD0iMTAwIiByeD0iMTUiIGZpbGw9IiM0MUNFMzQiLz4KPHRleHQgeD0iNTAiIHk9IjU1IiBmb250LWZhbWlseT0iQmViYXMgTmV1ZSwgc2Fucy1zZXJpZiIgZm9udC1zaXplPSIxNCIgZmlsbD0iI2ZmZiIgdGV4dC1hbmNob3I9Im1pZGRsZSI+Q29taW5nIFNvb248L3RleHQ+Cjwvc3ZnPg==';">
                        </div>
                        <h3 style="color: #41CE34; font-family: 'Bebas Neue', sans-serif; text-transform: uppercase; font-size: 28px; margin-bottom: 15px;"><?php echo htmlspecialchars($link['name']); ?></h3>
                        <p style="font-size: 18px; margin-bottom: 25px; font-family: 'Bebas Neue', sans-serif; color: #34495e;">Shop our products on <?php echo htmlspecialchars($link['name']); ?></p>
                        <a href="<?php echo htmlspecialchars($link['url']); ?>" class="btn btn-primary w-100" style="background-color: #41CE34; border: none; color: #000; font-weight: bold; text-transform: uppercase; padding: 12px 24px; transition: all 0.3s ease; font-family: 'Bebas Neue', sans-serif; font-size: 18px;" target="_blank">Visit <?php echo htmlspecialchars($link['name']); ?></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
