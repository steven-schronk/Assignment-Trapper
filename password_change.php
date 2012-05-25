<?php

include_once("header.php");

include_once("conn.php");

if($_COOKIE["username"]) { $username = $_COOKIE["username"]; } else { $username = $_POST['password']; }

$error_count = 0;

if(!$_POST['password']) { $error .= "Old password field empty.<br>"; $error_count++; }
if(!$_POST['new_password_1']) { $error .= "New password field empty.<br>"; $error_count++; }
if(!$_POST['new_password_2']) { $error .= "New password (again) field empty.<br>"; $error_count++; }

/* passwords must match */
if($_POST['new_password_1'] != $_POST['new_password_2']) { $error .= "New passwords must match.<br>"; $error_count++; }

/* must be at least 5 chars long */
if(strlen($_POST['new_password_1']) < 5) { $error .= "New password must be 5 characters long.<br>"; $error_count++; }

/* must contain at least one number and one letter */
if(!eregi('[a-z0-9_]', $_POST['new_password_1']) || !eregi('[^a-zA-Z]', $_POST['new_password_1'])) { $error .= "Must contain at least one number and one letter.<br>"; $error_count++; }

/* must not be original password */
if($_POST['password'] == $_POST['new_password_1'] )  { $error .= "Must be different original password..<br>"; $error_count++; }

//echo "->".$error_count."<-";

/* if no errors, verify old password and set new password - this prevents false incorrect passwords for other rules*/
if($error_count == '0') {

	$sql = "select count(*), user_id, role, name, first_login from users where email='". $_COOKIE["username"]. "' and password=SHA(\"".$_POST['password']."\")";

	//echo $sql;

	$result = mysql_query($sql);

	if (!$result) { die("SQL ERROR"); }

	$row = mysql_fetch_row($result);

	if($row[0] < 1) { $error .= "Old password incorrect.<br>"; $error_count++; }

	/* must check again for errors before posting password into db */
	if($error_count == '0') {
		$sql = "update users set password=SHA(\"".$_POST['new_password_1']."\"), first_login=0 where email='". $_COOKIE["username"]. "' and password=SHA(\"".$_POST['password']."\")";
		//echo $sql;
		$result = mysql_query($sql);
		if (!$result) { die("SQL ERROR"); }
		/* page where we will go next */
		echo "Password Changed";
		/* set cookie to new username and password*/
		
		/* move to classes page */
		echo '<html><meta http-equiv="refresh" content="0; index.php" /></html>';
		exit;
	}
}

?>

You must change your password to continue.

<ol>
	<li>Passwords below must match.</li>
	<li>Must be at least 5 characters long.</li>
	<li>Must contain at least one number and one letter.</li>
	<li>Must be different original password.</li>
</ol>

<form action="password_change.php" method="post">
<center>
<table>
	<tr><td>username:</td><td><input name="username" type="text" value="<?php echo $username; ?>"></td></tr>
	<tr><td>old password:</td><td><input name="password" type="password" value="<?php echo $_POST['password']; ?>"></td></tr>
	<tr><td>new password:</td><td><input name="new_password_1" type="password"></td></tr>
	<tr><td>new password (again):</td><td><input name="new_password_2" type="password"></td></tr>
</table><br>
<button>Update</button>
<br>
<div id=error style='color: #f00;'><?php echo $error; ?></div>
</center>
</form>

<?php include_once("footer.php"); ?>

