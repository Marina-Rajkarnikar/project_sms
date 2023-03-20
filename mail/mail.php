<?php
namespace MyProject;
use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';
include 'config.php';
include 'function.php';
$mail = new PHPMailer;
                     
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'shristi.kharel@deerwalk.edu.np';                     
    $mail->Password   = 'Silverjubly2001*';                               
    $mail->SMTPSecure = 'tls';            
    $mail->Port       = 587;                               

    //Recipients
    $mail->setFrom('shristi.kharel@deerwalk.edu.np', 'Mailer');
$sql = "Select * from book_details where status='approved'";
// $content = book_email();
$res = mysqli_query($con, $sql);
if(mysqli_num_rows($res)>0){
    $mail->addReplyTo('shristi.kharel@deerwalk.edu.np', 'Information');
    while($x=mysqli_fetch_assoc($res)){
        $mail->addADDRESS($x['email']);
    }
    $mail->isHTML(true);                                  
    $mail->Subject = 'Booking Confirmation';
    $mail->Body = 'Hello rentee, your booking has been confirmed! We hope you enjoy our service!';
    $mail->AltBody = 'Hello rentee, your booking has been confirmed! We hope you enjoy our service!';

    if($mail->send()){
        echo 'Message has been sent';
    }else{
    echo "Failure";
    };
} else{
    echo "No Data Found!";
}
    

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    

    //Content
    
    
?>