<?php

$partner_selector = "Data/Selector/partner_selector.html";


$partners = [];


$file_partner = "register-folder/partner-file.txt";
$file_partner_open = fopen($file_partner, "r");
while($row = fgets($file_partner_open))
{
	list($Name, $Pass, $Email ) = explode( ":", $row );
	array_push($partners, $Name);
}

fclose($file_partner_open);


$file = fopen($partner_selector, "w");
fwrite($file, "\n<option value=\"disabled\">Partners</option>");
foreach($partners as $partner)
{
	fwrite($file, "\n<option value=\"" . $partner . "\">" . $partner . "</option>");
}

fclose($file);

echo "<script>window.location.assign('reads_and_explodes_admin.php')</script>";


?>