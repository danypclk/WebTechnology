<?php
	$name = $_POST['username_register'];
	$pass = $_POST['password_register'];
	$email = $_POST['email_register'];
	$jobtitle = $_POST['business_function'];
	
	
	$file_partner = "register-folder/partner-file.txt";
	$file_employee = "register-folder/employee-file.txt";
	$file_intern = "register-folder/intern-file.txt";
	$file_client = "register-folder/client-file.txt";
	
	
	if($jobtitle == "partner")
	{
		if(file_exists($file_partner))
		{
			$myfile = fopen($file_partner, "a");
			fwrite($myfile, $name . ":");
			fwrite($myfile, $pass . ":");
			fwrite($myfile, $email . ":");
			fwrite($myfile, "partner" . "\n");
			fclose($myfile);
			echo "<script>window.location.assign('reads_and_explodes_admin.php')</script>";
		}
		else
		{
			$myfile = fopen($file_partner, "w");
			fwrite($myfile, $name . ":");
			fwrite($myfile, $pass . ":");
			fwrite($myfile, $email . ":");
			fwrite($myfile, "partner" . "\n");
			fclose($myfile);
			echo "<script>window.location.assign('reads_and_explodes_admin.php')</script>";
		}
	}
	else if($jobtitle == "employee")
	{
		if(file_exists($file_employee))
		{
			$myfile = fopen($file_employee, "a");
			fwrite($myfile, $name . ":");
			fwrite($myfile, $pass . ":");
			fwrite($myfile, $email . ":");
			fwrite($myfile, "employee" . "\n");
			fclose($myfile);
			echo "<script>window.location.assign('reads_and_explodes_admin.php')</script>";
		}
		else
		{
			$myfile = fopen($file_employee, "w");
			fwrite($myfile, $name . ":");
			fwrite($myfile, $pass . ":");
			fwrite($myfile, $email . ":");
			fwrite($myfile, "employee" . "\n");
			fclose($myfile);
			echo "<script>window.location.assign('reads_and_explodes_admin.php')</script>";
		}
	}
	else if($jobtitle == "intern")
	{
		if(file_exists($file_intern))
		{
			$myfile = fopen($file_intern, "a");
			fwrite($myfile, $name . ":");
			fwrite($myfile, $pass . ":");
			fwrite($myfile, $email . ":");
			fwrite($myfile, "intern" . "\n");
			fclose($myfile);
			echo "<script>window.location.assign('reads_and_explodes_admin.php')</script>";
		}
		else
		{
			$myfile = fopen($file_intern, "w");
			fwrite($myfile, $name . ":");
			fwrite($myfile, $pass . ":");
			fwrite($myfile, $email . ":");
			fwrite($myfile, "intern" . "\n");
			fclose($myfile);
			echo "<script>window.location.assign('reads_and_explodes_admin.php')</script>";
		}
	}
	else if($jobtitle == "client")
	{
		if(file_exists($file_client))
		{
			$myfile = fopen("register-folder/client-file.txt", "a");
			fwrite($myfile, $name . ":");
			fwrite($myfile, $pass . ":");
			fwrite($myfile, $email . ":");
			fwrite($myfile, "client" . "\n");
			fclose($myfile);
			echo "<script>window.location.assign('reads_and_explodes_admin.php')</script>";
		}
		else
		{
			$myfile = fopen($file_client, "w");
			fwrite($myfile, $name . ":");
			fwrite($myfile, $pass . ":");
			fwrite($myfile, $email . ":");
			fwrite($myfile, "client" . "\n");
			fclose($myfile);
			echo "<script>window.location.assign('reads_and_explodes_admin.php')</script>";
		}
	}
?>