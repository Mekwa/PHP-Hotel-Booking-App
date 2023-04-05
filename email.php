<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
$mail->SMTPDebug = 2;                   // Enable verbose debug output
$mail->isSMTP();                        // Set mailer to use SMTP
$mail->Host       = 'smtp.gmail.com;';    // Specify main SMTP server
$mail->SMTPAuth   = true;               // Enable SMTP authentication
$mail->Username   = '';     // SMTP username
$mail->Password   = '';         // SMTP password
$mail->SMTPSecure = 'tls';              // Enable TLS encryption, 'ssl' also accepted
$mail->Port       = 587;                // TCP port to connect to

$mail->setFrom('keketsoleu12@gmail.com', '');           // Set sender of the mail
$mail->addAddress('keketsoleu12@gmail.com', 'Hotel receptionist');           // Add a recipient
$mail->addAddress('keketsoleu121@gmail.com', 'Back-up Email address for reception');   // Name is optional

$mail->addAttachment('booking.php');    // Name is optional

$mail->isHTML(true);                                  
$mail->Subject = 'Subject';
$mail->Body    = 'HTML message body in <b>bold</b>!';
$mail->AltBody = 'Body in plain text for non-HTML mail clients';
echo "<h2>Your Email has been sent successfully! We'll see you soon!!</h2>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
    <link rel="stylesheet" href="css/emailstyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>

</body>

</html>