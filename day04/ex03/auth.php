<?php

function auth($login, $passwd)
{
	if (file_exists('../private/passwd'))
		$db = unserialize(file_get_contents('../private/passwd'));
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

?>
