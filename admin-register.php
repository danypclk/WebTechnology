<?php
	$name = $_POST['username_register'];
	$pass = $_POST['password_register'];
	$email = $_POST['email_register'];
	$jobtitle = $_POST['business_function'];
	
	if($jobtitle == "partner")
	{
		if(file_exists("register-folder/partner-file.txt"))
		{
			$myfile = fopen("register-folder/partner-file.txt", "a");
			fwrite($myfile, $name . ":");
			fwrite($myfile, $pass . ":");
			fwrite($myfile, $email . ":");
			fwrite($myfile, "partner" . "\n");
			fclose($myfile);
			echo "<script>window.location.assign('reads_and_explodes.php')</script>";
		}
		else
		{
			$myfile = fopen("register-folder/", "w");
			fwrite($myfile, $name . ":");
			fwrite($myfile, $pass . ":");
			fwrite($myfile, $email . ":");
			fwrite($myfile, "partner" . "\n");
			fclose($myfile);
			echo "<script>window.location.assign('reads_and_explodes.php')</script>";
		}
	}
	else if($jobtitle == "employee")
	{
		if(file_exists("register-folder/employee-file.txt"))
		{
			$myfile = fopen("register-folder/employee-file.txt", "a");
			fwrite($myfile, $name . ":");
			fwrite($myfile, $pass . ":");
			fwrite($myfile, $email . ":");
			fwrite($myfile, "employee" . "\n");
			fclose($myfile);
			echo "<script>window.location.assign('reads_and_explodes.php')</script>";
		}
		else
		{
			$myfile = fopen("register-folder/employee-file.txt", "w");
			fwrite($myfile, $name . ":");
			fwrite($myfile, $pass . ":");
			fwrite($myfile, $email . ":");
			fwrite($myfile, "employee" . "\n");
			fclose($myfile);
			echo "<script>window.location.assign('reads_and_explodes.php')</script>";
		}
	}
	else if($jobtitle == "intern")
	{
		if(file_exists("register-folder/intern-file.txt"))
		{
			$myfile = fopen("register-folder/intern-file.txt", "a");
			fwrite($myfile, $name . ":");
			fwrite($myfile, $pass . ":");
			fwrite($myfile, $email . ":");
			fwrite($myfile, "intern" . "\n");
			fclose($myfile);
			echo "<script>window.location.assign('reads_and_explodes.php')</script>";
		}
		else
		{
			$myfile = fopen("register-folder/intern-file.txt", "w");
			fwrite($myfile, $name . ":");
			fwrite($myfile, $pass . ":");
			fwrite($myfile, $email . ":");
			fwrite($myfile, "intern" . "\n");
			fclose($myfile);
			echo "<script>window.location.assign('reads_and_explodes.php')</script>";
		}
	}
	else if($jobtitle == "client")
	{
		if(file_exists("register-folder/client-file.txt"))
		{
			$myfile = fopen("register-folder/client-file.txt", "a");
			fwrite($myfile, $name . ":");
			fwrite($myfile, $pass . ":");
			fwrite($myfile, $email . ":");
			fwrite($myfile, "client" . "\n");
			fclose($myfile);
			echo "<script>window.location.assign('reads_and_explodes.php')</script>";
		}
		else
		{
			$myfile = fopen("register-folder/client-file.txt", "w");
			fwrite($myfile, $name . ":");
			fwrite($myfile, $pass . ":");
			fwrite($myfile, $email . ":");
			fwrite($myfile, "client" . "\n");
			fclose($myfile);
			echo "<script>window.location.assign('reads_and_explodes.php')</script>";
		}
	}
?>