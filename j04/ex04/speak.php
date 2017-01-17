<?php
session_start();
date_default_timezone_set("Etc/GMT+1");

function	post_msg($msg)
{
	$login = $_SESSION['log_as'];
	if (!isset($login) || $login === "")
		return FALSE;
	if (file_exists("../private") === FALSE)
	{
		if (!mkdir("../private", 0777, false))
			return FALSE;
	}
	if (!($fd = fopen("../private/chat", "a+")))
		return FALSE;
	flock($fd, LOCK_EX); 
	$file = file_get_contents("../private/chat");
	$tab = unserialize($file);
	$user["login"] = $login;
	$user["time"] = time();
	$user["msg"] = $msg;
	$tab[] = $user;
	$data = serialize($tab);
	$ret = file_put_contents("../private/chat", $data);
	flock($fd, LOCK_UN);
	if ($ret === FALSE)
		return FALSE;
	return TRUE;
}
if ($_POST['msg'] !== "" && $_POST['submit'] === "Envoyer")
{
	if (post_msg($_POST['msg']) === FALSE)
		echo "ERROR\n";
}
?>
<html>
<head>
	<script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
	<meta charset="UTF-8" />
</head>
<body>
	<form method="POST" action="speak.php">
		Message: <input type="text" name="msg" value="" />
		<input type="submit" name="submit" value="Envoyer"/>
	</form>
</body>
</html>
