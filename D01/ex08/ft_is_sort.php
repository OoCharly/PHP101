<?PHP
function	ft_is_sort($tab)
{
	$prev = NULL;
	foreach ($tab as $cmp)
	{
		if ($prev && min($prev, $cmp) != $prev)
			return (false);
		$prev = $cmp;
	}
	return (true);
}
?>
