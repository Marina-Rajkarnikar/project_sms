
<!-- $to = "shristikharel321@gmail.com";
$subject = "Test Mail";
$message = "Hello this is a simple email message.";
$from = "shristi.kharel@deerwalk.edu.np";
$headers = "From: $from";

mail($to, $subject, $message, $headers);

echo "Mail Sent."; -->

<?php 
// Import PHPMailer classes into the global namespace 
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\SMTP; 
use PHPMailer\PHPMailer\Exception; 
 
// Include library files 
require 'PHPMailer/Exception.php'; 
require 'PHPMailer/PHPMailer.php'; 
require 'PHPMailer/SMTP.php'; 
 
// Create an instance; Pass `true` to enable exceptions 
$mail = new PHPMailer; 
 
// Server settings 
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;    //Enable verbose debug output 
$mail->isSMTP();                            // Set mailer to use SMTP 
$mail->Host = 'smtp.example.com';           // Specify main and backup SMTP servers 
$mail->SMTPAuth = true;                     // Enable SMTP authentication 
$mail->Username = 'user@example.com';       // SMTP username 
$mail->Password = 'email_password';         // SMTP password 
$mail->SMTPSecure = 'ssl';                  // Enable TLS encryption, `ssl` also accepted 
$mail->Port = 465;                          // TCP port to connect to 
 
// Sender info 
$mail->setFrom('shristi.kharel@deerwalk.edu.np', 'SenderName'); 
$mail->addReplyTo('shristi.kharel@deerwalk.edu.np', 'SenderName'); 
 
// Add a recipient 
$mail->addAddress('shristi.kharel@deerwalk.edu.np'); 
 
//$mail->addCC('cc@example.com'); 
//$mail->addBCC('bcc@example.com'); 
 
// Set email format to HTML 
$mail->isHTML(true); 
 
// Mail subject 
$mail->Subject = 'Email from Localhost'; 
 
// Mail body content 
$bodyContent = '<h1>How to Send Email from Localhost</h1>'; 
$bodyContent .= '<p>This HTML email is sent from the localhost server using PHP.</b></p>'; 
$mail->Body    = $bodyContent; 
 
// Send email 
if(!$mail->send()) { 
    echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
} else { 
    echo 'Message has been sent.'; 
}