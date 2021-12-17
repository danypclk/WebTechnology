<?php
	$name = $_POST['name_konto'];
	
	
	$file_partner = "register-folder/partner-file.txt";
	$file_employee = "register-folder/employee-file.txt";
	$file_intern = "register-folder/intern-file.txt";
	$file_client = "register-folder/client-file.txt";
	
	
	$array = array($file_partner, $file_employee, $file_intern, $file_client);
	$row_number = 0;
	$position = '';

foreach($array as $v)
{
	if(file_exists($v))
	{
		$file = fopen($v, "r+");
		while($row = fgets($file)) 
		{
			list( $Name, $Pass, $Email, $Position ) = explode( ":", $row );
			if($name == $Name)
			{
				$position = trim($Position);
				$file_out = file($v);
				unset($file_out[$row_number]);
				file_put_contents($v, implode("", $file_out));
				
				break;
			}
			$row_number = $row_number + 1;
		}
		$row_number = 0;
		fclose($file);
	}
}

echo "<script>alert('Konot gelöscht')</script>";

if($position == 'employee' || $position == 'partner')
{
	echo "<script>window.location.assign('admin_services_partner_employee_selector.php')</script>";
}

if($position == 'intern' || $position == 'client')
{
	echo "<script>window.location.assign('reads_and_explodes_admin.php')</script>";
}

?>