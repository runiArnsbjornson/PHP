<?php

session_start();
if ($_GET['login'] && $_GET['passwd'] && $_GET['submit'] === "OK")
{
	$_SESSION['login'] = $_GET['login'];
	$_SESSION['passwd'] = $_GET['passwd'];
}
?>
<html><body>
<form>
<p>Username:<input type="text" name="login" value="<?php echo $_SESSION['login']?>" /><br>
<p>Password:<input type="password" name="passwd" value="<?php echo $_SESSION['passwd']?>" /><br>
<p><input type="submit" name="submit" value="OK"/>
</form>
</body></html>
