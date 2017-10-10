<?php session_start() ?>
<?php include('utils.php') ?>

<html>
<head>
<link rel='stylesheet' href='index.css'>
<meta charset='UTF-8'>
<title>Panier</title>
</head>
<body>
<?php
if (!$_SESSION['user']) :?>
	<div class='login'>
	<form action='login.php' method='post'>
		<input type='text' name='login' value='' placeholder='login'><br>
		<input type='password' name='passwd' value='' placeholder='password'><br>
		<input type='submit' name='submit' value='Login'>
		<input type='submit' name='submit' value='Register'>
	</form>

<?php else : ?>
	<div class='login'>
	<p class='Welcome'>Welcome <?= $_SESSION['user'] ?> !</p><br>
	<form action ='logout.php' method='post'>
	<input type='submit' name='submit' value='Logout'><br>
	<input type='submit' name='submit' value='Delete account'>
	<input type='password' name='passwd' value='' placeholder='Confirm deletion'>
	</form>
<?php endif; ?>
<div class='title'>
		<h1 class='titre'><a href='index.php'>HELLSHOP</a></h1></div>
</div>
	</div>
		<br\>
		<ul class='categories'>
			<li class='wtb'><a href='index.php'><img src=/img/home.png alt='home'></a></li>
			<?php 
			$category = items('SELECT * FROM category');
			foreach ($category as $cat) { ?>
			<li class='wtb'><a href='<?= 'items.php?categ=' . $cat['id']; ?>'><?= $cat['name'] ?></a></li>
			<?php } ?>
			<li class='wtb'><a  href= 'cart.php'><img src=/img/panier.png alt='panier' height='40'></a></li>
		</ul>

</br>
<?php
if ($_POST['clear'] === 'Empty cart')
{
	$_SESSION['panier'] = array();
}
if (!$_SESSION['panier'])
{
?>
	<h1>Your cart is empty !</h1>
	<div id='footer'>
	<div id='admin'><h1>FOLLOW US ON</h1>
		<p><a href='http://facebook.com'>Facebook</a></p>
		<p><a href='http://twitter.com/'>Twitter</a></p>
		<p><a href='https://www.instagram.com/'>Instagram</a></p>
	</div>
	<div id='admin'><h1>SHIPPING</h1>
		<p>Conditions</p>
		<p>Price</p>
		<p>Locations</p>
	</div>
	<div id='admin'><h1>ADMINISTRATION</h1>
		<p><a href='admin.php'>Log in</a></p>
		<p>Add products</p>
		<p>Manage users</p>
	</div>
</div>
<?php

	return ;
}
 else
{
	foreach ($_SESSION['panier'] as $i => $qty)
	{?>
			<h1><?= $qty; ?> x <?= $i; ?><hr></h1>

<?php
	$name = items("SELECT * FROM items WHERE name='" . $i . "';");
	$total += intval($name[0]['price']) * $qty;
	}

?>
	<h1> Total = <?= $total; ?> $<h1>
	</br>
	<div class='order'>
<form class='panier' action ='cart.php' method='POST'>
<input type='submit' name='clear' value='Empty cart'>
</form>
<form class='panier' action='order.php' method='POST'>
	<?php if(!$_SESSION['user'])
	{
	?>
	<p class='caution'>You must be logged to order !</p>
	<?php } ?>
<input type='submit' name='valid' value='Order'<?php if (!$_SESSION['user'])
echo 'disabled';?>>
</form>
</div>
<?php
 }
?>
<div id='footer'>
	<div id='admin'><h1>FOLLOW US ON</h1>
		<p><a href='http://facebook.com'>Facebook</a></p>
		<p><a href='http://twitter.com/'>Twitter</a></p>
		<p><a href='https://www.instagram.com/'>Instagram</a></p>
	</div>
	<div id='admin'><h1>SHIPPING</h1>
		<p>Conditions</p>
		<p>Price</p>
		<p>Locations</p>
	</div>
	<div id='admin'><h1>ADMINISTRATION</h1>
		<p><a href='admin.php'>Log in</a></p>
		<p>Add products</p>
		<p>Manage users</p>
	</div>
</div>

