<?php

if ($_POST['login'] != "" && $_POST['passwd'] != "" && $_POST['submit'] === "OK")
{
	$user['login'] = $_POST['login'];
	$user['passwd'] = hash('whirlpool', $_POST['passwd']);
	if (!file_exists('../private'))
		mkdir('../private');
	if (file_exists('../private/passwd'))
		$db = unserialize(file_get_contents('../private/passwd'));
	if (!$db)
		$db = [];
	foreach ($db as $u)
	{
		if ($user['login'] == $u['login'])
		{
			echo ERROR.PHP_EOL;
			return ;
		}
	}
	$db[] = $user;
	file_put_contents('../private/passwd', serialize($db));
	echo OK.PHP_EOL;
}
else
	echo ERROR.PHP_EOL;

?>
