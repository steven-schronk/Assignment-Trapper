<?php include("header.php"); ?>

<form action='index.php' method="post">
<center>
<table>
	<tr><td>e-mail:</td><td><input type="text" id="username"></td></tr>
	<tr><td>password:</td><td><input type="password" id="password"></td></tr>
	<tr><td><input type="submit" value="Login" onClick="set_cookie();"/></td><td><a href="login_forget.php">Forgot your password?</a></td></tr>
</table><br>
</center>
</form>

<?php include_once("footer.php"); ?>
