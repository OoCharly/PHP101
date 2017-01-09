#!/usr/bin/php
<?PHP
if ($argc == 1)
	exit;
$i = 1;
$j = 0;
while ($i < $argc)
{
		$tamispace = explode(" ", trim($argv[$i]));
		foreach($tamispace as $tmp)
		{
			$tmp = trim($tmp);
			if ($tmp)
			{
				$out[$j] = $tmp;
				$j++;
			}
		}
		$i++;
}
sort($out);
foreach($out as $str)
	echo "$str\n";
?>
