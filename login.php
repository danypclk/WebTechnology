<?php
$name = $_POST['username'];
$pass = $_POST['password'];

if($name == 'dany')
{
	if($pass == 'sparta')
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