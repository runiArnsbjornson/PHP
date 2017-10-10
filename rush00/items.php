<?php session_start() ?>
<?php include('utils.php') ?>
<html>
<head>
	<link rel="stylesheet" href="index.css">
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
		<ul class='categories'>
			<li class='wtb'><a href='index.php'><img src=/img/home.png alt='home'></a></li>
			<?php 
			$category = items('SELECT * FROM category');
			foreach ($category as $cat) { ?>
			<li class='wtb'><a href="<?= "items.php?categ=" . $cat['id']; ?>"><?= $cat['name'] ?></a></li>
			<?php } ?>
			<li class='wtb'><a  href= 'cart.php'><img src=/img/panier.png alt='panier' height='40'></a></li>
		</ul>

<div id='main'>
<div id='Product' class='rand'>
		<h1>Products</h1>
		<div id='products'>

			<?php
			$categ = isset($_GET['categ']) ? "WHERE category = " . intval($_GET['categ']) . " " : "";
			$items = items("SELECT * FROM items " . $categ . "ORDER BY NAME");
			foreach ($items as $product) { ?>

			<div class='item'>
				<img width='150px' height='150px' src='<?= $product['image_url']; ?>'><br/>
				<b><?= $product['name']; ?></b><br>
				<form action ='add.php' method='POST'>
					<b><?= $product['price']; ?>$</b>
					<b>Qty : </b><input type='number' max='99' min='1' name='quantite' value='1'>
					<button type='submit' name='item' value='<?= $product['name']; ?>'>Add</button>
				</form>
			</div>
		<?php } ?>
	</div>
	</div>
</div>

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
		<?php if ($_SESSION['user'] == 'runi' || $_SESSION['user'] == 'jordan')
				echo "<p><a href='admin.php'>Log in</a></p>";
		?>
		<p>Add products</p>
		<p>Manage users</p>
	</div>
</div>
</body>
</html>
