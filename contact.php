<?php

require 'assets/vendor/PHPMailer/src/Exception.php';
require 'assets/vendor/PHPMailer/src/PHPMailer.php';
require 'assets/vendor/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
$alert = '';
if(count($_POST) > 1) {
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$mail = new PHPMailer();
try {
  $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
  $mail->isSMTP();                                            //Send using SMTP
  $mail->Host       = 'thelearningladderabuja.com';           //Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
  $mail->Username   = 'ask@thelearningladderabuja.com';     //SMTP username
  $mail->Password   = 'Buchi/2021';                           //SMTP password
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
  $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

  //Recipients
  $mail->setFrom('ask@thelearningladderabuja.com', $name);
  $mail->addAddress('contact@thelearningladderabuja.com', 'The Learning Ladder Abuja');     //Add a recipient
  $mail->addReplyTo($email, $name);

  //Content
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = $subject;
  $mail->Body    = $message;
  $mail->AltBody = $message;

  $mail->send();
  $alert = 'alert-success';
  $error_message = 'Your message has been sent successfully, check your email for reply';
} catch (Exception $e) {
    $alert = 'alert-danger';
    $error_message = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
?>
<?php include 'base/header.php'?>
<!-- Page Header Start here -->
  <section class="page-header section-notch">
    <div class="overlay">
      <div class="container">
        <h3>Our Contact Info</h3>
        <ul>
          <li><a href="index-2.html">Home</a></li>
          <li>-</li>
          <li>Contact us</li>
        </ul>
      </div><!-- container -->
    </div><!-- overlay -->
  </section><!-- page header -->
  <!-- Page Header End here -->


  <!-- Contact Start here -->
  <section class="contact contact-page">
    <div class="contact-details padding-120">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-xs-12">
            <ul>
              <li class="contact-item">
                <span class="icon flaticon-signs"></span>
                <div class="content">
                  <h4>Our Location</h4>
                  <p>No. 8 Stephen Orosanye Street Off 4th Avenue <br>Gwarimpa-Abuja</p>
                </div>
              </li>
              <li class="contact-item">
                <span class="icon flaticon-smartphone"></span>
                <div class="content">
                  <h4>Phone Number</h4>
                  <p>07025008028</p>
                </div>
              </li>
              <li class="contact-item">
                <span class="icon flaticon-message"></span>
                <div class="content">
                  <h4>Email Address</h4>
                  <p>ask@thelearningladderabuja.com</p>
                </div>
              </li>
            </ul>
          </div>
          <div class="col-lg-8 col-md-6 col-xs-12">
            <?php if($alert == null):?>
                <div div class="<?= $alert?> alert-success text-center p-3">
                  <h5>Hello world</h5>
                </div>
            <?php endif ?>
            <form class="contact-form" action="contact.php" method="post">
              <input type="text" name="name" placeholder="Your Name" class="contact-input">
              <input type="email" name="email" placeholder="Your Email" class="contact-input">
              <input type="subject" name="subject" placeholder="Subject" class="contact-input">
              <textarea rows="5" name="message" class="contact-input" placeholder="Your Message"></textarea>
              <input type="submit" name="submit" value="Send Message" class="contact-button">
            </form>
          </div>
        </div><!-- row -->
      </div><!-- container -->
    </div><!-- contact-details -->
  </section>
  <!-- Contact End here -->
<?php include('base/footer.php') ?>