<?PHP

function ft_is_sort($array)
{
	$tab = $array;
	sort($tab);
	if ($tab === $array)
		return true;
	return false;
}

?>
