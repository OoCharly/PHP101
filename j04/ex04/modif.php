<?PHP
function	check_user($list)
{
	foreach ($list as $key => $user)
	{
		if (strtolower($user['login']) === strtolower($_POST['login']))
		{
			if (hash("whirlpool", $_POST['oldpw']) === $user['passwd'])
				return $key;	
			else
				return FALSE;
		}
	}
	return FALSE;
}

function	modif_user()
{
	if (($file = file_get_contents("../private/passwd")) === FALSE)
		return "ERROR\n";
	$list = unserialize($file);
	if (($key = check_user($list)) === FALSE)
		return "ERROR\n";
	$nuser['login'] = $_POST['login'];
	$nuser['passwd'] = hash("Whirlpool", $_POST['newpw']);
	$list[$key] = $nuser;
	if (!file_put_contents("../private/passwd", serialize($list)))
		return "ERROR\n";
	return "OK\n";
}
if ($_POST['submit'] === "OK" && $_POST['login'] && $_POST['login'] !== ""
		&& $_POST['oldpw'] && $_POST['oldpw'] !== ""
		&& $_POST['newpw'] && $_POST['newpw'] !== ""
		&& file_exists("../private/passwd") === TRUE)
{
	echo modif_user();
	header("Location : index.html");
}
else
	echo "ERROR\n";
?>
