<?php

$date = date("d_m_Y_H_i_s");
$id_username = $_POST['id_of_admin'];

$reset = "reset";
$new_name = trim($reset . "_vom_" . $date . "_reseted_by_" . $id_username);

require('fpdf/fpdf.php');

$pdf_file = 'Data/Storage/' . $new_name . '.pdf';
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


// download all files that have been reseted

$file_name =  $new_name . ".pdf";
$file_url = "Data/Storage/" . $file_name;
header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary"); 
header("Content-disposition: attachment; filename=\"".$file_name."\""); 
readfile($file_url);
exit;

?>