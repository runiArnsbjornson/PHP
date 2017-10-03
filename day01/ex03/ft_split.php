<?PHP

function ft_split($argv)
{
	$tab = explode(" ", $argv);
	sort($tab);
	return $tab;
}
?>
