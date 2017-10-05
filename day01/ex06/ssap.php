#!/usr/bin/php
<?PHP

$i = 1;
while ($i < $argc)
{
	$tab[] = trim(preg_replace("/ +/", " ", $argv[$i]));
	$i++;
}

$final = array();
foreach($tab as $s)
{
	if (strpos($s, " "))
		$final = array_merge($final, explode(" ", $s));
	else
		$final[] = $s;
}

sort($final);

foreach ($final as $elem)
{
	print $elem.PHP_EOL;
}

?>
