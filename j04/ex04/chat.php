<?PHP
if (!file_exists("../private/chat") || ($file = file_get_contents("../private/chat")) === FALSE)
	echo "";
else
{
	$tab = unserialize($file);
	foreach($tab as $value)
	{
		echo "[".date("H:i", $value['time'])."] ";
		echo "<b>".$value['login']."</b>: ";
		echo $value['msg']."<br />";
	}
}
?>
