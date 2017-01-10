#!/usr/bin/php
<?PHP
if ($argc == 1)
	exit;
$tab = array_filter(array_map('trim', explode(' ', $argv[1])));
$tab[] = array_shift($tab);
foreach($tab as $str)
	$a .= " $str";
echo trim($a)."\n";
?>
