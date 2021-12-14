<?php
	$name = $_POST['username_register'];
	$pass = $_POST['password_register'];
	$email = $_POST['email_register'];
	$jobtitle = $_POST['business_function'];
	
	
	$file_partner = "register-folder/partner-file.txt";
	$file_employee = "register-folder/employee-file.txt";
	$file_intern = "register-folder/intern-file.txt";
	$file_client = "register-folder/client-file.txt";
	
	
		$see_duplicate = fopen($file_partner, "r");
	
	
		$see_duplicate_1 = fopen($file_employee, "r");
	
	
	
		$see_duplicate_2 = fopen($file_intern, "r");
	
	
	
		$see_duplicate_3 = fopen($file_client, "r");
	
	
	$array = array($see_duplicate ,$see_duplicate_1, $see_duplicate_2, $see_duplicate_3);
	
if($name == "admin")
{
	echo "<script>alert('Name existiert schon, setzen sie einen anderen.')</script>";
	echo "<script>window.location.assign('admin-page.html')</script>";
}

foreach($array as $v)
{
	while($row = fgets($v)) 
	{
		list( $Name, $Pass, $Email, $Position ) = explode( ":", $row );
		if($name == $Name)
		{
			fclose($see_duplicate);
			fclose($see_duplicate_1);
			fclose($see_duplicate_2);
			fclose($see_duplicate_3);
			echo "<script>alert('Name existiert schon, setzen sie einen anderen.')</script>";
			echo "<script>window.location.assign('admin-page.html')</script>";
		}
	}
}
	
	
	
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
			echo "<script>alert('Successfully added a new user!')</script>";
			echo "<script>window.location.assign('admin_services_partner_selector.php')</script>";
		}
		else
		{
			$myfile = fopen($file_partner, "w");
			fwrite($myfile, $name . ":");
			fwrite($myfile, $pass . ":");
			fwrite($myfile, $email . ":");
			fwrite($myfile, "partner");
			fwrite($myfile, "\n");
			fclose($myfile);
			echo "<script>alert('Successfully added a new user!')</script>";
			echo "<script>window.location.assign('admin_services_partner_selector.php')</script>";
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
			fwrite($myfile, "employee");
			fwrite($myfile, "\n");
			fclose($myfile);
			echo "<script>alert('Successfully added a new user!')</script>";
			echo "<script>window.location.assign('admin_services_employee_selector.php')</script>";
		}
		else
		{
			$myfile = fopen($file_employee, "w");
			fwrite($myfile, $name . ":");
			fwrite($myfile, $pass . ":");
			fwrite($myfile, $email . ":");
			fwrite($myfile, "employee");
			fwrite($myfile, "\n");
			fclose($myfile);
			echo "<script>alert('Successfully added a new user!')</script>";
			echo "<script>window.location.assign('admin_services_employee_selector.php')</script>";
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
			fwrite($myfile, "intern");
			fwrite($myfile, "\n");
			fclose($myfile);
			echo "<script>alert('Successfully added a new user!')</script>";
			echo "<script>window.location.assign('reads_and_explodes_admin.php')</script>";
		}
		else
		{
			$myfile = fopen($file_intern, "w");
			fwrite($myfile, $name . ":");
			fwrite($myfile, $pass . ":");
			fwrite($myfile, $email . ":");
			fwrite($myfile, "intern");
			fwrite($myfile, "\n");
			fclose($myfile);
			echo "<script>alert('Successfully added a new user!')</script>";
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
			fwrite($myfile, "client");
			fwrite($myfile, "\n");
			fclose($myfile);
			echo "<script>alert('Successfully added a new user!')</script>";
			echo "<script>window.location.assign('reads_and_explodes_admin.php')</script>";
		}
		else
		{
			$myfile = fopen($file_client, "w");
			fwrite($myfile, $name . ":");
			fwrite($myfile, $pass . ":");
			fwrite($myfile, $email . ":");
			fwrite($myfile, "client");
			fwrite($myfile, "\n");
			fclose($myfile);
			echo "<script>alert('Successfully added a new user!')</script>";
			echo "<script>window.location.assign('reads_and_explodes_admin.php')</script>";
		}
	}
?>