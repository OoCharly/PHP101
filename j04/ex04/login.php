<?PHP
include("auth.php");
session_start();
if ($_POST['login'] && $_POST['login'] !== "" && $_POST['passwd'] && $_POST['passwd'] !== ""
		&& auth($_POST['login'], $_POST['passwd']) === TRUE)
{
	$_SESSION['log_as'] = $_POST['login'];
	echo "<iframe name=chat height=550px width=100% src=\"chat.php\"></iframe>";
	echo "<iframe name=speak height=50px width=100% src=\"speak.php\"></iframe>";
}
else
{
	echo "ERROR\n";
}
?>
