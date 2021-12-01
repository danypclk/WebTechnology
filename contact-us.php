<?php
$name = "Client Name: ".$_POST['name']."\n";
$email = "Client Email: ".$_POST['email']."\n";
$message = "Message: " . $_POST['message']."\n";
$emadress = "feedbackwebtechnologienws21@outlook.com";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer;
$mail->isSMTP(); 
$mail->SMTPDebug = 2;
$mail->Host = "smtp.gmail.com"; 
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "webtechnologienws21@gmail.com";
$mail->Password = 'Web21ws21';
$mail->setFrom('webtechnologienws21@gmail.com', 'Contact-us');
$mail->addAddress($emadress);
$mail->Subject = 'Contacted us at the date: '. date("Y/m/d");
$mail->msgHTML($name . "<br />" . $email . "<br />" . $message);
$mail->AltBody = 'HTML messaging not supported';

if(!$mail->send()){
	echo $worker;
    echo "Mailer Error: " . $mail->ErrorInfo;
}else{
    echo "<script>window.location.assign('../contact-us.html')</script>";
}
?>