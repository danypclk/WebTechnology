<?php
$name = "Client Name: ".$_POST['name']."\n";
$email = "Client Email: ".$_POST['email']."\n";
$worker = $_POST['referrer'];
$task = "Tasks: " .$_POST['notiz']."\n";
$dienste = "Addresse des Client: " .$_POST['address']."\n";
$request = "Special requests: " .$_POST['request']."\n";

$worker_1 = "danypereira264@gmail.com";
$worker_2 = "danysilver300@gmail.com";
$emadress = "";

if($worker == "r1")
{
	$emadress = $worker_1;
}
elseif($worker == "r2")
{
	$emadress = $worker_2;
}


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
$mail->setFrom('webtechnologienws21@gmail.com', 'Chief Operating Officer');
$mail->addAddress($emadress);
$mail->Subject = 'Naechster Auftrag '. date("Y/m/d");
$mail->msgHTML($name . "<br />" . $email . "<br />" . $task . "<br />" . $dienste . "<br />" . $request);
$mail->AltBody = 'HTML messaging not supported';

if(!$mail->send()){
	echo $worker;
    echo "Mailer Error: " . $mail->ErrorInfo;
}else{
    echo "<script>window.location.assign('admin-page-html')</script>";
}
?>