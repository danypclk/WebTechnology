<?php
	$name = $_POST['username_register'];
	$pass = $_POST['password_register'];
	$email = $_POST['email_register'];
	$jobtitle = $_POST['business_function'];
	
	if(file_exists("testfile.txt"))
	{
			$myfile = fopen("testfile.txt", "a");
			fwrite($myfile, $name . ":");
			fwrite($myfile, $pass . ":");
			fwrite($myfile, $email . ":");
			fwrite($myfile, $jobtitle . "\n");
			fclose($myfile);
			echo "<script>window.location.assign('admin-registry.html')</script>";
	}
	else
	{
		$myfile = fopen("testfile.txt", "w");
		fwrite($myfile, $name . ":");
		fwrite($myfile, $pass . ":");
		fwrite($myfile, $email . ":");
		fwrite($myfile, $jobtitle . "\n");
		fclose($myfile);
		echo "<script>window.location.assign('admin-registry.html')</script>";
	}
?>