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

function is_alnum($c)
{
if (($c >= 48 && $c <= 57) || ($c >= 65 && $c <= 90) || ($c >= 97 && $c <= 122))
	return 1;
return 0;
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
print_r($final);

$i = 0;
while ($final[$i])
{
	print($final[$i]."\n");
	print(is_alnum($final)."\n");
	// if (!is_alnum($final[0][$i]))
	// {
	// 	$sym[] = $final[$i];
	// 	$tmp = $final;
	// 	array_splice($final, $i, count($final), $tmp[$i + 1]);
	// }
	$i++;
}

print_r($final);
print_r($sym);

sort($final, SORT_FLAG_CASE OR SORT_NATURAL);

$j = 0;
while ($final[$j])
{
	print $final[$j++].PHP_EOL;
}

?>
