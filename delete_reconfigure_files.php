<?php

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

echo "<script>window.location.assign('reset_files.php')</script>";

?>