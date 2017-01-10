#!/usr/bin/php
<?PHP
if ($argc == 1)
	exit;
$pattern = array("/(^[ \t][ \t]*|[ \t][ \t]*$)/", "/[ \t][ \t]*/");
$replacement = array("", " ");
$str = preg_replace($pattern, $replacement, $argv[1]);
echo "$str\n";
?>
