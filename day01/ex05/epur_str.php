#!/usr/bin/php
<?PHP

if ($argc == 2)
{
	$str = trim(preg_replace("/ +/", " ", $argv[1]));
	print("$str\n");
}

?>
