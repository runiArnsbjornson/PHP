<?php session_start() ?>
<?php include('utils.php') ?>

<html>
<head>
	<link rel='stylesheet' href='index.css'>
	<meta charset='UTF-8'>
	<title>Welcome</title>
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

<h1>YOU ARE IN THE DEVIL'S OFFICE</h1>

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
