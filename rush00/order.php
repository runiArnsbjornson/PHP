<?php session_start() ?>
<?php include('utils.php') ?>
<?php
header('refresh:0;url=/index.php');

if (!$_ENV['order'])
{
	echo "ok";
	$_ENV['order'] = array();
	$_ENV['order'] += $_SESSION['panier'];
	$_SESSION['panier'] = array();
}
else
{
	$_ENV['order'] += $_SESSION['panier'];
	$_SESSION['panier'] = array();
}

alert('thank you for all the souls');
?>
