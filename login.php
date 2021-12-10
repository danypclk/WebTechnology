<?php
$username = $_POST['username'];
$password = $_POST['password'];

if($username == 'admin')
{
	if($password == 'loGGin')
	{
	echo "<script>alert('Erfolgreich eingeloggt')</script>";
	echo "<script>window.location.assign('admin-page.html')</script>";
	}
}
else
{
	echo "<script>window.location.assign('login.html');alert('Falscher Username oder Passwort')</script>";
}
?>