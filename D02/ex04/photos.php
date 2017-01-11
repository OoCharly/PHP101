#!/usr/bin/php
<?PHP
$url = "http://42.fr";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
$page = curl_exec($ch);
preg_match_all("!<img\s+[^>]*src\s*=\s*(?:\"([^\"]*)\"|'([^']*)'|([^\"'\s]*))[^>]*>!i", $page, $img, PREG_SET_ORDER);
print_r($img);
exec("mkdir ".strstr($url
curl_close($ch);
?>
