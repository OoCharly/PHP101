<?PHP
$tab = array("zaz" => "jaimelespetitsponeys", "yolo" => "Swag", "admin" => "admin");
if (isset ($tab[strtolower($_SERVER['PHP_AUTH_USER'])])
	&& $tab[strtolower($_SERVER['PHP_AUTH_USER'])] === $_SERVER['PHP_AUTH_PW'])
{
	echo "<html><body>\nBonjour ".ucfirst($_SERVER['PHP_AUTH_USER']."<br />\n");
	echo "<img src='data:image/png;base64,".base64_encode(file_get_contents("../img/42.png"))."'>\n";
	echo "</body></html>\n";
}
else
{
	header("WWW-Authenticate: Basic realm=''Espace membres''");
	header("HTTP/1.0 401 Unauthorized");
	header("Connection: close");
	echo "<html><body>Cette zone est accessible uniquement aux membres du site</body></html>\n";
}
?>
