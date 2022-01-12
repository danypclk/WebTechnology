<?php
	$name = $_POST['username_register'];
	$real_name = $_POST['name_register'];
	$vorname = $_POST['vorname_register'];
	$pass = $_POST['password_register'];
	$email = $_POST['email_register'];
	$jobtitle = $_POST['business_function'];
	
	
	$file_partner = "register-folder/partner-file.txt";
	$file_employee = "register-folder/employee-file.txt";
	$file_client = "register-folder/client-file.txt";
	
// create arrays of all acounts to find duplicates
	
		$see_duplicate = fopen($file_partner, "r");
	
	
		$see_duplicate_1 = fopen($file_employee, "r");
	
	
		$see_duplicate_2 = fopen($file_client, "r");
	
	
	$array = array($see_duplicate ,$see_duplicate_1, $see_duplicate_2, $see_duplicate_2);
	
// see if login is the master key name is the duplicate
	
if($name == "admin")
{
	echo "<script>alert('Name existiert schon, setzen sie einen anderen.')</script>";
	echo "<script>window.location.assign('admin-page.html')</script>";
}
else
{
	// see if duplicate exists in the registry-folder directory

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
				echo "<script>alert('Name existiert schon, setzen sie einen anderen.')</script>";
				echo "<script>window.location.assign('admin-page.html')</script>";
			}
		}
	}
	
	// if there are no duplicates, if statements searches for which position the new login account belongs
	// and registers it in the right file of the register-folder directory and then sends server
	// to selector files so administrators can see new account in the register-list i-frames
	
	if($jobtitle == "partner")
	{
		if(file_exists($file_partner))
		{
			$myfile = fopen($file_partner, "a");
			fwrite($myfile, $name . ":");
			fwrite($myfile, $vorname . ":");
			fwrite($myfile, $real_name . ":");
			fwrite($myfile, $pass . ":");
			fwrite($myfile, $email . ":");
			fwrite($myfile, "partner" . "\n");
			fclose($myfile);
			echo "<script>alert('Neuen Benutzer erfolgreich hinzugefügt!')</script>";
			echo "<script>window.location.assign('admin_services_partner_employee_selector.php')</script>";
		}
		else
		{
			$myfile = fopen($file_partner, "w");
			fwrite($myfile, $name . ":");
			fwrite($myfile, $vorname . ":");
			fwrite($myfile, $real_name . ":");
			fwrite($myfile, $pass . ":");
			fwrite($myfile, $email . ":");
			fwrite($myfile, "partner");
			fwrite($myfile, "\n");
			fclose($myfile);
			echo "<script>alert('Neuen Benutzer erfolgreich hinzugefügt!')</script>";
			echo "<script>window.location.assign('admin_services_partner_employee_selector.php')</script>";
		}
	}
	else if($jobtitle == "employee")
	{
		if(file_exists($file_employee))
		{
			$myfile = fopen($file_employee, "a");
			fwrite($myfile, $name . ":");
			fwrite($myfile, $vorname . ":");
			fwrite($myfile, $real_name . ":");
			fwrite($myfile, $pass . ":");
			fwrite($myfile, $email . ":");
			fwrite($myfile, "employee");
			fwrite($myfile, "\n");
			fclose($myfile);
			echo "<script>alert('Neuen Benutzer erfolgreich hinzugefügt!')</script>";
			echo "<script>window.location.assign('admin_services_partner_employee_selector.php')</script>";
		}
		else
		{
			$myfile = fopen($file_employee, "w");
			fwrite($myfile, $name . ":");
			fwrite($myfile, $vorname . ":");
			fwrite($myfile, $real_name . ":");
			fwrite($myfile, $pass . ":");
			fwrite($myfile, $email . ":");
			fwrite($myfile, "employee");
			fwrite($myfile, "\n");
			fclose($myfile);
			echo "<script>alert('Neuen Benutzer erfolgreich hinzugefügt!')</script>";
			echo "<script>window.location.assign('admin_services_partner_employee_selector.php')</script>";
		}
	}
	else if($jobtitle == "client")
	{
		if(file_exists($file_client))
		{
			$myfile = fopen("register-folder/client-file.txt", "a");
			fwrite($myfile, $name . ":");
			fwrite($myfile, $vorname . ":");
			fwrite($myfile, $real_name . ":");
			fwrite($myfile, $pass . ":");
			fwrite($myfile, $email . ":");
			fwrite($myfile, "client");
			fwrite($myfile, "\n");
			fclose($myfile);
			echo "<script>alert('Neuen Benutzer erfolgreich hinzugefügt!')</script>";
			echo "<script>window.location.assign('reads_and_explodes_admin.php')</script>";
		}
		else
		{
			$myfile = fopen($file_client, "w");
			fwrite($myfile, $name . ":");
			fwrite($myfile, $vorname . ":");
			fwrite($myfile, $real_name . ":");
			fwrite($myfile, $pass . ":");
			fwrite($myfile, $email . ":");
			fwrite($myfile, "client");
			fwrite($myfile, "\n");
			fclose($myfile);
			echo "<script>alert('SNeuen Benutzer erfolgreich hinzugefügt!')</script>";
			echo "<script>window.location.assign('reads_and_explodes_admin.php')</script>";
		}
	}
}
?>