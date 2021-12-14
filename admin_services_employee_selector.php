<?php

$employee_selector = "Data/Selector/employee_selector.html";


$employees = [];


$file_employee = "register-folder/employee-file.txt";
$file_employee_open = fopen($file_employee, "r");
while($row = fgets($file_employee_open))
{
	list($Name, $Pass, $Email ) = explode( ":", $row );
	array_push($employees, $Name);
}

fclose($file_employee_open);


$file = fopen($employee_selector, "w");
foreach($employees as $employee)
{
	fwrite($file, "\n<option value=\"" . $employee . "\">" . $employee . "</option>");
}

fclose($file);


echo "<script>window.location.assign('reads_and_explodes_admin.php')</script>";

?>