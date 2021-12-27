<?php

// delete all pdfs

$dir = scandir("Data/Rechnung/");

foreach ($dir as $file_pointer) // copy files to storage
{
	if($file_pointer != ".")
	{
		if($file_pointer != "..")
		{
			$new_pdf = "Data/Rechnung/" . $file_pointer;
			$new_location = "Data/Storage/Storage_for_pdfs_invoices/" . $file_pointer;
			copy($new_pdf, $new_location);
		}
	}
}

$dir_2 = scandir("Data/Rechnung/");

foreach ($dir_2 as $file_pointer) // delete files in old directory
{	
	if($file_pointer != ".")
	{
		if($file_pointer != "..")
		{
			unlink("Data/Rechnung/" . $file_pointer);
		}
	}
}

// delete client pdf selectors and reset partner and employee selectros

$dir = scandir("Data/Selector/");
foreach ($dir as $file_pointer) 
{	
	if($file_pointer != ".")
	{
		if($file_pointer != "..")
		{
			unlink("Data/Selector/" . $file_pointer);
		}
	}
}

// reset invoice list

$myfile = fopen("Data/Invoices/invoices.txt", "w");
fclose($myfile);

// reset all accounts to null

$file = "register-folder/partner-file.txt";
$file_1 = "register-folder/employee-file.txt";
$file_2 = "register-folder/intern-file.txt";
$file_3 = "register-folder/client-file.txt";

$myfile = fopen($file, "w");
fclose($myfile);

$myfile = fopen($file_1, "w");
fclose($myfile);

$myfile = fopen($file_2, "w");
fclose($myfile);

$myfile = fopen($file_3, "w");
fclose($myfile);

$myfile = fopen("iframe-folder/register_list.html", "w");
fwrite($myfile,"<h2>Keine Konten in der Registrierung</h2>");
fclose($myfile);

$date = date("d_m_Y_H_i_s");
$id_username = $_POST['id_of_admin_delete'];
echo $id_username;
$reset = "reset";
$new_name = trim($reset . "_vom_" . $date . "_reseted_by_" . $id_username);

require('fpdf/fpdf.php');

$pdf_file = 'Data/Storage/Storage_for_iframes/' . $new_name . '.pdf';
$pdf = new FPDF();
$pdf -> AddPage();


$pdf->SetFont('Arial','B',14);
$pdf->Cell(130 ,5,'Narichten',0,1);
$pdf->Cell(130 ,10,'',0,1);

// transmitting all contact data to pdf

		if(file_exists("Data/Contact_Us/contact.txt") && trim(file_get_contents("Data/Contact_Us/contact.txt")) == true)
		{
			$myfile = fopen("Data/Contact_Us/contact.txt", "r");
			while($row = fgets($myfile)) 
			{
				list( $Date, $name, $email, $message) = explode( ":", $row );
				$pdf->SetFont('Arial','',12);
				$pdf->Cell(130 ,5,"Datum: " . $Date,0,1);
				$pdf->Cell(130 ,5,"Name: " . $name,0,1);
				$pdf->Cell(130 ,5,"E-mail: " . $email,0,1);
				$pdf->Cell(130 ,2,'',0,1);
				$pdf->MultiCell(130 ,5,"Naricht: " . $message,0,1);
				$pdf->Cell(130 ,5,'',0,1);
			}
			$pdf->Cell(130 ,10,'',0,1);
			fclose($myfile);
		}
		else
		{
			$pdf->SetFont('Arial','',12);
			$pdf->Cell(130 ,5,'keine Narichten',0,1);
			$pdf->Cell(130 ,10,'',0,1);
		}
		
// 	transmitting all feedback data to pdf

