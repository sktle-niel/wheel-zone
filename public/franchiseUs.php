<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Franchise Us - Two Wheels Zone</title>
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

    .parallax {
        background-image: url('../assets/about/about.jpg');
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
        border-left: 5px solid #41CE34;
        padding-left: 1rem;
    }
    .franchise-form {
        padding: 4rem 0;
        background: linear-gradient(135deg, #000000 0%, #1a1a1a 100%);
        color: #fff;
    }
    .franchise-form h2 {
        color: #41CE34;
        text-transform: uppercase;
        margin-bottom: 2rem;
        text-align: center;
        font-family: Arial, sans-serif;
    }
    .form-control {
        background-color: rgba(255, 255, 255, 0.1);
        border: 1px solid #41CE34;
        font-family: Arial, sans-serif;
        color: #fff;
    }
    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.7) !important;
    }
    .form-control:focus {
        background-color: rgba(255, 255, 255, 0.2);
        border-color: #41CE34;
        box-shadow: 0 0 0 0.2rem rgba(65, 206, 52, 0.25);
    }
    .form-label {
        font-family: Arial, sans-serif;
    }
    .btn-submit {
        background-color: #41CE34;
        border: none;
        color: #000;
        font-weight: bold;
        text-transform: uppercase;
        padding: 0.75rem 2rem;
        transition: all 0.3s ease;
        font-family: Arial, sans-serif;
    }
    .btn-submit:hover {
        background-color: #36b32a;
        transform: translateY(-2px);
    }
    @media (max-width: 768px) {
        .parallax {
            height: 70vh;
        }
        .parallax-content h1 {
            margin-top: 50px;
            font-size: 2rem;
        }
        .franchise-form {
            padding: 2rem 0;
        }
        .franchise-form h2 {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }
    }
    @media (max-width: 576px) {
        .parallax-content {
            left: 5%;
        }
        .parallax-content h1 {
            font-size: 1.5rem;
            border-left: 3px solid #41CE34;
            padding-left: 0.5rem;
        }
        .form-label {
            text-align: left;
        }
        .franchise-form {
            padding: 1rem 0;
        }
        .franchise-form h2 {
            font-size: 1.2rem;
            margin-bottom: 1rem;
        }
        .row {
            justify-content-start !important;
        }
    }
    </style>
</head>
<body>
    <?php include 'components/navigationBar.php'; ?>

    <section class="parallax" style="margin-top: -120px;">
        <div class="parallax-content">
            <h1>Get in Touch</h1>
        </div>
    </section>

    <section class="franchise-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2>Franchise Inquiry</h2>
                    <form action="#" method="post">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="mobile" class="form-label">Mobile Number</label>
                                <div class="input-group">
                                    <span class="input-group-text" style="font-family: Arial, sans-serif; background-color: rgba(255, 255, 255, 0.1); border: 1px solid #41CE34; color: #fff;">+639</span>
                                    <input type="tel" class="form-control" id="mobile" name="mobile" pattern="[0-9]{9}" placeholder="XXXXXXXXX" required>
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
</body>
</html>
