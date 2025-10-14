<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $organization = $_POST['organization'];
    $eventDate = $_POST['eventDate'];
    $message = $_POST['Message'];

    // Recipient email (replace with your email)
    $to = "damian@theguidingedge.com"; 

    // Email subject
    $subject = "New Booking Inquiry from $name - Dr. Richard Drucker Website";

    // Email headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: $name <$email>" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";

    // Email body (HTML)
    $body = "
    <html>
    <head>
        <style>
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background-color: #f7f8fa;
                margin: 0;
                padding: 0;
            }
            .container {
                max-width: 600px;
                margin: 40px auto;
                background-color: #ffffff;
                border-radius: 10px;
                box-shadow: 0 4px 12px rgba(0,0,0,0.08);
                overflow: hidden;
                border-top: 6px solid #08415c;
            }
            .header {
                background-color: #08415c;
                color: #fff;
                text-align: center;
                padding: 20px;
                font-size: 22px;
                font-weight: bold;
            }
            .content {
                padding: 30px;
                color: #333;
            }
            .content p {
                line-height: 1.6;
                margin-bottom: 12px;
            }
            .label {
                font-weight: 600;
                color: #08415c;
            }
            .footer {
                background-color: #f2f2f2;
                text-align: center;
                font-size: 14px;
                padding: 15px;
                color: #666;
            }
            .cta {
                display: inline-block;
                background-color: #08415c;
                color: white;
                text-decoration: none;
                padding: 10px 25px;
                border-radius: 5px;
                margin-top: 15px;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>Booking Inquiry – Dr. Richard Drucker</div>
            <div class='content'>
                <p><span class='label'>Name:</span> $name</p>
                <p><span class='label'>Email:</span> $email</p>$message
                <p><span class='label'>Organization:</span> $organization</p>
                <p><span class='label'>Event Date(s):</span> $eventDate</p>
                <p><span class='label'>Message:</span><br>" . $message . "</p>
                <br>
                <p>This inquiry was submitted via your website contact form.</p>
                <a href='mailto:$email' class='cta'>Reply to $name</a>
            </div>
            <div class='footer'>
                © " . date('Y') . " Dr. Richard Drucker. All rights reserved.
            </div>
        </div>
    </body>
    </html>";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>
                alert('Thank you, $name! Your inquiry has been successfully sent.');
                window.location.href = 'index.html';
              </script>";
    } else {
        echo "<script>
                alert('Sorry, there was a problem sending your inquiry. Please try again.');
                window.location.href = 'index.html';
              </script>";
    }
} else {
    header("Location: index.html");
    exit;
}
?>