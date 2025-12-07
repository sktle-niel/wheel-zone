<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Two Wheels Zone</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">


    <style>
    body {
        font-family: "Zen Dots", sans-serif;
        font-weight: 400;
        font-style: normal;
        letter-spacing: 1px;
    }

    </style>

    <style>
        .parallax {
            background-image: url('../assets/about/about.jpg');
            height: 50vh;
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }
        .parallax.parallax-2 {
            background-image: url('../assets/about/shop.jpg');
        }
        .parallax::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
        }
        .parallax-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            text-align: center;
            z-index: 1;
        }
        .parallax-content h1 {
            font-size: 3rem;
            text-transform: uppercase;
            margin-bottom: 1rem;
        }
        .parallax-content p {
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto;
        }
        .about-content {
            padding: 4rem 0;
            background: linear-gradient(135deg, #000000 0%, #1a1a1a 100%);
            color: #fff;
        }
        .about-content h2 {
            color: #41CE34;
            text-transform: uppercase;
            margin-bottom: 2rem;
        }
        .about-content p {
            text-align: justify;
            line-height: 1.6;
        }
        @media (max-width: 768px) {
            .parallax {
                height: 70vh;
            }
            .parallax-content h1 {
                margin-top: 50px;
                font-size: 2rem;
            }
            .parallax-content p {
                font-size: 1rem;
            }
            .about-content {
                padding: 2rem 0;
            }
            .about-content h2 {
                font-size: 1.5rem;
                margin-bottom: 1.5rem;
            }
            .about-content p {
                font-size: 0.9rem;
                line-height: 1.5;
            }
            .row.mt-5 .col-md-6 {
                margin-bottom: 2rem;
            }
            .row.mt-5 .col-md-6:last-child {
                margin-bottom: 0;
            }
        }
    </style>
</head>
<body>
    <?php include 'components/navigationBar.php'; ?>

    <section class="parallax" style="margin-top: -120px;">
        <div class="parallax-content">
            <h1>About Two Wheels Zone</h1>
        </div>
    </section>

    <section class="about-content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center">Who We Are</h2>
                    <p>Two Wheels Zone is dedicated to providing top-quality motorcycle parts, expert maintenance, and comprehensive services for motorcycle enthusiasts. With years of experience in the industry, we pride ourselves on delivering reliable solutions that keep your two-wheeled adventures running smoothly.</p>
                    <p>Our team of skilled professionals is passionate about motorcycles and committed to ensuring every rider's safety and satisfaction. From routine maintenance to custom upgrades, we offer a wide range of services tailored to meet your specific needs.</p>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-6">
                    <h2>Our History</h2>
                    <p>Founded in 2015, Two Wheels Zone started as a small workshop with a vision to revolutionize motorcycle servicing in the Philippines. What began as a passion project by a group of motorcycle enthusiasts has grown into a trusted name in the industry.</p>
                    <p>Over the years, we've expanded our services, partnered with leading brands, and built a reputation for excellence. Our commitment to quality and customer satisfaction has driven our growth from a local shop to a comprehensive motorcycle service center.</p>
                </div>
                <div class="col-md-6">
                    <h2 class="text-left">Our Advantages</h2>
                    <ul class="list-unstyled text-left">
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Expert technicians with years of experience</li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Genuine parts from trusted manufacturers</li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Fast and reliable service</li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Competitive pricing</li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Comprehensive warranty on all work</li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Convenient location and flexible hours</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="parallax parallax-2">
        <div class="parallax-content">
            <h1>Experience Excellence</h1>
            <p>Where passion meets precision in motorcycle care</p>
        </div>
    </section>

    <?php include 'components/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
