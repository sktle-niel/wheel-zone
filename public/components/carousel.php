<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" style="height: 870px; margin-top: -140px !important;" id="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../assets/carousel/w1.jpg" class="d-block w-100" alt="Workshop" style="height: 890px; object-fit: cover; !important">
                <div class="carousel-overlay"></div>
            </div>
            <div class="carousel-item">
                <img src="../assets/carousel/w2.jpg" class="d-block w-100" alt="Workshop 1" style="height: 890px; object-fit: cover; !important">
                <div class="carousel-overlay"></div>
            </div>
            <div class="carousel-item">
                <img src="../assets/carousel/w3.jpg" class="d-block w-100" alt="Workshop 3" style="height: 890px; object-fit: cover; !important">
                <div class="carousel-overlay"></div>
            </div>
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
    <style>
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
            #carouselExampleIndicators {
                height: 500px !important;
                margin-top: 0 !important;
            }
            #carouselExampleIndicators .carousel-item img {
                height: 500px !important;
            }
        }
    </style>
