<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Two Wheels Zone</title>
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
        .parallax.parallax-2 {
            background-image: url('../assets/carousel/w2.jpg');
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
        }
        .contact-content {
            padding: 4rem 0;
            background: linear-gradient(135deg, #000000 0%, #1a1a1a 100%);
            color: #fff;
        }
        .contact-content h2 {
            color: #41CE34;
            text-transform: uppercase;
            margin-bottom: 2rem;
        }
        .contact-content p {
            text-align: justify;
            line-height: 1.6;
        }
        .contact-form, .contact-info {
            background: rgba(0, 0, 0, 0.8);
            padding: 2rem;
            border-radius: 10px;
            margin-bottom: 2rem;
        }
        .contact-form {
            font-family: sans-serif;
        }
        .contact-form h3, .contact-info h3 {
            color: #41CE34;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .form-group label {
            color: #fff;
            text-align: left;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #41CE34;
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            font-family: 'Helvetica Neue', Arial, sans-serif !important;
        }
        .btn-submit {
            width: 100%;
            padding: 0.75rem;
            background: #41CE34;
            border: none;
            border-radius: 5px;
            color: #000;
            font-weight: bold;
            cursor: pointer;
        }
        .btn-submit:hover {
            background: #2E8B57;
        }
        .contact-info p {
            margin-bottom: 0.5rem;
        }
        .contact-info i {
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
            .contact-content {
                padding: 2rem 0;
            }
            .contact-content h2 {
                font-size: 1.5rem;
                margin-bottom: 1.5rem;
            }
            .contact-content p {
                font-size: 0.9rem;
                line-height: 1.5;
            }
            .row.mt-5 .col-md-6 {
                margin-bottom: 2rem;
            }
            .row.mt-5 .col-md-6:last-child {
                margin-bottom: 0;
            }
            .form-group label {
                display: block;
                text-align: left !important;
            }
        }

        @media (max-width: 576px) {
            .parallax-content h1 {
                margin-top: 30px;
                font-size: 1.5rem;
                width: 250px;
            }
            .parallax-content p {
                font-size: 0.9rem;
                max-width: none;
            }
            .contact-content {
                padding: 1rem 0;
            }
            .contact-content h2 {
                font-size: 1.2rem;
                margin-bottom: 1rem;
            }
            .contact-content p {
                font-size: 0.8rem;
                line-height: 1.4;
            }
            .contact-form, .contact-info {
                padding: 1rem;
            }
            .form-group input, .form-group textarea {
                padding: 0.4rem;
                font-size: 0.9rem;
            }
            .btn-submit {
                padding: 0.6rem;
                font-size: 0.9rem;
            }
            .form-group label {
                display: block;
                text-align: left !important;
            }
        }
    </style>
</head>
<body>
    <?php include 'components/navigationBar.php'; ?>

    <section class="parallax" style="margin-top: -120px;">
        <div class="parallax-content">
            <h1>Contact Us</h1>
            <p>Get in touch with us for all your motorcycle needs. We're here to help you ride better.</p>
        </div>
    </section>

    <section class="contact-content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center">Reach Out to Us</h2>
                    <p class="text-center">Have questions about our services, need assistance with your motorcycle, or interested in franchising? We're just a call or message away. Our team is ready to provide you with expert advice and top-notch service.</p>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="contact-form">
                        <h3>Send us a Message</h3>
                        <form action="../sendMessage.php" method="post">
                            <div class="form-group">
                                <label for="name" class="text-start">Name</label>
                                <input type="text" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-start">Email</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="subject" class="text-start">Subject</label>
                                <input type="text" id="subject" name="subject" required>
                            </div>
                            <div class="form-group">
                                <label for="message" class="text-start">Message</label>
                                <textarea id="message" name="message" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn-submit">Send Message</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-info">
                        <h3>Get in Touch</h3>
                        <p><i class="bi bi-telephone"></i> <strong>Globe:</strong> 0966 061 9979</p>
                        <p><i class="bi bi-telephone"></i> <strong>Smart:</strong> 0919 269 4103</p>
                        <p><i class="bi bi-facebook"></i> <a href="https://web.facebook.com/TwoWheelsZone" target="_blank">Follow us on Facebook</a></p>
                        <p><i class="bi bi-geo-alt"></i> <strong>Located Branch:</strong> [Insert Address Here]</p>
                        <p><i class="bi bi-clock"></i> <strong>Business Hours:</strong> Mon-Sat: 8AM-6PM</p>
                    </div>
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
