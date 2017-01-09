#!/usr/bin/php
<?PHP
if ($argc == 1)
	exit;
$i = 0;
$ar_str = explode(" ", $argv[1]);
foreach($ar_str as $str)
	if ($str)
	{
		$out[$i] = $str;
		$i++;
	}
echo $out[--$i];
$mem = $i;
$i = 1;
while ($i < $mem)
{
	echo " $out[$i]";
	$i++;
}
if ($mem != 0)
	echo " $out[0]";
echo "\n";
?>
