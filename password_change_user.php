<?php

include_once("auth.php");
include_once("header.php");
include_once("conn.php");

if($role != 0) { die("Account \"".$user_name."\" Is Not Authorized To View This Page.<br><br>This Event Will Be Logged And Reported."); }

$_POST['username'] = mysql_real_escape_string($_POST['username']);
$_POST['password'] = mysql_real_escape_string($_POST['password']);

if($_POST['username'] && $_POST['password']) {

	$sql = "update users set password=SHA(\"".$_POST['password']."\"), first_login=1 where email='". $_POST["username"]."'";

	//echo $sql;
	$result = mysql_query($sql);
	if (!$result) { die("SQL ERROR: Update Password"); }
	
	/* move to classes page */
	//echo '<html><meta http-equiv="refresh" content="0; manage.php" /></html>';
		exit;
}

?>

<h3>Manage Accounts -> Change User Password</h3>

<form action='password_change_user.php' method="post">
<center>
<table>
	<tr><td>e-mail:</td><td><input type="text" id="username" name="username"></td></tr>
	<tr><td>password:</td><td><input type="password" id="password" name="password"></td></tr>
</table><br>
<input type="submit" value="Update Password"/>
</center>
</form>
