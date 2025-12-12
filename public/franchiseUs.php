<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Franchise Us - Two Wheels Zone</title>
    <link rel="shortcut icon" href="../lucent.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/franchiseUs.css">
</head>


<body>
    <?php include 'components/navigationBar.php'; ?>

    <section class="parallax" style="background-image: url('../assets/about/about.jpg');">
        <div class="parallax-content">
            <h1>Get in Touch</h1>
        </div>
    </section>

    <section class="franchise-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2>Franchise Inquiry</h2>
                    <?php
                    if (isset($_GET['status']) && $_GET['status'] == 'success') {
                        echo '<div id="success-alert" class="alert alert-success text-center mb-4">Thank you for your franchise inquiry! We will get back to you soon.</div>';
                    }
                    ?>
                    <form action="../sendFranchiseMessage.php" method="post">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="mobile" class="form-label">Mobile Number</label>
                                <div class="input-group">
                                    <span class="input-group-text">+63</span>
                                    <input type="tel" class="form-control" id="mobile" name="mobile" pattern="[0-9]{10}" placeholder="9123456789" title="Please enter exactly 10 digits (e.g., 9123456789)" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="findUs" class="form-label">How did you find us?</label>
                            <select class="form-control" id="findUs" name="findUs" required>
                                <option value="">Select an option</option>
                                <option value="internet">Internet Search</option>
                                <option value="social-media">Social Media</option>
                                <option value="referral">Referral</option>
                                <option value="advertisement">Advertisement</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Where do you plan to put the franchise?</label>
                            <input type="text" class="form-control" id="location" name="location" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="4"></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-submit">Submit Inquiry</button>
                        </div>
                    </form>
                </div>
            </div>
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
