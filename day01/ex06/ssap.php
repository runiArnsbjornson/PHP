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

$i = 1;
while ($i < $argc)
{
	$tab[] = epur_str($argv[$i]);
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

$j = 0;
while ($final[$j])
{
	print $final[$j++].PHP_EOL;
}

?>
