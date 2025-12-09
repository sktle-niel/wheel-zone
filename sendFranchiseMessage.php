<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';
require_once 'config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $mobile = trim($_POST['mobile']);
    $email = trim($_POST['email']);
    $findUs = trim($_POST['findUs']);
    $location = trim($_POST['location']);
    $message = trim($_POST['message']);

    if (empty($name) || empty($mobile) || empty($email) || empty($findUs) || empty($location) || empty($message)) {
        echo "All fields are required.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = SMTP_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = SMTP_USERNAME;
        $mail->Password = SMTP_PASSWORD;
        $mail->SMTPSecure = SMTP_SECURE;
        $mail->Port = SMTP_PORT;

        $mail->setFrom(SENDER_EMAIL, $name);
        $mail->addAddress('niel.ladica07@gmail.com');
        $mail->addReplyTo($email, $name);

        $mail->isHTML(true);
        $mail->Subject = "Franchise Inquiry from $name";
        $mail->Body = "
            <!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Franchise Inquiry</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f4f4f4;
                        margin: 0;
                        padding: 0;
                    }
                    .container {
                        max-width: 600px;
                        margin: 0 auto;
                        background-color: #ffffff;
                        padding: 20px;
                        border-radius: 8px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    }
                    .header {
                        text-align: center;
                        padding-bottom: 20px;
                        border-bottom: 1px solid #dddddd;
                    }
                    .header img {
                        max-width: 150px;
                        height: auto;
                    }
                    .header h1 {
                        color: #333333;
                        margin: 10px 0;
                        font-size: 24px;
                    }
                    .content {
                        padding: 20px 0;
                    }
                    .content h3 {
                        color: #333333;
                        margin-bottom: 20px;
                    }
                    .content p {
                        margin: 10px 0;
                        line-height: 1.6;
                    }
                    .content strong {
                        color: #555555;
                    }
                    .footer {
                        text-align: center;
                        padding-top: 20px;
                        border-top: 1px solid #dddddd;
                        color: #777777;
                        font-size: 12px;
                    }
                </style>
            </head>
            <body>
                <div class='container'>
                    <div class='header'>
                        <img src='http://localhost/moto-page/assets/branding/lucent.png' alt='Two Wheels Zone Logo'>
                        <h1>Two Wheels Zone</h1>
                    </div>
                    <div class='content'>
                        <h3>New Franchise Inquiry from $name</h3>
                        <p><strong>Name:</strong> $name</p>
                        <p><strong>Mobile Number:</strong> +63 $mobile</p>
                        <p><strong>Email:</strong> $email</p>
                        <p><strong>How did you find us?</strong> $findUs</p>
                        <p><strong>Planned Location:</strong> $location</p>
                        <p><strong>Message:</strong></p>
                        <p>$message</p>
                    </div>
                    <div class='footer'>
                        <p>This email was sent from the franchise inquiry form on Two Wheels Zone website.</p>
                        <p>&copy; 2023 Two Wheels Zone. All rights reserved.</p>
                    </div>
                </div>
            </body>
            </html>
        ";

        $mail->send();
        header('Location: public/franchiseUs.php?status=success');
        exit;
    } catch (Exception $e) {
        echo "Failed to send message. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    header('Location: public/franchiseUs.php');
    exit;
}
?>
