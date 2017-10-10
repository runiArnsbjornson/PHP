<?php
include('utils.php');
session_start();
header('refresh:0;url=/index.php');
$link = sql_connection();
mysqli_select_db($link, 'shop');

$login = $_POST['login'];
$passwd = hash('whirlpool', $_POST['passwd']);
if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] === "Register")
{
	$secu = mysqli_query($link, "SELECT 1 FROM users WHERE login = '".$login."';");
	if (mysqli_num_rows($secu) > 0)
		$res = 'User already exists';
	else
	{
		$query = "INSERT INTO users (login, passwd, root, cart) VALUES ('".$login."', '".$passwd."', '0', '')"; 
		mysqli_query($link, $query);
		$_SESSION['user'] = $login;
		$res = 'User registered';
	}
}
else if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] === "Login")
{
	$secu = mysqli_query($link, "SELECT 1 FROM users WHERE login = '" . $login . "' and passwd = '" . $passwd . "';");
	if (mysqli_num_rows($secu) > 0)
	{
		$_SESSION['user'] = $login;
		$res = 'Hello ' . $login . ' !';
	}
	else
		$res = 'Wrong password';
}
else
	$res = 'Error';
alert($res);
?>
