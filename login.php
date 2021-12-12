<?php
$username = $_POST['username'];
$password = $_POST['password'];

$file = "register-folder/partner-file.txt";
$file_1 = "register-folder/employee-file.txt";
$file_2 = "register-folder/intern-file.txt";
$file_3 = "register-folder/client-file.txt";

if(!file_exists("Data/Contact_Us/contact.txt"))
{
	$contact_us_text_file = fopen("Data/Contact_Us/contact.txt", "w");
	fclose($contact_us_text_file);
}
if(!file_exists("iframe-folder/contact_us_list.html"))
{
	$contact_us_iframe = fopen("iframe-folder/contact_us_list.html", "w");
	fclose($contact_us_iframe);
}
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

if($username == 'admin')
{
	if($password == 'loGGin')
	{
		echo "<script>alert('Erfolgreich eingeloggt')</script>";
		echo "<script>window.location.assign('admin-page.html')</script>";
	}
}

else
{
		
	while($row = fgets($fn)) {
		list( $Name, $Pass, $Email, $Position ) = explode( ":", $row );
		if($username == $Name)
		{
			if($password == $Pass)
			{
				echo "<script>alert('Erfolgreich eingeloggt')</script>";
				echo "<script>window.location.assign('admin-page.html')</script>";
			}
		}
	}
	fclose($fn);

	while($row = fgets($fn1)) {
		list( $Name, $Pass, $Email, $Position ) = explode( ":", $row );
		if($username == $Name)
		{
			if($password == $Pass)
			{
				echo "<script>alert('Erfolgreich eingeloggt')</script>";
				echo "<script>window.location.assign('employee-page.html')</script>";
			}
		}
	}
	fclose($fn1);

	while($row = fgets($fn2)) {
		list( $Name, $Pass, $Email, $Position ) = explode( ":", $row );
		if($username == $Name)
		{
			if($password == $Pass)
			{
				echo "<script>alert('Erfolgreich eingeloggt')</script>";
				echo "<script>window.location.assign('admin-page.html')</script>";
			}
		}
	}
	fclose($fn2);

	while($row = fgets($fn3)) {
		list( $Name, $Pass, $Email, $Position ) = explode( ":", $row );
		if($username == $Name)
		{
			if($password == $Pass)
			{
				echo "<script>alert('Erfolgreich eingeloggt')</script>";
				echo "<script>window.location.assign('admin-page.html')</script>";
			}
		}	
	}
	fclose($fn3);
	
	echo "<script>alert('Falscher Username oder Passwort')</script>";
	echo "<script>window.location.assign('login.html')</script>";
}
	
?>