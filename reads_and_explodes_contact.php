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
	fwrite($contact_us_file,"<h2>Kunden Narichten</h2>");
	while($row = fgets($file_contact_us)) {
		list( $Date ,$Name, $Email, $Message ) = explode( ":", $row );
		fwrite($contact_us_file,"<p>Datum: " . $Date . "</p>");
		fwrite($contact_us_file,"<p>Kunde: " . $Name . "</p>");
		fwrite($contact_us_file,"<p>Email: " . $Email . "</p>");
		fwrite($contact_us_file,"<p>Naricht: " . $Message . "</p>");
		fwrite($contact_us_file,"<hr />");
		fwrite($contact_us_file,"<br />");
	}
	fclose($contact_us_file);
	fclose($file_contact_us);

echo "<script>window.location.assign('contact-us.html')</script>";
?>