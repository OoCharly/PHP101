#!/usr/bin/php
<?PHP
function ft_split($string)
{
	$out = explode(" ", $string);
	if ($string)
		sort($out);
	return ($out);
}
?>
