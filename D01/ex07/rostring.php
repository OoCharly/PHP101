#!/usr/bin/php
<?PHP
if ($argc == 1)
	exit;
$tab = array_filter(array_map('trim', explode(' ', $argv[1])));
$z = array_pop($tab);
$a = array_shift($tab);
array_unshift($tab, $z);
$tab[] = $a;
$a = NULL;
foreach($tab as $str)
	$a .= " $str";
echo trim($a)."\n";
?>
