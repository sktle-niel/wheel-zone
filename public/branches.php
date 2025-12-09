<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Branches - Two Wheels Zone</title>
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
            background-image: url('../assets/carousel/w1.jpg');
            height: 50vh;
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
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
            left: 10%;
            transform: translateY(-50%);
            color: white;
            text-align: left;
            z-index: 1;
        }
        .parallax-content h1 {
            font-size: 3rem;
            text-transform: uppercase;
            margin-bottom: 1rem;
            border-bottom: 5px solid #41CE34;
        }
        .parallax-content p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto;
            text-align: justify;
            font-size: 24px;
        }
        .branches-content {
            padding: 4rem 0;
            background: linear-gradient(135deg, #000000 0%, #1a1a1a 100%);
            color: #fff;
        }
        .branches-content h2 {
            color: #41CE34;
            text-transform: uppercase;
            margin-bottom: 2rem;
            text-align: center;
        }
        .branches-content p {
            text-align: justify;
            line-height: 1.6;
            font-size: 24px;
        }
        .branch-card {
            background: rgba(0, 0, 0, 0.8);
            padding: 2rem;
            border-radius: 10px;
            margin-bottom: 2rem;
            border: 1px solid #41CE34;
        }
        .branch-card h3 {
            color: #41CE34;
            margin-bottom: 1rem;
        }
        .branch-card p {
            margin-bottom: 0.5rem;
        }
        .branch-card i {
            color: #41CE34;
            margin-right: 0.5rem;
        }
        @media (max-width: 768px) {
            .parallax {
                height: 70vh;
            }
            .parallax-content {
                left: 50%;
                transform: translate(-50%, -50%);
                text-align: center;
            }
            .parallax-content h1 {
                margin-top: 50px;
                font-size: 2rem;
            }
            .parallax-content p {
                font-size: 1rem;
            }
            .branches-content {
                padding: 2rem 0;
            }
            .branches-content h2 {
                font-size: 1.5rem;
                margin-bottom: 1.5rem;
            }
            .branch-card {
                padding: 1.5rem;
            }
        }
        @media (max-width: 576px) {
            .parallax-content h1 {
                margin-top: 30px;
                font-size: 1.5rem;
            }
            .parallax-content p {
                font-size: 0.9rem;
                max-width: none;
            }
            .branches-content {
                padding: 1rem 0;
            }
            .branches-content h2 {
                font-size: 1.2rem;
                margin-bottom: 1rem;
            }
            .branch-card {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <?php include 'components/navigationBar.php'; ?>

    <section class="parallax" style="margin-top: -120px;">
        <div class="parallax-content">
            <h1>Our Branches</h1>
            <p>Find a Two Wheels Zone branch near you. Visit us for all your motorcycle needs.</p>
        </div>
    </section>

    <section class="branches-content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center">Locate Our Branches</h2>
                    <p class="text-center">We have multiple locations to serve you better. Choose the branch closest to you.</p>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="branch-card">
                        <h3>Sicsican Branch</h3>
                        <p><i class="bi bi-geo-alt"></i> <strong>Address:</strong> QPW8+5JF, Puerto Princesa South Road, Puerto Princesa City, Palawan</p>
                        <p><i class="bi bi-map"></i> <strong>Google Maps:</strong> <a href="https://www.google.com/maps/place/Two+Wheels+Zone/@9.7714938,118.7093693,14z/data=!4m10!1m2!2m1!1sTwo+Wheels+Zone+sicsican!3m6!1s0x33b562e0f9f3c525:0x6871ef1f501af47!8m2!3d9.7954403!4d118.7165457!15sChhUd28gV2hlZWxzIFpvbmUgc2ljc2ljYW6SARBhdXRvX3BhcnRzX3N0b3Jl4AEA!16s%2Fg%2F11xrw4l_sq?entry=ttu&g_ep=EgoyMDI1MTIwMi4wIKXMDSoASAFQAw%3D%3D" target="_blank" class="text-light">View on Google Maps</a></p>
                        <p><i class="bi bi-facebook"></i> <strong>Facebook:</strong> <a href="https://web.facebook.com/TwoWheelsZone" target="_blank" class="text-light">Two Wheels Zone</a></p>
                        <p><i class="bi bi-clock"></i> <strong>Hours:</strong> Mon-Sat: 7:00AM-9:00PM</p>
                        <p><i class="bi bi-car-front"></i> <strong>Services:</strong> Full motorcycle repair, parts, accessories</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="branch-card">
                        <h3>Malvar Road Branch</h3>
                        <p><i class="bi bi-geo-alt"></i> <strong>Address:</strong> 329 Malvar Road, Puerto Princesa City, 5300 Palawan</p>
                        <p><i class="bi bi-map"></i> <strong>Google Maps:</strong> <a href="https://www.google.com/maps/place/Two+Wheels+Zone/@9.7474692,118.7408171,17z/data=!3m1!4b1!4m6!3m5!1s0x33b563eb61d65407:0xeb029b393a73ae04!8m2!3d9.7474639!4d118.743392!16s%2Fg%2F11qh58crq0?entry=ttu&g_ep=EgoyMDI1MTIwMi4wIKXMDSoASAFQAw%3D%3D" target="_blank" class="text-light">View on Google Maps</a></p>
                        <p><i class="bi bi-facebook"></i> <strong>Facebook:</strong> <a href="https://web.facebook.com/TwoWheelsZone" target="_blank" class="text-light">Two Wheels Zone</a></p>
                        <p><i class="bi bi-clock"></i> <strong>Hours:</strong> Mon-Sat: 7:00AM-9:00PM</p>
                        <p><i class="bi bi-car-front"></i> <strong>Services:</strong> Motorcycle maintenance, customization</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="branch-card">
                        <h3>Elnido Branch</h3>
                        <p><i class="bi bi-geo-alt"></i> <strong>Address:</strong> Sitio Nasigdan Brgy. Villa Libertad Elnido, PUERTO PRINCESA, 5300 Palawan</p>
                        <p><i class="bi bi-map"></i> <strong>Google Maps:</strong> <a href="https://www.google.com/maps/place/Two+Wheels+Zone+Elnido+Branch/@11.1849735,119.4026727,17z/data=!3m1!4b1!4m6!3m5!1s0x33b655b59689923b:0xbd05adb45cb27eb5!8m2!3d11.1849682!4d119.4052476!16s%2Fg%2F11trrczjpl?entry=ttu&g_ep=EgoyMDI1MTIwMi4wIKXMDSoASAFQAw%3D%3D" target="_blank" class="text-light">View on Google Maps</a></p>
                        <p><i class="bi bi-facebook"></i> <strong>Facebook:</strong> <a href="https://web.facebook.com/TwoWheelsZone" target="_blank" class="text-light">Two Wheels Zone</a></p>
                        <p><i class="bi bi-clock"></i> <strong>Hours:</strong> Mon-Sat: 7:00AM-9:00PM</p>
                        <p><i class="bi bi-car-front"></i> <strong>Services:</strong> Emergency repairs, tire services</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'components/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
