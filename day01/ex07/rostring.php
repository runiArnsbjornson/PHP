#!/usr/bin/php
<?PHP

if (isset($argv[1]))
{
	$tab = explode(" ", trim(preg_replace("/ +/", " ", $argv[1])));
	$word = array_shift($tab);
	foreach ($tab as $w)
		print $w." ";
	print("$word\n");
}

?>
