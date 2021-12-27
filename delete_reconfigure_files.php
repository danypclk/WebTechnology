<?php

// reset all iframes and respective text files

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

// delete all pdfs

$dir = scandir("Data/Rechnung/");
foreach ($dir as $file_pointer) 
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


echo "<script>alert('Alles gelöscht und umkonfiguriert!')</script>";
echo "<script>window.location.assign('admin-page.html')</script>";

?>