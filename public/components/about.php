<link rel="stylesheet" href="../assets/css/about.css">
<section class="about py-5" style="margin-top: -32px;">
    <div class="about-background"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="mb-4" style="color: black; text-transform: uppercase;">About Two Wheels Zone</h2>
                <p class="lead" style="font-size: 24px; color: black;">Two Wheel Zone is your premier destination for motorcycle parts, services, and franchising opportunities. We specialize in providing high-quality parts, expert maintenance, and comprehensive services for motorcycles.</p>
                <p style="color: black;">Whether you're looking for upgrades, repairs, or routine check-ups, our team of experienced professionals is dedicated to keeping your two-wheeled adventures running smoothly. From FI cleaning to ECU remapping, we offer a wide range of services to meet all your motorcycle needs.</p>

                <!-- Mission Statement -->
                <div class="mt-4">
                    <h3 style="color: black; text-transform: uppercase;">Our Mission</h3>
                    <p class="mt-3" style="font-size: 18px; color: black;">To empower motorcycle enthusiasts by providing top-tier maintenance, customization, and repair services that ensure every ride is safe, exhilarating, and unforgettable. We believe in the freedom of the open road and are committed to expanding our network through franchising opportunities.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- Key Features -->
                <div class="row">
                    <div class="col-6 mb-4">
                        <div class="feature-item text-center">
                            <i class="bi bi-tools fs-2 text-success mb-2"></i>
                            <h6 style="color: black;">Expert Mechanics</h6>
                        </div>
                    </div>
                    <div class="col-6 mb-4">
                        <div class="feature-item text-center">
                            <i class="bi bi-award fs-2 text-success mb-2"></i>
                            <h6 style="color: black;">Quality Parts</h6>
                        </div>
                    </div>
                    <div class="col-6 mb-4">
                        <div class="feature-item text-center">
                            <i class="bi bi-clock fs-2 text-success mb-2"></i>
                            <h6 style="color: black;">Fast Service</h6>
                        </div>
                    </div>
                    <div class="col-6 mb-4">
                        <div class="feature-item text-center">
                            <i class="bi bi-shield-check fs-2 text-success mb-2"></i>
                            <h6 style="color: black;">Guaranteed Work</h6>
                        </div>
                    </div>
                    <div class="col-6 mb-4">
                        <div class="feature-item text-center">
                            <i class="bi bi-shop fs-2 text-success mb-2"></i>
                            <h6 style="color: black;">Franchise Opportunities</h6>
                        </div>
                    </div>
                    <div class="col-6 mb-4">
                        <div class="feature-item text-center">
                            <i class="bi bi-geo-alt fs-2 text-success mb-2"></i>
                            <h6 style="color: black;">Nationwide Network</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>

<style>
    /* About Section Styles */

.about {
    color: black;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
    margin: 3rem 0;
    overflow: hidden;
    position: relative;
    font-family: "Bookman Old Style", serif;
}

.about-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #FFF0F0 0%, #F0FFF0 100%);
    z-index: 0;
}

.about .container {
    position: relative;
    z-index: 1;
}

.about h2, .about h3 {
    color: black !important;
    font-family: "Bookman Old Style", serif;
}

.about p, .about .lead {
    color: black !important;
    text-align: justify;
    font-family: "Bookman Old Style", serif;
}

.about p, .about .lead {
    text-align: justify;
}

.feature-item {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(255, 255, 255, 0.7) 100%);
    border: 2px solid #FFD23F;
    border-radius: 15px;
    padding: 20px;
    transition: all 0.3s ease;
    cursor: pointer;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.feature-item:hover {
    transform: translateY(-8px) scale(1.05);
    box-shadow: 0 12px 30px rgba(255, 210, 63, 0.5);
    border-color: #FFD23F;
    background: linear-gradient(135deg, #FFD23F 0%, #FFFFFF 100%);
}


.feature-item:hover .bi {
    color: #1E3A8A !important;
    transform: scale(1.2);
    transition: transform 0.3s ease;
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
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const rate = scrolled * -0.5; // Adjust rate for parallax speed
        document.querySelector('.about-background').style.transform = 'translateY(' + rate + 'px)';
    });
</script>

