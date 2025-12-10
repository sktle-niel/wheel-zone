<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Two Wheels Zone</title>
    <link rel="shortcut icon" href="../lucent.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/contactUs.css">
</head>
<body>
    <?php include 'components/navigationBar.php'; ?>

    <section class="parallax" style="background-image: url('../assets/carousel/w1.jpg');">
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
                    <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
                        <div id="success-alert" class="alert alert-success text-center" role="alert">
                            Thank you for your message! We will get back to you soon.
                        </div>
                    <?php endif; ?>
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
                        <p><i class="bi bi-telephone"></i> <strong>09166842718</p>
                        <p><i class="bi bi-facebook"></i> <a href="https://web.facebook.com/TwoWheelsZone" target="_blank">Follow us on Facebook</a></p>
                        <p><i class="bi bi-clock"></i> <strong>Business Hours:</strong> Mon-Sat: 7:00AM-9:00PM</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="parallax parallax-2" style="background-image: url('../assets/carousel/w2.jpg');">
        <div class="parallax-content">
            <h1>Experience Excellence</h1>
            <p>Where passion meets precision in motorcycle care</p>
        </div>
    </section>

    <?php include 'components/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Fade out success alert after 5 seconds
        setTimeout(function() {
            const alert = document.getElementById('success-alert');
            if (alert) {
                alert.style.transition = 'opacity 1s';
                alert.style.opacity = '0';
                setTimeout(function() {
                    alert.style.display = 'none';
                }, 1000);
            }
        }, 5000);
    </script>
</body>
</html>
