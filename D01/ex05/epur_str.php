#!/usr/bin/php
<?PHP
$i = 0;
if ($argc == 1)
	exit;
$out = null;
$tami = explode(" ", trim($argv[1]));
foreach($tami as $tmp)
{
	$tmp = trim($tmp);
	$out .= ($tmp) ? " $tmp": "";
}
echo ($out) ? trim($out)."\n" : "\n";
?>
