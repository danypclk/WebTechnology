<?php
$name = $_POST['username'];
$pass = $_POST['password'];

if($name == 'admin')
{
	if($pass == 'logIInn')
	{
		echo "<script>window.location.assign('login.html#')</script>";
	}
	else
	{
		echo "<script>window.location.assign('login.html')</script>";
	}
}
else
{
	echo "<script>window.location.assign('login.html')</script>";
}
?>