<?php
require_once '../connection/connection.php';

$carouselItems = [];

$sql = 'SELECT id, title, image_path
        FROM carousel_items
        ORDER BY id DESC';

$result = $conn->query($sql);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $carouselItems[] = [
            'id' => (int) $row['id'],
            'title' => $row['title'],
            'image_path' => $row['image_path'],
        ];
    }
    $result->free();
}


?>

<link rel="stylesheet" href="../assets/css/carousel.css">
<?php if (!empty($carouselItems)): ?>
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" id="carousel">
    <div class="carousel-indicators">
        <?php foreach ($carouselItems as $index => $item): ?>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $index; ?>" <?php echo $index === 0 ? 'class="active" aria-current="true"' : ''; ?> aria-label="Slide <?php echo $index + 1; ?>"></button>
        <?php endforeach; ?>
    </div>
    <div class="carousel-inner">
        <?php foreach ($carouselItems as $index => $item): ?>
            <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                <img src="../<?php echo htmlspecialchars($item['image_path']); ?>" class="d-block w-100" alt="<?php echo htmlspecialchars($item['title']); ?>">
                <div class="carousel-overlay"></div>
            </div>
        <?php endforeach; ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<?php endif; ?>
