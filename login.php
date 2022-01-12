<?php
$username = $_POST['username'];
$password = $_POST['password'];

$file = "register-folder/partner-file.txt";
$file_1 = "register-folder/employee-file.txt";
$file_2 = "register-folder/client-file.txt";

// sees if files exist or are empty and label them accordingly

if(!file_exists("Data/Selector/employee_selector.html"))
{
	$employee_selector_file = fopen("Data/Selector/employee_selector.html", "w");
	fclose($employee_selector_file);
}
if(!file_exists("Data/Selector/partner_employee_selector.html"))
{
	$employee_selector_file = fopen("Data/Selector/partner_employee_selector.html", "w");
	fclose($employee_selector_file);
}
if(!file_exists("Data/Contact_Us/contact.txt"))
{
	$contact_us_text_file = fopen("Data/Contact_Us/contact.txt", "w");
	fclose($contact_us_text_file);
}
if(!file_exists("Data/Work_orders/work_order.txt"))
{
	$contact_us_text_file = fopen("Data/Work_orders/work_order.txt", "w");
	fclose($contact_us_text_file);
}
if(!file_exists("Data/Feedback/feedback.txt"))
{
	$contact_us_text_file = fopen("Data/Feedback/feedback.txt", "w");
	fclose($contact_us_text_file);
}
if(!file_exists("iframe-folder/register_list.html"))
{
	$register_list_iframe = fopen("iframe-folder/register_list.html", "w");
	fwrite($register_list_iframe,"<h2>Keine Konten in der Registrierung</h2>");
	fclose($register_list_iframe);
}
if(!file_exists("iframe-folder/feedback.html"))
{
	$feedback_iframe = fopen("iframe-folder/feedback.html", "w");
	fwrite($feedback_iframe,"<h2>Kein Feedback</h2>");
	fclose($feedback_iframe);
}
if(!file_exists("iframe-folder/feedback_worker.html"))
{
	$feedback_iframe = fopen("iframe-folder/feedback_worker.html", "w");
	fwrite($feedback_iframe,"<h2>Kein Feedback</h2>");
	fclose($feedback_iframe);
}
if(!file_exists("iframe-folder/contact_us_list.html"))
{
	$contact_us_iframe = fopen("iframe-folder/contact_us_list.html", "w");
	fclose($contact_us_iframe);
}

if(!file_exists("iframe-folder/worker_list.html"))
{
	$worker_iframe = fopen("iframe-folder/worker_list.html", "w");
	fwrite($worker_iframe,"<h2>Keine Arbeitsaufträge</h2>");
	fclose($worker_iframe);
}

if(filesize("Data/Contact_Us/contact.txt") == 0)
{
	$contact_us_iframe = fopen("iframe-folder/contact_us_list.html", "w");
	fwrite($contact_us_iframe,"<h2>Keine Nachrichten</h2>");
	fclose($contact_us_iframe);
}

// sees if files exist , if not it will create them in the right directory

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
	$fn2 = fopen("register-folder/client-file.txt","r");
}
else
{
	$fn2 = fopen("register-folder/client-file.txt", "w");
}

// sees if master key was applied on the login

if($username == 'admin')
{
	if($password == 'loGGin')
	{
		echo "<script>alert('Erfolgreich eingeloggt')</script>";
		echo "<script>window.location.assign('admin-page.html')</script>";
	}
	else
	{
		echo "<script>alert('Falscher Username oder Passwort')</script>";
		echo "<script>window.location.assign('login.html')</script>";
	}
}

// if not tries to search it in the text files inside register-folder directory

else
{
		
	while($row = fgets($fn)) {
		list( $Name, $Vorname, $Realname, $Pass, $Email, $Position ) = explode( ":", $row );
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
		list( $Name, $Vorname, $Realname, $Pass, $Email, $Position ) = explode( ":", $row );
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
		list( $Name, $Vorname, $Realname, $Pass, $Email, $Position ) = explode( ":", $row );
		if($username == $Name)
		{
			if($password == $Pass)
			{
				echo "<script>alert('Erfolgreich eingeloggt')</script>";
				echo "<script>window.location.assign('client-page.html')</script>";
			}
		}	
	}
	fclose($fn2);
	
// if it does not find it it will alert the user password or name are wrong	

	echo "<script>alert('Falscher Username oder Passwort')</script>";
	echo "<script>window.location.assign('login.html')</script>";
}
	
?>