$pdf->SetFont('Arial','B',14);
$pdf->Cell(130 ,5,'Feedback',0,1);
$pdf->Cell(130 ,10,'',0,1);

		if(file_exists("Data/Feedback/feedback.txt") && trim(file_get_contents("Data/Feedback/feedback.txt")) == true)
		{
			$myfile = fopen("Data/Feedback/feedback.txt", "r");
			while($row = fgets($myfile)) 
			{
				list( $Date, $kunde, $feedback, $feedback_zu, $Position) = explode( ":", $row );
				$pdf->SetFont('Arial','',12);
				$pdf->Cell(130 ,5,"Datum: " . $Date,0,1);
				$pdf->Cell(130 ,5,"Kunde: ",0,1);
				$pdf->Cell(130 ,5,"Feedback zu " . $Position . " " . $feedback_zu ,0,1);
				$pdf->Cell(130 ,2,'',0,1);
				$pdf->MultiCell(130 ,5,"Feedback: " . $feedback,0,1);
				$pdf->Cell(130 ,5,'',0,1);
			}
			$pdf->Cell(130 ,10,'',0,1);
			fclose($myfile);
		}
		else
		{
			$pdf->SetFont('Arial','',12);
			$pdf->Cell(130 ,5,'kein Feedback',0,1);
			$pdf->Cell(130 ,10,'',0,1);
		}
		
// 	transmitting all working order data to pdf


$pdf->SetFont('Arial','B',14);
$pdf->Cell(130 ,5,'Arbeitsauftrag',0,1);
$pdf->Cell(130 ,10,'',0,1);

		if(file_exists("Data/Work_orders/work_order.txt") && trim(file_get_contents("Data/Work_orders/work_order.txt")) == true)
		{
			$myfile = fopen("Data/Work_orders/work_order.txt", "r");
			while($row = fgets($myfile)) 
			{
				list( $kunde, $email, $date, $task, $address, $request, $arbeiter) = explode( ":", $row );
				$pdf->SetFont('Arial','',12);
				$pdf->Cell(130 ,5,"Arbeiter: " . $arbeiter,0,1);
				$pdf->Cell(130 ,5,"Datum: " . $date,0,1);
				$pdf->Cell(130 ,5,"Kunde: " . $kunde,0,1);
				$pdf->Cell(130 ,5,"Email " . $email,0,1);
				$pdf->Cell(130 ,5,"Aufgabe: " . $task,0,1);
				$pdf->Cell(130 ,5,"Adresse: " . $address,0,1);
				$pdf->Cell(130 ,2,'',0,1);
				$pdf->MultiCell(130 ,5,"Wunsch:" . $request,0,1);
				$pdf->Cell(130 ,5,'',0,1);
			}
			$pdf->Cell(130 ,10,'',0,1);
			fclose($myfile);
		}
		else
		{
			$pdf->SetFont('Arial','',12);
			$pdf->Cell(130 ,5,'keine Arbeitsauftraege',0,1);
			$pdf->Cell(130 ,10,'',0,1);
		}


$pdf -> Output($pdf_file, 'F');

// reset all files in question

$myfile = fopen("Data/Contact_Us/contact.txt", "w");
fclose($myfile);

$myfile = fopen("Data/Feedback/feedback.txt", "w");
fclose($myfile);

$myfile = fopen("Data/Work_orders/work_order.txt", "w");
fclose($myfile);


$myfile = fopen("iframe-folder/contact_us_list.html", "w");
fwrite($myfile,"<h2>Keine Nachrichten</h2>");
fclose($myfile);

$myfile = fopen("iframe-folder/feedback.html", "w");
fwrite($myfile,"<h2>Kein Feedback</h2>");
fclose($myfile);

$myfile = fopen("iframe-folder/feedback_worker.html", "w");
fwrite($myfile,"<h2>Kein Feedback</h2>");
fclose($myfile);

$myfile = fopen("iframe-folder/worker_list.html", "w");
fwrite($myfile,"<h2>Keine Arbeitsaufträge</h2>");
fclose($myfile);

//echo "<script>alert('Daten gespeiechert und rekonfiguriert!')</script>";
//echo "<script>window.location.assign('admin-page.html')</script>";

?>