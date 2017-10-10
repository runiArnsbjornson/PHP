<?php

function sql_connection()
{
	$link = mysqli_connect('127.0.0.1', 'root', 'prout');
	return $link;
}

function auth($login, $passwd)
{
	if (file_exists('../data/passwd'))
		$db = unserialize(file_get_contents('../data/passwd'));
	else
		$db = [];
	foreach ($db as $user)
	{
		if ($login == $user['login'])
		{
			if(hash('whirlpool', $passwd) == $user['passwd'])
				return TRUE;
		}
	}
	return FALSE;
}

function alert($s)
{
	echo "<script>alert('".$s."');</script>";
}

function items($query)
{
	$link = sql_connection();
	mysqli_select_db($link, 'shop');
	mysqli_escape_string($link, $query);
	if ($result = mysqli_query($link, $query))
	{
		while ($tab[] = mysqli_fetch_assoc($result));
		mysqli_free_result($result);
		mysqli_close($link);
		array_pop($tab);
		return ($tab);
	}
}

function redir($location)
{
header($location);
exit();
}

?>
