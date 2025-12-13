<?php
require_once '../connection/connection.php';

$carouselItems = [];

$sql = 'SELECT id, title, image_path
        FROM carousel_items
        ORDER BY id DESC';

try {
    $result = $conn->query($sql);
    if ($result) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $carouselItems[] = [
                'id' => (int) $row['id'],
                'title' => $row['title'],
                'image_path' => $row['image_path'],
            ];
        }
    }
} catch (PDOException $e) {
    error_log('Query failed: ' . $e->getMessage());
}


?>

<?php if (!empty($carouselItems)): ?>
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="6000" >
    <div class="carousel-indicators">
        <?php foreach ($carouselItems as $index => $item): ?>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $index; ?>" <?php echo $index === 0 ? 'class="active" aria-current="true"' : ''; ?> aria-label="Slide <?php echo $index + 1; ?>"></button>
        <?php endforeach; ?>
    </div>
    <div class="carousel-inner">
        <?php foreach ($carouselItems as $index => $item): ?>
            <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                <div class="parallax-image" style="background-image: url('../<?php echo htmlspecialchars($item['image_path']); ?>'); height: 870px; margin-top: -100px;">
                    <div class="carousel-overlay"></div>
                </div>
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

<style>/* Parallax Styles */

.parallax-container {
    height: 870px;
    margin-top: -100px !important;
    overflow: hidden;
    position: relative;
}

.parallax-image {
    height: 100%;
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
}

.carousel-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.3);
    z-index: 1;
}

/* Custom Carousel Colors and Sizes */
.carousel-indicators {
    bottom: 20px;
    z-index: 10;
}

.carousel-indicators button {
    background-color: #F7E332 !important;
}

.carousel-indicators .active {
    background-color: #F7E332 !important;
}

.carousel-control-prev,
.carousel-control-next {
    z-index: 10;
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
    width: 3rem !important;
    height: 2rem !important;
}

@media (max-width: 767px) {
    .parallax-image {
        height: 480px !important;
        margin-top: 0 !important;
        background-attachment: scroll !important;
        background-size: cover !important;
        background-position: center center !important;
    }
}'

/* Parallax Styles */

.parallax-container {
    height: 870px;
    margin-top: -100px !important;
    overflow: hidden;
    position: relative;
}

.parallax-image {
    height: 100%;
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
}

.carousel-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.3);
    z-index: 1;
}

@media (max-width: 767px) {
    .parallax-container {
        height: 480px !important;
        margin-top: 0 !important;
    }
}



</style>

<?php endif; ?>
