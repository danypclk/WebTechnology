<?php
$file_contact_us = "Data/Contact_Us/contact.txt";


if(file_exists($file_contact_us))
{
	$file_contact_us = fopen("Data/Contact_Us/contact.txt","r");
}
else
{
	$file_contact_us = fopen("Data/Contact_Us/contact.txt", "w");
}

$contact_us_html_file = "iframe-folder/contact_us_list.html";

	$contact_us_file = fopen($contact_us_html_file, "w");
	fwrite($contact_us_file,"<h2>Clients Messages</h2>");
	while($row = fgets($file_contact_us)) {
		list( $Date ,$Name, $Email, $Message ) = explode( ":", $row );
		fwrite($contact_us_file,"<p>Date: " . $Date . "</p>");
		fwrite($contact_us_file,"<p>Client: " . $Name . "</p>");
		fwrite($contact_us_file,"<p>Email: " . $Email . "</p>");
		fwrite($contact_us_file,"<p>Message: " . $Message . "</p>");
		fwrite($contact_us_file,"<br />");
	}
	fclose($file_contact_us);

echo "<script>window.location.assign('contact-us.html')</script>";
?>