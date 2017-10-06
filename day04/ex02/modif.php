<?php

if ($_POST['login'] != "" && $_POST['oldpw'] != "" && $_POST['newpw'] != "" && $_POST['newpw'] === $_POST['confirm'] && $_POST['submit'] === "OK")
{
	$user['login'] = $_POST['login'];
	$new = hash('whirlpool', $_POST['newpw']);
	$old = hash('whirlpool', $_POST['oldpw']);
	if (file_exists('../private/passwd'))
	{
		$db = file_get_contents('../private/passwd');
		$db = unserialize($db);
	}
	foreach ($db as $k => $u)
	{
		if ($user['login'] == $u['login'])
		{
			if ($old === $u['passwd'] || $old !== $new)
			{
				$user['passwd'] = $new;
				$db[$k] = $user;
				file_put_contents('../private/passwd', serialize($db));
				echo OK.PHP_EOL;
				return ;
			}
			else
			{
				echo ERROR.PHP_EOL;
				return ;
			}
		}
	}
	echo ERROR.PHP_EOL;
}
else
	echo ERROR.PHP_EOL;

?>
