<?PHP
function	auth($login, $passwd)
{
	if (($file = file_get_contents("../private/passwd")) == FALSE)
		return FALSE;
	$list = unserialize($file);
	foreach ($list as $key => $user)
	{
		if (strtolower($user['login']) === strtolower($login))
		{
			if (hash("whirlpool", $passwd) === $user['passwd'])
				return TRUE;
			else
				return FALSE;
		}
	}
	return FALSE;
}
?>
