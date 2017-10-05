<?PHP

function ft_split($argv)
{
	$tab = explode(" ", $argv);
	foreach ($tab as $k => $v)
	{
		if ($v == "")
			unset($tab[$k]);
	}
	sort($tab);
	return $tab;
}

?>
