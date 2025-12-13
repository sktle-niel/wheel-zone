<?php
require_once '../connection/connection.php';

$shopLinks = [];

$sql = 'SELECT id, name, url, image_path FROM shop_links ORDER BY id DESC';

try {
    $result = $conn->query($sql);
    if ($result) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $shopLinks[] = [
                'id' => (int) $row['id'],
                'name' => $row['name'],
                'url' => $row['url'],
                // Prepend ../ so public view resolves correctly
                'image' => '../' . ltrim($row['image_path'], '/'),
            ]; 
        }
    }
} catch (PDOException $e) {
    // Handle error
    error_log('Query failed: ' . $e->getMessage());
}


?>


<style>

</style>
<section class="online-store py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center mb-5">
                <h2 style="color: #000; font-family: 'Bebas Neue', sans-serif; text-transform: uppercase; font-size: 3rem; letter-spacing: 2px;">Shop Online</h2>
                <p style="font-size: 1.2rem; font-family: 'Bebas Neue', sans-serif; letter-spacing: 1px; color: #000;">Find us on your favorite online platforms</p>
            </div>
        </div>
        <div class="row justify-content-center g-4">
            <?php foreach ($shopLinks as $link): ?>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="store-card text-center p-4 h-100">
                        <div class="store-icon mb-3">
                            <img src="<?php echo htmlspecialchars($link['image']); ?>" alt="<?php echo htmlspecialchars($link['name']); ?>" style="width: 100px; height: 100px; object-fit: contain;" onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwIiBoZWlnaHQ9IjEwMCIgdmlld0JveD0iMCAwIDEwMCAxMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSIxMDAiIGhlaWdodD0iMTAwIiByeD0iMTUiIGZpbGw9IiM0MUNFMzQiLz4KPHRleHQgeD0iNTAiIHk9IjU1IiBmb250LWZhbWlseT0iQmViYXMgTmV1ZSwgc2Fucy1zZXJpZiIgZm9udC1zaXplPSIxNCIgZmlsbD0iI2ZmZiIgdGV4dC1hbmNob3I9Im1pZGRsZSI+Q29taW5nIFNvb248L3RleHQ+Cjwvc3ZnPg==';">
                        </div>
                        <h3 style="color: #000; font-family: 'Bebas Neue', sans-serif; text-transform: uppercase; font-size: 28px; margin-bottom: 15px;"><?php echo htmlspecialchars($link['name']); ?></h3>
                        <p style="font-size: 18px; margin-bottom: 25px; font-family: 'Bebas Neue', sans-serif; color: #fff;">Shop our products on <?php echo htmlspecialchars($link['name']); ?></p>
                        <a href="<?php echo htmlspecialchars($link['url']); ?>" class="btn btn-primary w-100" style="background-color: #FFD23F; border: none; color: #fff; font-weight: bold; text-transform: uppercase; padding: 12px 24px; transition: all 0.3s ease; font-family: 'Bebas Neue', sans-serif; font-size: 18px;" target="_blank">Visit <?php echo htmlspecialchars($link['name']); ?></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<style>
/* Online Store Section Styles */

* {
    font-family: "Bookman Old Style", serif;

}

.online-store {
    background-color: #F7E332;
    color: #2c3e50;
    position: relative;
    overflow: hidden;
}

.online-store::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at 20% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
    pointer-events: none;
}

.store-card {
    background: rgba(255, 255, 255, 0.25);
    backdrop-filter: blur(10px);
    border-radius: 25px;
    border: 1px solid rgba(255, 255, 255, 0.3);
    transition: all 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    position: relative;
    overflow: hidden;
}

.store-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
    transition: left 0.5s;
}

.store-card:hover::before {
    left: 100%;
}

.store-card:hover {
    transform: translateY(-15px) scale(1.05) rotate(1deg);
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
    border-color: rgba(255, 255, 255, 0.5);
    background: rgba(255, 255, 255, 0.35);
}

.store-card .btn:hover {
    background-color: #FF8C00 !important;
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

.store-card .store-icon img {
    filter: brightness(0.9);
    transition: filter 0.3s ease;
}

.store-card:hover .store-icon img {
    filter: brightness(1.1);
}

@media (max-width: 768px) {
    .online-store h2 {
        font-size: 2.5rem;
    }
    .store-card {
        margin-bottom: 2rem;
    }
}

@media (max-width: 576px) {
    .online-store h2 {
        font-size: 2rem;
    }
    .store-card h3 {
        font-size: 24px;
    }
    .store-card p {
        font-size: 16px;
    }
    .store-card .btn {
        font-size: 16px;
        padding: 10px 20px;
    }
}

</style>
