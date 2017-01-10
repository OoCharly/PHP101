#!/usr/bin/php
<?PHP
function ft_split($string)
{
	$out = explode(" ", $string);
	$out = array_filter($out);
	sort($out);
	return ($out);
}
?>
