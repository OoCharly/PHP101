<?PHP
$action = $_GET['action'];
$name = $_GET["name"];
$value = $_GET["value"];
if ($action === "set" && $name && $value)
	setcookie($name, $value);
else if ($action === "del" && $name)
	setcookie($name, "", time() - (3600 * 24));
else if ($action === "get" && $name && $value)
	echo $value."\n";
else
	exit;
?>
