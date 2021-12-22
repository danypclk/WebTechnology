<?php

$file = "register-folder/partner-file.txt";
$file_1 = "register-folder/employee-file.txt";
$file_2 = "register-folder/intern-file.txt";
$file_3 = "register-folder/client-file.txt";

if(file_exists($file))
{
	$fn = fopen("register-folder/partner-file.txt","r");
}
else
{
	$fn = fopen("register-folder/partner-file.txt", "w");
}

if(file_exists($file_1))
{
	$fn1 = fopen("register-folder/employee-file.txt","r");
}
else
{
	$fn1 = fopen("register-folder/employee-file.txt", "w");
}

if(file_exists($file_2))
{
	$fn2 = fopen("register-folder/intern-file.txt","r");
}
else
{
	$fn2 = fopen("register-folder/intern-file.txt", "w");
}

if(file_exists($file_3))
{
	$fn3 = fopen("register-folder/client-file.txt","r");
}
else
{
	$fn3 = fopen("register-folder/client-file.txt", "w");
}


$array = array($file ,$file_1, $file_2, $file_3);
$empty = true;

foreach($array as $v)
{
	if(trim(file_get_contents($v)) != false)
	{
		$empty = false;
	}
}	

if($empty == false)
{
	$register_file_name = "iframe-folder/register_list.html";

	$register_list = fopen($register_file_name, "w");
	fwrite($register_list,"<h2>Partner</h2>");
	while($row = fgets($fn)) {
		list( $Name, $Pass, $Email, $Position ) = explode( ":", $row );
		fwrite($register_list,"<p>Name: ". $Name . ", Passwort: " . $Pass . ", Email: " . $Email . ", Position: " . $Position . "</p>");
	}
	fclose($fn);
	fwrite($register_list,"<h2>Arbeiter</h2>");
	while($row = fgets($fn1)) {
		list( $Name, $Pass, $Email, $Position ) = explode( ":", $row );
		fwrite($register_list,"<p>Name: ". $Name . ", Passwort: " . $Pass . ", Email: " . $Email . ", Position: " . $Position . "</p>");
	}
	fclose($fn1);
	fwrite($register_list,"<h2>Praktikanten</h2>");
	while($row = fgets($fn2)) {
		list( $Name, $Pass, $Email, $Position ) = explode( ":", $row );
		fwrite($register_list,"<p>Name: ". $Name . ", Passwort: " . $Pass . ", Email: " . $Email . ", Position: " . $Position . "</p>");
	}
	fclose($fn2);
	fwrite($register_list,"<h2>Kunden</h2>");
	while($row = fgets($fn3)) {
		list( $Name, $Pass, $Email, $Position ) = explode( ":", $row );
		fwrite($register_list,"<p>Name: ". $Name . ", Passwort: " . $Pass . ", Email: " . $Email . ", Position: " . $Position . "</p>");
	}
	fclose($fn3);
}
else
{
	$register_file_name = "iframe-folder/register_list.html";
	
	$register_list = fopen($register_file_name, "w");
	fwrite($register_list,"<h2>Keine Konten in der Registrierung</h2>");	
}

fclose($register_list);

header('Location: admin-page.html');

echo "<script>window.location.assign('admin-page.html')</script>";
?>