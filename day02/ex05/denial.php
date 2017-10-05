#!/usr/bin/php
<?php

if ($argc != 3 || !file_exists($argv[1])) ##check the params
	exit(0);

$read = fopen($argv[1], 'r');
while ($read && !feof($read))
	$array[] = explode(";", fgets($read));

$header = $array[0];
unset($array[0]);

foreach ($header as $k => $v)
	$header[$k] = trim($v);

$index = array_search($argv[2], $header); ##check the entry 
if ($index === false)
	exit(0);

foreach ($header as $h_k => $h_v)
{
	$tmp = array();
	foreach ($array as $v)
	{
		if (isset($v[$index]))
			$tmp[trim($v[$index])] = trim($v[$h_k]);
	}
	$$h_v = $tmp;
}

$stdin = fopen("php://stdin", 'r'); ##command and eval()
while ($stdin && !feof($stdin))
{
	echo "Enter your command: ";
	$order = fgets($stdin);
	if ($order)
		eval($order);
}
fclose($stdin);

echo PHP_EOL;

?>
