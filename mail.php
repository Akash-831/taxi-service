<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';



$mail = new PHPMailer(true);

try {

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'negiakash359@gmail.com';
    $mail->Password = 'wighonphyhzkqoke';

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('negiakash359@gmail.com', 'PHPMailer Test');

    $mail->addAddress('receiver@example.com');

    $mail->isHTML(true);
    $mail->Subject = 'PHPMailer Test';

    $mail->Body = '
        <h2>Test Email</h2>
        <p>If you received this email, PHPMailer is working.</p>
    ';

    $mail->send();

    echo "Mail Sent Successfully";

} catch (Exception $e) {

    echo "Mail Failed: " . $mail->ErrorInfo;

}
?>