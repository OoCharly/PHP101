#!/usr/bin/php
<?PHP
if ($argc == 1)
	exit;
array_shift($argv);
foreach($argv as $param)
{
	$tmp = array_map('trim',explode(" ", $param));
	$tmp = array_filter($tmp);
	foreach($tmp as $str)
		$out[] = $str;
}
sort($out);
foreach($out as $str)
	echo"$str\n";
?>
