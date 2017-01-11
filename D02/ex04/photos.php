#!/usr/bin/php
<?PHP
if ($argc == 1)
	exit;
$img_clean = array();
$url = $argv[1];
$ch = curl_init($url);
if ($ch == FALSE)
{
	echo "curl init failed $url";
	exit;
}
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
$page = curl_exec($ch);
curl_close($ch);
preg_match_all("!<img\s+[^>]*src\s*=\s*(?:\"([^\"]*)\"|'([^']*)'|([^\"'\s]*))[^>]*>!i", $page, $img, PREG_SET_ORDER);
foreach($img as $tmp)
{
	$tmp = array_filter($tmp);
	$img_clean[] = array_pop($tmp);
}
$anurl = preg_replace("!http[s]?://(?:[^/\s]*)!iU","$1", $url);
$old_pwd = shell_exec("pwd");
mkdir($anurl, 0755, true);
chdir($anurl);
foreach($img_clean as $str)
{
	if (!preg_match("!https?://!i", $str))
	{
		$i = strlen($url);
		if ($url[$i - 1] == '/' || ($str[0] == '/'))
			$str = $url.$str;
		else
			$str = $url."/".$str;
	}
	$ch = curl_init($str);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	$file = curl_exec($ch);
	curl_close($ch);
	preg_match("![^/]*$!", $str, $name);
	$fd = fopen($name[0], "x");
	if($fd)
	{
		fwrite($fd, $file);
		fclose($fd);
	}
}
?>
