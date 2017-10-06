<?php

include("auth.php");

session_start();

if ($_GET['login'] && $_GET['passwd'])
{
	if (auth($_GET['login'], $_GET['passwd']))
	{
		$_SESSION['logged_on_user'] = $_GET['login'];
		echo OK.PHP_EOL;
	}
	else
	{
		$_SESSION['logged_on_user'] = "";
		echo ERROR.PHP_EOL;
	}
}
else
	echo ERROR.PHP_EOL;

?>
