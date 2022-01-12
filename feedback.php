<?php

$name = $_POST['name_of_client'];
$feedback =$_POST['client_feedback_message'];
$busniess_assosiation_name = $_POST['business_list'];
$position = "position";
$admin_id = "";

$file_partner = "register-folder/partner-file.txt";
$file_employee = "register-folder/employee-file.txt";
$file_partner_open = fopen($file_partner, "r");
$file_employee_open = fopen($file_employee, "r");
while($row = fgets($file_partner_open))
{
	list( $Name_admin, $Vorname_admin, $Realname_admin, $Pass_admin, $Email_admin, $Position_admin ) = explode( ":", $row );
	if(strpos($busniess_assosiation_name, ' ') == true)
	{
		list( $Vorname_find, $Realname_find ) = explode( " ", $busniess_assosiation_name);
		if($Vorname_find == $Vorname_admin && $Realname_find == $Realname_admin)
		{
			$$busniess_assosiation_name = $Name_admin;
			$position = "Partner";
			break;
		}
	}
}

while($row = fgets($file_employee_open))
{
	list( $Name_worker, $Vorname_worker, $Realname_worker, $Pass_worker, $Email_worker, $Position_worker ) = explode( ":", $row );
	if($Name == $busniess_assosiation_name)
	{
		$position = "Arbeiter";
		break;
	}	
}



$date = date("Y.m.d");

		if(file_exists("Data/Feedback/feedback.txt"))
		{
			$myfile = fopen("Data/Feedback/feedback.txt", "a");
			fwrite($myfile, $date . ":");
			fwrite($myfile, $name . ":");
			fwrite($myfile, $feedback . ":");
			fwrite($myfile, $busniess_assosiation_name. ":");
			fwrite($myfile, $position);
			fwrite($myfile, "\n");
			fclose($myfile);
			echo "<script>window.location.assign('reads_and_explodes_feedback.php')</script>";
		}
		else
		{
			$myfile = fopen("Data/Feedback/feedback.txt", "w");
			fwrite($myfile, $date . ":");
			fwrite($myfile, $name . ":");
			fwrite($myfile, $feedback . ":");
			fwrite($myfile, $busniess_assosiation_name. ":");
			fwrite($myfile, $position);
			fwrite($myfile, "\n");
			fclose($myfile);
			echo "<script>window.location.assign('reads_and_explodes_feedback.php')</script>";
		}

?>