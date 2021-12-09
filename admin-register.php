<?php
	$name = $_POST['username_register'];
	$pass = $_POST['password_register'];
	$email = $_POST['email_register'];
	$jobtitle = $_POST['business_function'];
	
	if($jobtitle == "partner")
	{
		if(file_exists("admin-file.txt"))
		{
			$myfile = fopen("admin-file.txt", "a");
			fwrite($myfile, $name . ":");
			fwrite($myfile, $pass . ":");
			fwrite($myfile, $email . ":");
			fwrite($myfile, "partner" . "\n");
			fclose($myfile);
			echo "<script>window.location.assign('admin-page.html')</script>";
		}
		else
		{
			$myfile = fopen("admin-file.txt", "w");
			fwrite($myfile, $name . ":");
			fwrite($myfile, $pass . ":");
			fwrite($myfile, $email . ":");
			fwrite($myfile, "partner" . "\n");
			fclose($myfile);
			echo "<script>window.location.assign('admin-page.html')</script>";
		}
	}
	else if($jobtitle == "employee")
	{
		if(file_exists("employee-file.txt"))
		{
			$myfile = fopen("employee-file.txt", "a");
			fwrite($myfile, $name . ":");
			fwrite($myfile, $pass . ":");
			fwrite($myfile, $email . ":");
			fwrite($myfile, "employee" . "\n");
			fclose($myfile);
			echo "<script>window.location.assign('admin-page.html')</script>";
		}
		else
		{
			$myfile = fopen("employee-file.txt", "w");
			fwrite($myfile, $name . ":");
			fwrite($myfile, $pass . ":");
			fwrite($myfile, $email . ":");
			fwrite($myfile, "employee" . "\n");
			fclose($myfile);
			echo "<script>window.location.assign('admin-page.html')</script>";
		}
	}
	else if($jobtitle == "intern")
	{
		if(file_exists("intern-file.txt"))
		{
			$myfile = fopen("intern-file.txt", "a");
			fwrite($myfile, $name . ":");
			fwrite($myfile, $pass . ":");
			fwrite($myfile, $email . ":");
			fwrite($myfile, "intern" . "\n");
			fclose($myfile);
			echo "<script>window.location.assign('admin-page.html')</script>";
		}
		else
		{
			$myfile = fopen("intern-file.txt", "w");
			fwrite($myfile, $name . ":");
			fwrite($myfile, $pass . ":");
			fwrite($myfile, $email . ":");
			fwrite($myfile, "intern" . "\n");
			fclose($myfile);
			echo "<script>window.location.assign('admin-page.html')</script>";
		}
	}
	else if($jobtitle == "client")
	{
		if(file_exists("client-file.txt"))
		{
			$myfile = fopen("client-file.txt", "a");
			fwrite($myfile, $name . ":");
			fwrite($myfile, $pass . ":");
			fwrite($myfile, $email . ":");
			fwrite($myfile, "client" . "\n");
			fclose($myfile);
			echo "<script>window.location.assign('admin-page.html')</script>";
		}
		else
		{
			$myfile = fopen("client-file.txt", "w");
			fwrite($myfile, $name . ":");
			fwrite($myfile, $pass . ":");
			fwrite($myfile, $email . ":");
			fwrite($myfile, "client" . "\n");
			fclose($myfile);
			echo "<script>window.location.assign('admin-page.html')</script>";
		}
	}
?>