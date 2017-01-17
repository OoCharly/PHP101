<?PHP
session_start();
if (isset($_GET['submit']) && $_GET['submit'] === "OK")
{
	$_SESSION['login'] = $_GET['login'];
	$_SESSION['passwd'] = $_GET['passwd'];
}
else
{
	$_SESSION['login'] = NULL;
	$_SESSION['passwd'] = NULL;
}
?>
<html><body>
<form method=get>
Identifiant:	<input type=text name=login value="<?PHP echo $_SESSION['login']; ?>" /></br>
Mot de Passe:	<input type=password name=passwd value="<?PHP echo $_SESSION['passwd']; ?>" /></br>
<input type=submit name=submit value="OK">
</form>
</body></html>
