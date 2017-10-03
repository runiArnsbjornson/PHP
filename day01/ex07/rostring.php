#!/usr/bin/php
<?PHP

function epur_str($str)
{
	$tab1 = explode(' ', $str);
	foreach ($tab1 as $word)
	{
		if (!empty($word))
			$ret .= $word." ";
	}
	$ret = trim($ret);
	return $ret;
}

if ($argv[1])
{
	$tab = explode(" ", epur_str($argv[1]));
	$word = array_shift($tab);
	foreach ($tab as $w)
		print $w." ";
	print("$word[0]\n");
}

?>
