<?php
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$file = "register-folder/client-file.txt";

$count = false;

// sees if iframe register-list exists

if(!file_exists("iframe-folder/register_list.html"))
{
	$register_list_iframe = fopen("iframe-folder/register_list.html", "w");
	fclose($register_list_iframe);
}

// if not tries to search it in the text files inside register-folder directory

if($username == "admin")
{
	$count = true;
}
else
{
	$file_2 = fopen("register-folder/client-file.txt", "r");
	while(($row = fgets($file_2)) !== false) 
	{
		list( $Name, $Pass, $Email, $Position ) = explode( ":", $row );
		if($username == $Name)
		{
			$count = true;
		}
	}
	fclose($file_2);
}

if($count == true)
{
	echo "<script>alert('Username gibt es schon!')</script>";
	echo "<script>window.location.assign('register-kunde.html')</script>";
}
else
{
	$Name = $username;
	$Pass = $password;
	$Position = "client";
	$Email = $email;
		
	$myfile = fopen($file, "a");
	fwrite($myfile, $Name . ":");
	fwrite($myfile, $Pass . ":");
	fwrite($myfile, $Email . ":");
	fwrite($myfile, $Position);
	fwrite($myfile, "\n");
	fclose($myfile);
	
	$file_1 = "iframe-folder/register_list.html";

	if(file_exists($file_1))
	{
		$fn = fopen("iframe-folder/register_list.html", "w");
		fwrite($fn,"<h2>Administrator</h2>");
		fwrite($fn,"<h2>Arbeiter</h2>");
		fwrite($fn,"<p>Name: ". $Name . ", Passwort: " . $Pass . ", Email: " . $Email . ", Position: " . $Position . "</p>");
	}	
	else
	{
		$fn = fopen("iframe-folder/register_list.html","a");
		fwrite($fn,"<p>Name: ". $Name . ", Passwort: " . $Pass . ", Email: " . $Email . ", Position: " . $Position . "</p>");
	}
	fclose($fn);
	echo "<script>alert('Erfolgreich registriert')</script>";
	echo "<script>window.location.assign('register-kunde.html')</script>";
}
?>