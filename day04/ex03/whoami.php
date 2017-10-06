<?php

session_start();
if ($_SESSION['logged_on_user'] && $_SESSION['logged_on_user'] != "")
	echo $_SESSION['logged_on_user'].PHP_EOL;
else
	echo ERROR.PHP_EOL;

?>
