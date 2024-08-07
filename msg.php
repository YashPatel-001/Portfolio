<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require('PHPMailer/PHPMailer.php');
require('PHPMailer/SMTP.php');
require('PHPMailer/Exception.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $name = $_POST["name"];
   $email = $_POST["email"];
   $subject = $_POST["subject"];
   $message = $_POST["message"];

   $mail = new PHPMailer(true);

   try {
      $mail->SMTPDebug = 2; // Uncomment for debugging
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';  // Replace with your SMTP server
      $mail->SMTPAuth = true;
      $mail->Username = 'yp908196@gmail.com'; // Replace with your SMTP username
      $mail->Password = 'fnsldxcbwpcekkcn'; // Replace with your SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
      $mail->Port = 465;

      $mail->setFrom($email, $name);
      $mail->addAddress('yp908196@gmail.com', 'Portfolio'); // Replace with the recipient's email address
      $mail->isHTML(true);
      $mail->Subject = "Contact Form Submission: $subject";
      $mail->Body = "<strong>Name:</strong> $name
                     <strong>Email:</strong> $email\n\n <strong>Message:</strong> $message";

      if ($mail->send()) {
         echo "<script>
                  alert('Thank you for your message. We will contact you shortly.');
                  window.location.href = 'index.html'; // Redirect to index page
               </script>";
      } else {
         echo "<script>
                  alert('Failed to send email. Please try again later.');
                  window.location.href = 'contact.html'; // Redirect to contact page
               </script>";
      }
   } catch (Exception $e) {
      echo "Failed to send email: {$mail->ErrorInfo}";
   }
}
