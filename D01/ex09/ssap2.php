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
		return ((ctype_alpha($c2)) ? ord($c1) - ord($c2) : -1);
	else if (ctype_alpha($c2))
		return (1);
	else if (ctype_digit($c1))
		return ((ctype_digit($c2)) ?ord($c1) - ord($c2) : -1);
	else if (ctype_digit($c2))
		return (1);
	else
		return (ord($c1) - ord($c2));
}

function	my_sort($s1, $s2)
{
	$i = 0;
	$s1 = strtolower($s1);
	$s2 = strtolower($s2);
	while (isset($s1[$i]) && isset($s2[$i]))
	{
		$out = char_filter($s1[$i], $s2[$i]);
			if ($out != 0)
				return ($out);
		$i++;
	}
	return (isset($s1[$i]) - isset($s2[$i]));
}
usort($out, 'my_sort');
foreach($out as $str)
	echo "$str\n";
?>
