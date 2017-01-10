#!/usr/bin/php
<?PHP
date_default_timezone_set("Etc/GMT-1");
if ($argc == 1)
	exit;
function	ft_error()
{
	echo "Wrong Format\n";
	exit;
}

function	check_format($tabt)
{
	$pattern ="/^([Ll]undi|[Mm]ardi|[Mm]ercredi|[Jj]eudi|[Vv]endredi|[Ss]amedi|[Dd]imanche)$/";
	if (!preg_match($pattern, $tabt[0]))
		ft_error();
	$pattern = array("/^[Jj]anvier$/", "/^[Ff]évrier$/", "/^[Mm]ars$/", "/^[Aa]vril$/", "/^[Mm]ai$/", "/^[Jj]uin$/", "/^[Jj]uillet$/", "/^[Aa]o[ûu]t$/", "/^[Ss]eptembre$/", "/^[Oo]ctobre$/", "/^[Nn]ovembre$/", "/^[Dd]écembre$/");
	$rep = array("jan", "feb", "mar", "apr", "may", "jun", "jul", "aug", "sep", "oct", "nov", "dec");
	$tabt[2] = preg_replace($pattern, $rep, $tabt[2], -1, $err);
	if (!$err)
		ft_error();
	if (!preg_match("/^\d\d?$/", $tabt[1]) || !preg_match("/^\d{4}$/", $tabt[3]) || !preg_match("/^\d\d:\d\d:\d\d$/", $tabt[4]))
		ft_error();
	return ($tabt);
}
$tabt = preg_split("/ /", $argv[1]);
if (count($tabt) != 5)
	ft_error();
$tabt = check_format($tabt);
$str_d = "$tabt[1] $tabt[2] $tabt[3]T$tabt[4]";
$out = strtotime($str_d);
echo "$out\n";
?>
