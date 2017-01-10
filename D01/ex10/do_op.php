#!/usr/bin/php
<?PHP
if ($argc != 4)
{
	echo "Incorrect Parameters\n";
	exit;
}
array_shift($argv);
foreach($argv as $str)
	$str = trim($str);
$out = 0;
if ($argv[1] == "+")
	$out = (int)$argv[0] + (int)$argv[2];
if ($argv[1] == "-")
	$out = (int)$argv[0] - (int)$argv[2];
if ($argv[1] == "*")
	$out = (int)$argv[0] * (int)$argv[2];
if ($argv[1] == "/")
	$out = (int)$argv[0] / (int)$argv[2];
if ($argv[1] == "%")
	$out = (int)$argv[0] % (int)$argv[2];
echo "$out\n";
?>
