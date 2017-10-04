#!/usr/bin/php
<?PHP

if (isset($argv[1]))
{
	$str = trim(preg_replace("/[\t ]+/", " ", $argv[1]));
	print("$str\n");
}

?>
