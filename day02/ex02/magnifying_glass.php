#!/usr/bin/php
<?PHP

function getbetweentags($s)
{
	$pattern = "/<a.*?>([^<]*)</";
	preg_match_all($pattern, $s, $matches);
	return $matches[1];
}

function getbetweenquote($s)
{
	$pattern = "/.*\"(.*)\"/";
	preg_match_all($pattern, $s, $matches);
	return $matches[1];
}

if (argc > 1)
{
	$fd = fopen($argv[1], 'r');
	if ($fd === false)
	{
		print "fopen failed\n";
		exit(0);
	}
	$str = file_get_contents($argv[1]);
	$tab = array_merge(getbetweentags($str), getbetweenquote($str));
	$pattern = array(); 
	foreach ($tab as $elem)
	{
		$pattern[] = "/".$elem."/";
		$TAB[] = strtoupper($elem);
	}
	$str = preg_replace($pattern, $TAB, $str);
	print $str;
}

?>
