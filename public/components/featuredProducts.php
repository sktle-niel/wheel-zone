<?php
require_once '../connection/connection.php';

$featuredProducts = [];

$sql = 'SELECT id, name, image_path
        FROM featured_products
        ORDER BY id DESC';

try {
    $result = $conn->query($sql);
    if ($result) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $featuredProducts[] = [
                'id' => (int) $row['id'],
                'name' => $row['name'],
                'image_path' => $row['image_path'],
            ];
        }
    }
} catch (PDOException $e) {
    error_log('Query failed: ' . $e->getMessage());
}


?>

<link rel="stylesheet" href="../assets/css/featuredProducts.css">

<section class="featured-products py-5" style="margin-top: -50px;">
    <div class="container">
        <h2 class="text-center mb-4" style="color: #2c3e50; text-transform: uppercase;">Featured Products</h2>
        <div class="row g-3 g-md-4">
            <?php if (empty($featuredProducts)): ?>
                <div class="col-12 text-center text-muted">No featured products available.</div>
            <?php else: ?>
                <?php foreach ($featuredProducts as $product): ?>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="card h-100">
                            <img src="../<?php echo htmlspecialchars($product['image_path']); ?>" alt="<?php echo htmlspecialchars($product['name'] ?: 'Untitled'); ?>" class="card-img-top product-thumb">
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <h6 class="card-title text-center"><?php echo htmlspecialchars($product['name'] ?: 'Untitled'); ?></h6>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<style>
    /* Minimal featured products grid */

</style>