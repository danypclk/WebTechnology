<?php


$name_1 = $_POST['name'];
$email_1 = $_POST['email'];
$worker_1 = $_POST['referrer'];
$task_1 = $_POST['notiz'];
$address_1 = $_POST['address'];
$request_1 = $_POST['request'];

$date = date("Y.m.d");

// search if client name exists

$client_file = "register-folder/client-file.txt";
$client_new_file = fopen($client_file, "r");
$count = false;

if(file_exists($client_file))
{
	while($row = fgets($client_new_file)) 
	{
		list( $Name_client, $Pass_client, $Date_client, $email_client, $Position_client) = explode( ":", $row );
		$client_trimed = trim($Name_client);
		if($client_trimed == $name_1)
		{
			$count = true;
		}
	}
}
else
{
	echo "<script>alert('Datei gibt es nicht! Loggen Sie sich als erstes ein!')</script>";
	echo "<script>window.location.assign('admin-page.html')</script>";
}

if($count != true)
{
	echo "<script>alert('Name nicht gefunden!')</script>";
	echo "<script>window.location.assign('admin-page.html')</script>";
}

// create/append to work order text file

$worker_file = "Data/Work_orders/work_order.txt";

		if(file_exists($worker_file))
		{
			$myfile = fopen($worker_file, "a");
			fwrite($myfile, $name_1 . ":");
			fwrite($myfile, $email_1 . ":");
			fwrite($myfile, $date . ":");
			fwrite($myfile, $task_1 . ":");
			fwrite($myfile, $address_1 . ":");
			fwrite($myfile, $request_1 . "\n");
			fclose($myfile);
		}
		else
		{
			$myfile = fopen($worker_file, "w");
			fwrite($myfile, $name_1 . ":");
			fwrite($myfile, $email_1 . ":");
			fwrite($myfile, $date . ":");
			fwrite($myfile, $task_1 . ":");
			fwrite($myfile, $address_1 . ":");
			fwrite($myfile, $request_1 . "\n");
			fclose($myfile);
		}

$workers_new_file = fopen($worker_file, "r");

// create/rewrite order iframe

$worker_file_name = "iframe-folder/worker_list.html";

		$worker_order_list = fopen($worker_file_name, "w");
		fwrite($worker_order_list,"<h2>Orders:</h2>");
		while($row = fgets($workers_new_file)) 
		{
			list( $Name, $Email, $Date, $Task, $Address, $Request ) = explode( ":", $row );
			fwrite($worker_order_list,"<p>Arbeiter: ". $worker_1 . "</p>");
			fwrite($worker_order_list,"<p>Datum: ". $Date . "</p>");
			fwrite($worker_order_list,"<p>Name: ". $Name . "</p>");
			fwrite($worker_order_list,"<p>Email: ". $Email . "</p>");
			fwrite($worker_order_list,"<p>Aufgabe: ". $Task . "</p>");
			fwrite($worker_order_list,"<p>Adresse: ". $Address . "</p>");
			fwrite($worker_order_list,"<p>Wunsch: ". $Request . "</p>");
			fwrite($worker_order_list,"<hr />");
			fwrite($worker_order_list,"<br />");
		}
		fclose($worker_order_list);

fclose($workers_new_file);

// create and store pdf invoice

require('fpdf/fpdf.php');

$pdf_file = 'Data/Rechnung/' . $name_1 . '.pdf';

$pdf = new FPDF();
$pdf -> AddPage();
$pdf -> SetFont('Arial', '', 12);


$pdf -> Cell(55, 50, 'Rechnung', 0 , 1 , 'C');

$pdf -> Cell(55, 5, 'Referenzcode', 0 , 0);
$pdf -> Cell(58, 5, ': 026ETY', 0 , 0);
$pdf -> Cell(25, 5, 'Datum', 0 , 0);
$pdf -> Cell(52, 5, ': ' . $date, 1 , 1);

$pdf -> Cell(55, 5, 'Betrag', 0 , 0);
$pdf -> Cell(58, 5, ': 100$', 0 , 1);

$pdf -> Cell(55, 5, 'Status', 0, 0);
$pdf -> Cell(58, 5, ': Unvollstaendig', 0, 1);


$pdf -> Cell(55, 5, 'Bezahlt von', 0, 0);
$pdf -> Cell(58, 5, ':', 0, 0);

$pdf -> Line(155,75,270,75);
$pdf -> Ln(10);
$pdf -> Cell(140, 5, '', 0 , 0);
$pdf -> Cell(50, 5, 'Unterschrift', 0, 1, 'C');

$pdf -> Output($pdf_file, 'F');

echo "<script>alert('Mitarbeiter erfolgreich beauftragt!')</script>";
echo "<script>window.location.assign('admin-page.html')</script>";

/*   Only useful if used with PHPMAILER and extension=openssl.dll


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
    echo "<script>window.location.assign('admin-page.html')</script>";
}*/
?>