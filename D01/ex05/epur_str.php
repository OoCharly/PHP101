#!/usr/bin/php
<?PHP
$i = 0;
if ($argc == 1)
	exit;
$tamispace = explode(" ", trim($argv[1]));
foreach($tamispace as $tmp)
{
	$tmp = trim($tmp);
	if ($i == 0 && $tmp)
	{
		echo $tmp;
		$i++;
	}
	else if($tmp)
		echo " $tmp";
}
echo "\n";
?>
