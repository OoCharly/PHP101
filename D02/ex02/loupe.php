#!/usr/bin/php
<?PHP
function ft_toupper($matches) 
{
	preg_match_all("!<[^>]+>!is", $matches[2], $bal);
	$final = preg_replace("!$matches[2]!is", strtoupper($matches[2]), $matches);
	foreach($bal[0] as $balise)
		$final = preg_replace("!$balise!is", strtolower($balise), $final);
	preg_match_all("!title\s*(=\s*(?:\"[^\"]+\"|'[^']*'|[^\"'\s]*))!is", $final[0], $titles);
	array_shift($titles);
	foreach($titles as $stitles)
	foreach($stitles as $title)
		$final = preg_replace("!$title!is", strtoupper($title), $final);
	return $final[1].$final[2].$final[3];
}
if ($argv > 1)
{
	@$page = file_get_contents($argv[1]);
	if (!$page)
		echo "Impossible d'oubrir le fichier\n";
	else
	{
		$page = preg_replace_callback('!(<a.*?>)(.*?)(</a>)!is', "ft_toupper", $page);
		echo $page;
	}
}
?>
