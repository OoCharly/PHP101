#!/usr/bin/php
<?PHP
if ($argc == 1)
	exit;
function	ft_error()
{
	echo "Wrong Format\n";
	exit;
}

function	check_format($tabt)
$tabt = preg_split("/[ :]/", $argv[1]);
if (count($tabt) != 7)
{
	echo "Wrong Format\n";
	exit;
}

?>
