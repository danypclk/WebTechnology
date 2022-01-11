<?php

// data to work with

$name_1 = $_POST['name'];
$email_1 = $_POST['email'];
$worker_1 = $_POST['referrer'];
$task_1 = $_POST['notiz'];
$address_1 = $_POST['address'];
$request_1 = $_POST['request'];

$date = date("d/m/Y");

// what to pay for each task and converting it to taxes

$payable = 0; // amount to pay for the task
$tax = 0.15825;

if($task_1 == 'Reinigung')
{
	$payable = 100;
}
else if($task_1 == 'Reparatur')
{
	$payable = 310;
}
else if($task_1 == 'Ersetzung')
{
	$payable = 60;
}	
else
{
	$payable = 150;
}		

$taxable = $payable * $tax;
$total_due = $taxable + $payable;

// search if client name exists

$client_file = "register-folder/client-file.txt";
$client_new_file = fopen($client_file, "r");
$count = false;

if(file_exists($client_file))
{
	while($row = fgets($client_new_file)) 
	{
		list( $Name_client, $Pass_client, $email_client, $Position_client) = explode( ":", $row );
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

// create/append data to invoice text file and generating a new invoice number

$invoice_file = "Data/invoices/invoices.txt";
$invoice_number = '0';

if(file_exists($invoice_file))
{
	if(trim(file_get_contents($invoice_file)) == false)
	{
		$invoice_number = '0';
	}
	else
	{
		$file_lines = new \SplFileObject($invoice_file, 'r');
		$file_lines->seek(PHP_INT_MAX);
		$invoice_number =  strval($file_lines->key());
	}
}

if(file_exists($invoice_file))
{
	$myfile = fopen($invoice_file, "a");
	fwrite($myfile, $name_1 . ":");
	fwrite($myfile, $invoice_number . "\n");
	fclose($myfile);
}
else
{
	$myfile = fopen($invoice_file, "w");
	fwrite($myfile, $name_1 . ":");
	fwrite($myfile, $invoice_number . "\n");
	fclose($myfile);
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
			fwrite($myfile, $request_1 . ":");
			fwrite($myfile, $worker_1 . "\n");
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
			fwrite($myfile, $request_1 . ":");
			fwrite($myfile, $worker_1 . "\n");
			fclose($myfile);
		}

// create/rewrite order iframe

$workers_new_file = fopen($worker_file, "r");

$worker_file_name = "iframe-folder/worker_list.html";

		$worker_order_list = fopen($worker_file_name, "w");
		fwrite($worker_order_list,"<h2>Arbeitsaufträge:</h2>");
		while($row = fgets($workers_new_file)) 
		{
			list( $Name, $Email, $Date, $Task, $Address, $Request, $worker) = explode( ":", $row );
			fwrite($worker_order_list,"<p>Arbeiter: ". $worker . "</p>");
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

// create selector for client/admin page to be able to download pdfs

$client_invoice_selector = "Data/Selector/client_invoice.html";

$client_invoice_name = [];
$client_invoice_id = [];
$file_invoice_selector = "Data/Invoices/invoices.txt";
$count_array_size = 0;
$array_of_clients = [];

$file_invoices_selector_open = fopen($file_invoice_selector, "r");
while($row = fgets($file_invoices_selector_open))
{
	list($Name, $Invoice_ID ) = explode( ":", $row );
	array_push($client_invoice_name, $Name);
	array_push($client_invoice_id, $Invoice_ID);
}
fclose($file_invoices_selector_open);

$size_of_array = sizeof($client_invoice_name);

$file_selector = fopen($client_invoice_selector, "w");
while($count_array_size < $size_of_array)
{
	fwrite($file_selector, "<option value=\"" . $client_invoice_name[$count_array_size] . ":" . $client_invoice_id[$count_array_size] ."\">" . $client_invoice_name[$count_array_size]  . ", Rechnung ID: " . $client_invoice_id[$count_array_size] . "</option>\n");
	if(!in_array($client_invoice_name[$count_array_size], $array_of_clients, TRUE))
	{
		array_push($array_of_clients, $client_invoice_name[$count_array_size]);
	}
	$count_array_size = $count_array_size + 1;
}
fclose($file_selector);

foreach($array_of_clients as $selector_for_client)
{
	$client_invoice_selector_for_clients = "Data/Selector/" . $selector_for_client . ".html";
	
	$count_array_size = 0;
	$client_invoice_selector_c = fopen($client_invoice_selector_for_clients, "w");
	while($count_array_size < $size_of_array)
	{
		if($client_invoice_name[$count_array_size] == $selector_for_client)
		{
			fwrite($client_invoice_selector_c, "<option value=\"" . $client_invoice_name[$count_array_size] . ":" . $client_invoice_id[$count_array_size] ."\">" . $client_invoice_name[$count_array_size]  . ", Rechnung ID: " . $client_invoice_id[$count_array_size] . "</option>\n");
		}
		$count_array_size = $count_array_size + 1;
	}
	fclose($client_invoice_selector_c);
}

// create and store pdf invoice

require('fpdf/fpdf.php');

$pdf_file = 'Data/Rechnung/' . $name_1 . '_' . $invoice_number . '.pdf';

$pdf = new FPDF();
$pdf -> AddPage();

$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130 ,5,'TRUE IT .CO',0,0);
$pdf->Cell(59 ,5,'RECHNUNG',0,1);


$pdf->SetFont('Arial','',12);

$pdf->Cell(130 ,5,'[Schneidershof, 54293]',0,0);
$pdf->Cell(59 ,5,'',0,1);

$pdf->Cell(130 ,5,'[Trier, Deutschland]',0,0);
$pdf->Cell(25 ,5,'Datum',0,0);
$pdf->Cell(34 ,5,'[' . $date . ']',0,1);

$pdf->Cell(130 ,5,'E-mail [' . $email_1 . ']',0,0);
$pdf->Cell(25 ,5,'Rechnung',0,0);
$pdf->Cell(34 ,5,'[#' . $invoice_number . ']',0,1);

$pdf->Cell(130 ,5,'Fax [+12345678]',0,0);
$pdf->Cell(25 ,5,'Kunden ID',0,0);
$pdf->Cell(34 ,5,'[' . $name_1 . ']',0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);

//billing address
$pdf->Cell(100 ,5,'Bezahlen an',0,1);


$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,'[Andreas Schmitt]',0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,'[True IT GmbH]',0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,'[andreas_schmit@example.com]',0,1);

//dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(130 ,5,'Beschreibung',1,0);
$pdf->Cell(25 ,5,'Steuer',1,0);
$pdf->Cell(34 ,5,'Hoehe',1,1);

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter

$pdf->Cell(130 ,5,$task_1,1,0);
$pdf->Cell(25 ,5,$taxable,1,0);
$pdf->Cell(34 ,5,$payable,1,1,'R');

//summary
$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Ohne Steuer',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,$payable,1,1,'R');

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Steuer',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,$taxable,1,1,'R');

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Steuer Rate',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,'15.825%',1,1,'R');

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Total',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,$total_due,1,1,'R');

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