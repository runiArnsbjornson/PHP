<?php
include('utils.php');
session_start();
header('refresh:0;url=/index.php');
$link = sql_connection();
	mysqli_select_db($link, 'shop');

$do = $_POST['submit'];
$passwd = hash('whirlpool', $_POST['passwd']);
if ($do === "Logout")
{
	if ($_SESSION['user'])
	{
		session_destroy();
		alert('Good bye');
	}
}
else if ($do === 'Delete account')
{
	$secu = mysqli_query($link, "SELECT 1 FROM users WHERE login = '" . $_SESSION['user'] . "' and passwd = '" . $passwd . "';");
	if (mysqli_num_rows($secu) > 0)
	{
		mysqli_query($link, "DELETE FROM users WHERE login = '" . $_SESSION['user'] . "' and passwd = '" . $passwd . "';");
		alert('Farewell ' . $_SESSION['user'] . ' !');
		session_destroy();
	}
}
?>
