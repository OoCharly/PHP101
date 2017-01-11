#!/usr/bin/php
<?PHP
date_default_timezone_set("Europe/Paris");
if (!($file = file_get_contents("/var/run/utmpx")))
{
	echo "open error\n";
	exit;
}
$out = array();
$what = str_split($file, 628);
foreach($what as $chinese)
{
	$tab = unpack("a256user/a4id/a32tty/ipid/itype/ltime", $chinese);
	if ($tab["type"] == 7)
		$out[] = $tab["user"]." ".$tab["tty"]."  ".strftime("%b %d %R", $tab["time"]);
}
sort($out);
foreach($out as $str)
	echo "$str\n";
?>
