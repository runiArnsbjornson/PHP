#!/usr/bin/php
<?PHP

function is_alnum($c)
{
	if (($c >= 48 && $c <= 57) || ($c >= 65 && $c <= 90) || ($c >= 97 && $c <= 122))
		return 1;
	return 0;
}

function is_num($c)
{
	if ($c >= 48 && $c <= 57)
		return 1;
	return 0;
}

$i = 1;
while ($i < $argc)
{
	$tab[] = trim(preg_replace("/ +/", " ", quotemeta($argv[$i])));
	$i++;
}

$mid = array();
foreach($tab as $s)
{
	if (strpos(quotemeta($s), " "))
		$mid = array_merge($mid, explode(" ", $s));
	else
		$mid[] = $s;
}

$sym = array();
$alnum = array();
foreach ($mid as $str) #separate alnum & meta
{
	is_alnum(ord($str)) ? $alnum[] = $str : $sym[] = $str;
}

$al = array();
$num = array();
foreach ($alnum as $ascii) #separate alpha & numeric
{
	is_num(ord($ascii)) ? $num[] = $ascii : $al[] = $ascii;
}

sort($num, SORT_STRING);
natcasesort($al);
$final = array_merge($al, $num, $sym);

foreach ($final as $d) #display
{
	print("$d\n");
}

?>
