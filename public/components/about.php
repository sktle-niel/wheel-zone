<section class="about py-5">
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

    <style>
        .about {
            background: #FFFFFF;
            color: #2c3e50;
        }
        .about p, .about .lead {
            text-align: justify;
        }
        .feature-item {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(248, 249, 250, 0.95) 100%);
            border: 1px solid rgba(65, 206, 52, 0.3);
            border-radius: 12px;
            padding: 15px;
            transition: all 0.3s ease;
            cursor: pointer;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }
        .feature-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(243, 22, 20, 0.4);
            border-color: rgba(243, 22, 20, 0.6);
        }
        .feature-item:hover .bi {
            transform: scale(1.1);
            transition: transform 0.3s ease;
        }
        .workshop-image {
            transition: all 0.5s ease-in-out;
            cursor: pointer;
        }
        .workshop-image:hover {
            transform: scale(1.05) rotate(1deg);
            filter: brightness(1.1) contrast(1.05);
            box-shadow: 0 15px 35px rgba(243, 22, 20, 0.3);
        }
        .carousel-container {
            position: relative;
            width: 100%;
            max-width: 500px;
            height: 400px;
        }
        .carousel-image {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            transition: all 0.5s ease-in-out;
            pointer-events: none;
        }
        .carousel-image.active {
            opacity: 1;
            pointer-events: auto;
        }
        .carousel-image:hover {
            opacity: 1 !important;
            pointer-events: auto;
            transform: scale(1.05) rotate(1deg);
            filter: brightness(1.1) contrast(1.05);
            box-shadow: 0 15px 35px rgba(244, 222, 43, 0.3);
        }
        @media (max-width: 768px) {
            .col-md-6 {
                text-align: center;
                margin-bottom: 30px;
            }
            .feature-item {
                margin-bottom: 20px;
                height: 120px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
            h2 {
                font-size: 1.5rem;
            }
            h3 {
                font-size: 1.25rem;
            }
            .lead, p {
                font-size: 0.9rem;
                line-height: 1.4;
            }
            h6 {
                font-size: 0.85rem;
            }
        }
    </style>

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

