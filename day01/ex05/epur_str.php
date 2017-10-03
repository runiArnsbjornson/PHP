#!/usr/bin/php
<?PHP

if ($argc == 2)
{
	$tab = explode(' ', $argv[1]);
	foreach ($tab as $word)
	{
		if (!empty($word))
			$str .= $word." ";
	}
	$str = trim($str);
	print("$str\n");
}

?>
