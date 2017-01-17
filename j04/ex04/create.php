<?PHP
function create_login()
{
	if (!file_exists("../private"))
	{
		if (!mkdir("../private", 0755))
			return FALSE;
	}
	if (file_exists("../private/passwd"))
	{
		if(($file = file_get_contents("../private/passwd")) === FALSE)
			return FALSE;
		$users = unserialize($file);
		foreach($users as $user)
			if (strtolower($user['login']) === strtolower($_POST['login']))
				return FALSE;
	}
	$login = array();
	$login['login'] = $_POST['login'];
	$login['passwd'] = hash("whirlpool", $_POST['passwd']);
	$users[] = $login;
	$data = serialize($users);
	if (!file_put_contents("../private/passwd", $data))
		return FALSE;
	return TRUE;
}
if ($_POST['submit'] === "OK" && $_POST['login'] && $_POST['login'] !== ""
	&& $_POST['passwd'] && $_POST['passwd'] !== ""
	&& create_login() === TRUE)
{
	header("Location:index.html");
	echo "OK\n";
}
else
	echo "ERROR\n";
?>
