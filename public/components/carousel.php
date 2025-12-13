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

<link rel="stylesheet" href="../assets/css/carousel.css">
<?php if (!empty($carouselItems)): ?>
<div class="parallax-container">
    <div class="parallax-image" id="parallax-image">
        <div class="carousel-overlay"></div>
    </div>
</div>

<script>
    const images = [
        <?php foreach ($carouselItems as $item): ?>
            '../<?php echo htmlspecialchars($item['image_path']); ?>',
        <?php endforeach; ?>
    ];
    let currentIndex = 0;
    const parallaxImage = document.getElementById('parallax-image');

    function changeImage() {
        // Fade out
        parallaxImage.style.opacity = '0';
        setTimeout(() => {
            // Change image after fade out
            parallaxImage.style.backgroundImage = `url(${images[currentIndex]})`;
            currentIndex = (currentIndex + 1) % images.length;
            // Fade in
            parallaxImage.style.opacity = '1';
        }, 1000); // Match transition duration
    }

    // Initial load
    changeImage();

    // Change image every 6 seconds
    setInterval(changeImage, 6000);
</script>

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
    transition: opacity 0.4s ease-in-out; /* Fade transition */
    opacity: 1;
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
