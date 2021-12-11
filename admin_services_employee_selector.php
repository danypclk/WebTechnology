<?php

$employee_selector = "Data/Work_orders/employee_selector.html";


$employee = "";


$file = "register-folder/employee-file.txt";
$data = file($file);
$line = $data[count($data)-1];
list($Name, $Pass, $Email ) = explode( ":", $line );
$employee = $Name;


$file = fopen($employee_selector, "a");
fwrite($file, "\n<option value=\"" . $employee . "\">" . $employee . "</option>");
fclose($file);

echo "<script>window.location.assign('admin-page.html')</script>";

?>