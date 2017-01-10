<?PHP
function ft_split($string)
{
	$out = explode(" ", $string);
	$out = array_filter($out);
	if (!isset($out[0]))
		$out[] = "";
	sort($out);
	return ($out);
}
?>
