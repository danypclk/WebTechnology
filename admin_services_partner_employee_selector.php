<?php
$partner_employee_selector = "Data/Selector/partner_employee_selector.html";

$partners = [];
$employees = [];

$file_partner = "register-folder/partner-file.txt";
$file_employee = "register-folder/employee-file.txt";
$file_partner_open = fopen($file_partner, "r");
$file_employee_open = fopen($file_employee, "r");
while($row = fgets($file_partner_open))
{
	list($Name, $Vorname, $Realname, $Pass, $Email, $Position ) = explode( ":", $row );
	array_push($partners, $Name);
}
fclose($file_partner_open);

while($row = fgets($file_employee_open))
{
	list($Name, $Vorname, $Realname, $Pass, $Email, $Position ) = explode( ":", $row );
	array_push($employees, $Name);
}
fclose($file_employee_open);

$file = fopen($partner_employee_selector, "w");
fwrite($file, "\n<option value=\"disabled\">--Partner--</option>");
foreach($partners as $partner)
{
	fwrite($file, "\n<option value=\"" . $partner . "\">" . $partner . "</option>");
}
fclose($file);
$file = fopen($partner_employee_selector, "a");
fwrite($file, "\n<option value=\"disabled\">--Arbeiter--</option>");
foreach($employees as $employee)
{
	fwrite($file, "\n<option value=\"" . $employee . "\">" . $employee . "</option>");
}
fclose($file);


$employee_selector = "Data/Selector/employee_selector.html";

$file = fopen($employee_selector, "w");
fwrite($file, "\n<option id=\"disabled\" value=\"disabled\">Arbeiter</option>");
foreach($employees as $employee)
{
	fwrite($file, "\n<option value=\"" . $employee . "\">" . $employee . "</option>");
}

fclose($file);

echo "<script>window.location.assign('reads_and_explodes_admin.php')</script>";

?>