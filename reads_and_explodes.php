<?php

$fn = fopen("partner-file.txt","r") or die("fail to open file");
$fn1 = fopen("employee-file.txt","r") or die("fail to open file");
$fn2 = fopen("intern-file.txt","r") or die("fail to open file");
$fn3 = fopen("clients-file.txt","r") or die("fail to open file");

$register_file_name = "register_list.html";

if (file_exists($register_file_name)) {
	$register_list = fopen($register_file_name, "w");
	fwrite($register_list,"<h2>Partners</h2>");
	while($row = fgets($fn)) {
		list( $Name, $Pass, $Email, $Position ) = explode( ":", $row );
		fwrite($register_list,"<p>Name: ". $Name . ", Password: " . $Pass . ", Email: " . $Email . ", Position: " . $Position . "</p>");
	}
	fwrite($register_list,"<h2>Employees</h2>");
	while($row = fgets($fn1)) {
		list( $Name, $Pass, $Email, $Position ) = explode( ":", $row );
		fwrite($register_list,"<p>Name: ". $Name . ", Password: " . $Pass . ", Email: " . $Email . ", Position: " . $Position . "</p>");
	}
	fwrite($register_list,"<h2>Interns</h2>");
	while($row = fgets($fn2)) {
		list( $Name, $Pass, $Email, $Position ) = explode( ":", $row );
		fwrite($register_list,"<p>Name: ". $Name . ", Password: " . $Pass . ", Email: " . $Email . ", Position: " . $Position . "</p>");
	}
	fwrite($register_list,"<h2>Clients</h2>");
	while($row = fgets($fn3)) {
		list( $Name, $Pass, $Email, $Position ) = explode( ":", $row );
		fwrite($register_list,"<p>Name: ". $Name . ", Password: " . $Pass . ", Email: " . $Email . ", Position: " . $Position . "</p>");
	}
	fclose( $fn );
}

echo "<script>window.location.assign('admin-page.html')</script>";
?>