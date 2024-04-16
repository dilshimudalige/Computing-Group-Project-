<?php
// Error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include PHPMailer
use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';

// Function to send email
function sendEmail($to, $subject, $message) {
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.office365.com'; // Outlook SMTP server
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = 'ameeshagamage@outlook.com'; // Your Outlook email address
    $mail->Password = 'ameesha12345'; // Your Outlook password
    $mail->SMTPSecure = 'tls';

    $mail->setFrom('ameeshagamage@outlook.com', 'Admin'); // Sender's email address and name
    $mail->addAddress($to); // Recipient's email address

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $message;

    if ($mail->send()) {
        return true;
    } else {
        return false;
    }
}

// Email sending logic
$to = $_POST['usermail'];
$subject = 'Your Ticket Booking Confirmation';

// Construct email message
$message = '
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ticket Booking Confirmation</title>
</head>
<body style="font-family: Poppins, sans-serif; background-color: #f0f0f0; padding: 20px;">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.9/lottie.min.js"></script>

<div style="max-width: 600px; margin: 0 auto;">
    <div style="background-color: #fff; border-radius: 10px; padding: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <img src="https://i.ibb.co/ZfyDzYJ/pngwing-com-1.png" alt="Event Image" style="display: block; margin: 0 auto; border-radius: 10px; width: 100%;">
        <h1 style="text-align: center; margin-top: 20px;">Ticket Booking Confirmation</h1>
        <h3>Dear ' . $_POST['username'] . ',</h3>
        <p>Your ticket has been successfully booked for the '.$_POST['eventName'].'. Please find the details below:</p>
        <div style="margin-bottom: 10px; padding: 10px; background-color: #f2f2f2; border-radius: 5px;">
            <p><strong>Event Name:</strong> ' . $_POST['eventName'] . '</p>
            <p><strong>Your Name:</strong> ' . $_POST['username'] . '</p>
            <p><strong>Event Date:</strong> ' . $_POST['eventDate'] . '</p>
            <p><strong>Ticket Type:</strong> Rs.' . $_POST['ticketType'] . '</p>
            <p><strong>Ticket ID:</strong>' . $_POST['ticketID'] . '</p>
        </div>
        <p style="text-align: center;"><img src="https://i.ibb.co/HrrBsG2/image-3.png" alt="QR Code" style="border-radius: 5px;"></p>
        <p style="text-align: center; margin-top: 20px;">Thank you for booking with us.</p>
        <div style="text-align: center; margin-top: 20px;">
            <a href="#" style="text-decoration: none; color: #fff; background-color: #007bff; padding: 10px 20px; border-radius: 5px;">View More Events</a>
        </div>
    </div>
</div>

</body>
</html>
';

// Send email
if (sendEmail($to, $subject, $message)) {
    echo "Email sent successfully";
} else {
    echo "Failed to send email";
}
?>
