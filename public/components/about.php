<link rel="stylesheet" href="../assets/css/about.css">
<section class="about py-5" style="margin-top: -32px;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="carousel-container">
                    <img src="../assets/about/about.jpg" alt="Two Wheel Zone Workshop" class="img-fluid rounded shadow-lg carousel-image active workshop-image" style="width: 100%; max-width: 500px; height: 400px; object-fit: cover;">
                    <img src="../assets/about/org.jpg" alt="Two Wheel Zone Organization" class="img-fluid rounded shadow-lg carousel-image workshop-image" style="width: 100%; max-width: 500px; height: 400px; object-fit: cover;">
                    <img src="../assets/about/shop.jpg" alt="Two Wheel Zone Shop" class="img-fluid rounded shadow-lg carousel-image workshop-image" style="width: 100%; max-width: 500px; height: 400px; object-fit: cover;">
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="text-center mb-4" style="color: #41CE34; text-transform: uppercase;">About Two Wheels Zone</h2>
                <p class="lead" style="font-size: 24px; color: #2c3e50;">Two Wheel Zone is your premier destination for all things related to motorcycle parts and services. We specialize in providing high-quality parts, expert maintenance, and comprehensive services for motorcycles.</p>
                <p style="color: #34495e;">Whether you're looking for upgrades, repairs, or routine check-ups, our team of experienced professionals is dedicated to keeping your two-wheeled adventures running smoothly. From FI cleaning to ECU remapping, we offer a wide range of services to meet all your motorcycle needs.</p>

                <!-- Key Features -->
                <div class="row mt-4">
                    <div class="col-6">
                        <div class="feature-item text-center mb-3">
                            <i class="bi bi-tools fs-2 text-success mb-2"></i>
                            <h6 style="color: #2c3e50;">Expert Mechanics</h6>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="feature-item text-center mb-3">
                            <i class="bi bi-award fs-2 text-success mb-2"></i>
                            <h6 style="color: #2c3e50;">Quality Parts</h6>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="feature-item text-center mb-3">
                            <i class="bi bi-clock fs-2 text-success mb-2"></i>
                            <h6 style="color: #2c3e50;">Fast Service</h6>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="feature-item text-center mb-3">
                            <i class="bi bi-shield-check fs-2 text-success mb-2"></i>
                            <h6 style="color: #2c3e50;">Guaranteed Work</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mission Statement -->
        <div class="row mt-5">
            <div class="col-12 text-center">
                <h3 style="color: #41CE34; text-transform: uppercase;">Our Mission</h3>
                <p class="mt-3" style="font-size: 19px; color: #34495e;">To empower motorcycle enthusiasts by providing top-tier maintenance, customization, and repair services that ensure every ride is safe, exhilarating, and unforgettable. We believe in the freedom of the open road and are committed to keeping your motorcycle performing at its best.</p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const images = document.querySelectorAll('.carousel-image');
            const carouselContainer = document.querySelector('.carousel-container');
            let currentIndex = 0;
            let intervalId;

            function showNextImage() {
                images[currentIndex].classList.remove('active');
                currentIndex = (currentIndex + 1) % images.length;
                images[currentIndex].classList.add('active');
            }

            function startCarousel() {
                intervalId = setInterval(showNextImage, 4000);
            }

            function stopCarousel() {
                clearInterval(intervalId);
            }

            // Start the carousel
            startCarousel();

            // Pause on hover
            carouselContainer.addEventListener('mouseenter', stopCarousel);
            carouselContainer.addEventListener('mouseleave', startCarousel);
        });
    </script>
</section>


