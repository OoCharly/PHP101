#!/usr/bin/php
<?PHP
if ($argc == 1)
	exit;
$i = 0;
$numeric = array();
$alpha = array();
$other = array();
foreach($argv as $str)
{
	if (!$i)
		$i++;
	else foreach(explode(" ", $str) as $word)
	{
		if ($word)
		{
			if (($word >= "a" && $word < "{") || ($word >= "A" && $word < "["))
				$alpha[] = $word;
			else if ($word >= "0" && $word < ":")
				$numeric[] = $word;
			else
				$other[] = $word;
		}
	}
}
if ($alpha)
	sort($alpha, SORT_STRING | SORT_FLAG_CASE);
if ($numeric)
	sort($numeric);
if ($other)
	sort($other);
foreach($alpha as $str)
	echo "$str\n";
foreach($numeric as $str)
	echo "$str\n";
foreach($other as $str)
	echo "$str\n";
?>
