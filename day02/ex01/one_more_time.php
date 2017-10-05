#!/usr/bin/php
<?PHP

$mois = array("/[jJ]anvier/", "/[fF]evrier/", "/[mM]ars/", "/[aA]vril/", "/[mM]ai/", "/[jJ]uin/", "/[jJ]uillet/", "/[aA]out/", "/[sS]eptembre/", "/[oO]ctobre/", "/[nN]ovembre/", "/[dD]ecembre/");

for ($i = 1; $i < 13; $i++)
{ 
	$month[] = $i;
}

function W_F()
{
	print "Wrong Format\n";
	exit(0);
}

if (isset($argv[1]))
{
	date_default_timezone_set('Europe/Paris');
	$tab = preg_split("/ /", $argv[1]);
	$i = 0;
	while ($i < 4)
	{
		if (!isset($tab[$i]))
			W_F();
		$i++;
	}
	if (preg_match("/([Ll]undi|[mM]ardi|[mM]ercredi|[jJ]eudi|[vV]endredi|[sS]amedi|[dD]imanche)/", $tab[0]) === 0)
		W_F();
	if (preg_match("/(0[1-9]|[1-2][0-9]|3[0-1])/", $tab[1]) === 0)
		W_F();
	if (preg_match("/[0-9]{4}/", $tab[3]) === 0)
		W_F();
	if (preg_match("/(0[1-9]|1[0-9]|2[0-3]):(0[1-9]|[1-4][0-9]|5[0-9]):(0[1-9]|[1-4][0-9]|5[0-9])/", $tab[4]) === 0)
		W_F();
	$tab[2] = preg_replace($mois, $month, $tab[2]);
	if (empty($tab[2]))
		W_F();
	array_shift($tab);
	$j = 0;
	while ($j < 3)
	{
		$s .= $j < 2 ? $tab[$j]."-" : $tab[$j];
		$j++;
	}
	$s .= " ".$tab[3];
	$epoch = strtotime($s);
	print($epoch."\n");
}
?>
