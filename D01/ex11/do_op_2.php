#!/usr/bin/php
<?PHP
if ($argc != 2)
{
	echo "Incorrect Parameters\n";
	exit;
}

function	ft_epur_str($string)
{
	$i = 0;
	$tmp = explode(" ", $string);
	foreach($tmp as $str)
		$str = trim($str);
	$tmp = array_filter($tmp);
	foreach($tmp as $str)
	{
		$i++;
		$out=$out.$str;
	}
	return (($i > 3) ? NULL : $out);
}

$tmp = ft_epur_str($argv[1]);
if (!$tmp)
{

	echo "Syntax Error\n";
	exit;
}
if ($tmp[0] == '-' || $tmp[0] == '+')
{
	$n1 = substr($tmp, 0, 1);
	$tmp = substr($tmp, 1);
}
$n1 = $n1.substr($tmp, 0, ($i = strcspn($tmp, "+-/%*")));
$op = substr($tmp, $i, 1);
$n2 = substr($tmp, $i + 1);
if (!is_numeric($n1) || !is_numeric($n2))
{
	echo "Syntax Error\n";
	exit;
}
if ($op == "+")
	$out = (int)$n1 + (int)$n2;
if ($op == "-")
	$out = (int)$n1 - (int)$n2;
if ($op == "*")
	$out = (int)$n1 * (int)$n2;
if ($op == "/")
{
	if ((int)$n2 == 0)
	{
		echo "Syntax Error\n";
		exit;
	}
	$out = (int)$n1 / (int)$n2;
}
if ($op == "%")
{
	if ((int)$n2 == 0)
	{
		echo "Syntax Error\n";
		exit;
	}
	$out = (int)$n1 % (int)$n2;
}
echo "$out\n";
?>
