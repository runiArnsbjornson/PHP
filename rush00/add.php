<?php
session_start();
include ('utils.php');

if (!($_SESSION['panier']))
{
	$_SESSION['panier'] = array();
	$_SESSION['panier'][$_POST['item']] += $_POST['quantite'] ;
}
else
{
	$_SESSION['panier'][$_POST['item']] += $_POST['quantite'] ;
}
	redir('location: items.php');

?>
