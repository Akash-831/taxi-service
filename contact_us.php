<?php
include("config/connection.php");
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if(isset($_POST['submit']))
{
    $first_name = $_POST['first_name'];
    $last_name  = $_POST['last_name'];
    $email      = $_POST['email'];
    $phone      = $_POST['phone'];
    $message    = $_POST['message'];

    $insert = "INSERT INTO contact_table(first_name, last_name, email, phone, message)
               VALUES('$first_name','$last_name','$email','$phone','$message')";

    $run = mysqli_query($connection, $insert);

    if($run)
    {
        $mail = new PHPMailer(true);

        try {

            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'negiakash359@gmail.com';
            $mail->Password   = 'wighonphyhzkqoke';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            $mail->setFrom('negiakash359@gmail.com', 'Tour & Travel');
            $mail->addAddress($email, $first_name);

            $mail->isHTML(true);
            $mail->Subject = 'Contact Form Submitted Successfully';

 $mail->Body = "
<div style='max-width:650px; margin:auto; background:#ffffff; border-radius:20px; overflow:hidden; box-shadow:0 10px 30px rgba(0,0,0,0.12); font-family:Arial, Helvetica, sans-serif;'>

    <!-- Header -->
    <div style='background:linear-gradient(135deg, #0f172a, #1e40af); padding:50px 20px; text-align:center; color:white; position:relative;'>
        <h1 style='margin:0; font-size:34px; font-weight:700; letter-spacing:-1px;'>✈️ Tour & Travel</h1>
        <p style='margin:10px 0 0 0; font-size:17.5px; opacity:0.95;'>Your Dream Journey Begins Here</p>
        <div style='position:absolute; top:20px; right:25px; font-size:80px; opacity:0.10;'>🌍</div>
    </div>

    <!-- Main Content -->
    <div style='padding:40px 20px; color:#1e2937;'>

        <h2 style='color:#1e40af; margin:0 0 22px 0; font-size:24px;'>Hello {$first_name},</h2>
       
        <p style='font-size:16px; line-height:1.75; color:#334155; margin-bottom:28px;'>
            Thank you for contacting us! We have successfully received your enquiry and appreciate your interest in our travel services.
        </p>

        <!-- Enquiry Details -->
        <div style='background:linear-gradient(135deg, #f8fafc, #e0f2fe);
                    border:2px solid #60a5fa;
                    padding:28px 25px;
                    margin:32px 0;
                    border-radius:16px;'>
           
            <h3 style='margin:0 0 22px 0; color:#1e40af; font-size:20px;'>📋 Your Enquiry Details</h3>
           
            <p style='margin:12px 0; font-size:16px;'><strong>Name:</strong> {$first_name} {$last_name}</p>
            <p style='margin:12px 0; font-size:16px;'><strong>Email:</strong> {$email}</p>
            <p style='margin:12px 0; font-size:16px;'><strong>Phone:</strong> {$phone}</p>
            <p style='margin:12px 0; font-size:16px; line-height:1.65;'><strong>Message:</strong><br>{$message}</p>
        </div>

        <!-- Button -->
        <div style='text-align:center; margin:45px 0;'>
            <a href='https://taxi-service.infinityfreeapp.com/'
               style='background:linear-gradient(135deg, #2563eb, #3b82f6);
                      color:white;
                      text-decoration:none;
                      padding:17px 50px;
                      border-radius:50px;
                      font-size:17px;
                      font-weight:700;
                      display:inline-block;
                      box-shadow:0 8px 20px rgba(37,99,235,0.35);'>
                Explore More Destinations
            </a>
        </div>

        <p style='font-size:16px; line-height:1.75; color:#334155; margin-bottom:30px;'>
            Our experienced travel expert will contact you shortly to understand your requirements in detail and help you plan a perfect and memorable trip.
        </p>

        <p style='margin-top:35px; color:#1e40af; font-size:16.5px; font-weight:500;'>
            Warm Regards,<br>
            <strong>Tour & Travel Team</strong>
        </p>
    </div>

    <!-- Footer -->
    <div style='background:#0f172a; padding:30px 20px; text-align:center; color:#94a3b8; font-size:14.5px; line-height:1.6;'>
        <p style='margin:8px 0;'>📞 <strong>7017652679</strong></p>
        <p style='margin:8px 0;'>✉️ <strong>nakki831@gmail.com</strong></p>
        <p style='margin:25px 0 8px 0; font-size:13px; opacity:0.75;'>
            © 2026 Tour & Travel | Making Dreams Come True
        </p>
    </div>
</div>";
            $mail->send();

        } catch (Exception $e) {
        }

        $_SESSION["contact"] = "Application submitted successfully";
        header("Location: index.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="contact_us.css">
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>

  <title>Document</title>
</head>

<body>
  <?php
  include("include/header.php");
  ?>
  <div class="top-banner-section">
    <span></span>
    <div class="top-banner-content">
      <div class="banner-link">
        <a href="index.php">HOME</a>
        <i class="fa-solid fa-chevron-right"></i>
        <p>CONTACT US</p>
      </div>
      <p class="top-banner-heading">Contact Us</p>
    </div>
  </div>
  <div class="contact-container">
    <div class="contact-detials-container">
      <label class="contact-details-container-border"></label>
      <div class="get-in-touch">
        <h3>Get In Touch</h3>
        <label class="bottom-border"></label>
      </div>
      <p class="booking-inquiries">We're available 24/7 to assist you with bookings and inquiries.</p>
      <div class="social-contact-container">
        <div class="call-us-number">
          <div>
            <i class="fa-solid fa-phone-volume"></i>
          </div>
          <div class="call-us-contact">
            <p class="call-us-heading">CALL US</p>
            <a href="tel:7017652679">(+91) 70176526789</a>
            <a href="tel:7017652679">(+91) 70176526789</a>
            <a href="tel:7017652679">(+91) 70176526789</a>
          </div>
        </div>
        <div class="call-us-number">
          <div>
            <i class="fa-regular fa-envelope"></i>
          </div>
          <div class="call-us-contact">
            <p class="call-us-heading">EMAIL US</p>
            <a href="mailto:nakki831@gmail.com">negiakash359@gmail.com</a>
          </div>

        </div>
        <div class="call-us-number">
          <div>
            <i class="fa-solid fa-location-dot"></i>
          </div>
          <div class="call-us-contact">
            <p class="call-us-heading">OUR ADDRESS</p>
            <p class="sub-content">Near Durga Mata Mandir Thawe, Rikhai Tola, Bihar 841440</p>
          </div>

        </div>
        <div class="call-us-number">
          <div>
            <i class="fa-regular fa-clock"></i>
          </div>
          <div class="call-us-contact">
            <p class="call-us-heading">WORKING HOURS</p>
            <p class="sub-content">24 Hours / 7 Days a Week
            </p>
          </div>
        </div>
      </div>
      <div class="contact-footer-icon">
        <p class="follow-us">Follow Us</p>
        <div class="icon-container">
          <a href=""><i class="fa-brands fa-facebook-f" style="color:#d4880a"></i></a>
          <a href=""><i class="fa-brands fa-twitter" style="color:#d4880a;"></i></a>
          <a href=""><i class="fa-brands fa-linkedin" style="color:#d4880a;"></i></a>
          <a href=""><i class="fa-brands fa-square-instagram" style="color:#d4880a;"></i></a>
        </div>
      </div>
    </div>
    <div class="send-msg-container">
      <label class="contact-details-container-border"></label>
      <div class="get-in-touch">
        <h3>Send Us a Message</h3>
        <label class="bottom-border"></label>
      </div>
      <p class="booking-inquiries">Fill in the form below and we'll get back to you as soon as possible.
      </p>
      <form method="post">
      <div class="text-input-container">
        <div class="contact-name-input">
          <i class="fa-regular fa-user" style="color:#d4880a;"></i>
          <input type="text" placeholder="First Name" name="first_name" require>
        </div>
        <div class="contact-name-input">
          <i class="fa-regular fa-user" style="color:#d4880a;"></i>
          <input type="text" placeholder="Last Name" name="last_name" require>
        </div>
      </div>
      <div class="text-input-container">
        <div class="contact-name-input">
          <i class="fa-regular fa-envelope" style="color:#d4880a;"></i> <input type="text" placeholder="Your Email*" name="email" require>
        </div>
        <div class="contact-name-input">
          <i class="fa-solid fa-phone" style="color:#d4880a;"></i> <input type="text" placeholder="Phone number" name="phone" require>
        </div>
      </div>
      <div class="textarea">
        <i class="fa-regular fa-comment" style="color: #d4880a;"></i> <textarea placeholder="Your Message" name="message" require></textarea>
      </div>
      <button type="submit" name="submit">Send Message<label><i class="fas fa-arrow-right"></i></label></button>
    </form>
    </div>
  </div>
   <div class="google-map">
     <iframe 
  class="map"
  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16411.815154885244!2d78.59964543212003!3d30.147104494801315!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3909090d5b91180d%3A0x5d7916d17f992317!2sDevprayag%2C%20Uttarakhand!5e0!3m2!1sen!2sin!4v1779778120291!5m2!1sen!2sin"
  width="600"
  height="450"
  style="border:0;"
  allowfullscreen=""
  loading="lazy"
  referrerpolicy="no-referrer-when-downgrade">
</iframe>
    </div>
    <?php
    include("include/footer.php");
    ?>
</body>
</html>