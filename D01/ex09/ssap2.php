#!/usr/bin/php
<?PHP
if ($argc == 1)
	exit;

function	ft_epur_str($string)
{
	$out = explode(" ", $string);
	foreach($out as $str)
		$str = trim($str);
	$out = array_filter($out);
	return ($out);
}

array_shift($argv);
$out = array();
foreach($argv as $param)
	$out = array_merge($out, ft_epur_str($param));

function	char_filter($c1, $c2)
{
	if (ctype_alpha($c1))
		return ((ctype_alpha($c2)) ? $c1 - $c2 : -1);
	else if (ctype_alpha($c2))
		return (1);
	else if (ctype_digit($c1))
		return ((ctype_digit($c2)) ? $c1 - $c2 : -1);
	else if (ctype_digit($c2))
		return (1);
	else
		return ($c1 - $c2);
}

function	my_sort($s1, $s2)
{
	$i = 0;
	while (isset($s1[$i]) && isset($s2[$i]))
	{
		if ($out = char_filter($s1[$i], $s2[$i]))
			return ($out);
		$i++;
	}
	if (!isset($s1[$i]) && isset($s2[$i]))
		return (-1);
	if (!isset($s2[$i]) && isset($s1[$i]))
		return (1);
}
usort($out, 'my_sort');
print_r($out);
?>
