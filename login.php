<?php include("header.php"); ?>

<form action='index.php' method="post">
<center>
<table>
	<tr><td>e-mail:</td><td><input type="text" id="username"></td></tr>
	<tr><td>password:</td><td><input type="password" id="password"></td></tr>
</table><br>
<input type="submit" name="submit" value="Login" onClick="set_cookie();"/>
</center>
</form>

<?php include_once("footer.php"); ?>
