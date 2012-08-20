<?php

include("header.php");
include_once("conn.php");

if(isset($_GET["email"])){ $_GET["email"] = mysql_real_escape_string($_GET["email"]); }
if(isset($_GET["reset_hash"])){ $_GET["reset_hash"] = mysql_real_escape_string($_GET["reset_hash"]); }
if(isset($_POST["new_password_1"])){ $_POST["new_password_1"] = mysql_real_escape_string($_POST["new_password_1"]); }
if(isset($_POST["new_password_2"])){ $_POST["new_password_2"] = mysql_real_escape_string($_POST["new_password_2"]); }

$login_form = '
	<form action="http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?email='.$_GET["email"].'&reset_hash='.$_GET["reset_hash"].'" method="post">
		<center>
			<table>
				<tr><td>new password:</td><td><input name="new_password_1" type="password"></td></tr>
				<tr><td>new password (again):</td><td><input name="new_password_2" type="password"></td></tr>
				<tr><td><input type="submit" value="Update"/></td><td></td></tr>
			</table><br>
		</center>
	</form>';

$passwd_req = '
	<ol>
		<li>Passwords below must match.</li>
		<li>Must be at least 5 characters long.</li>
		<li>Must contain at least one number and one letter.</li>
		<li>Must be different original password.</li>
	</ol>
';

if(isset($_GET["reset_hash"])) {
	if(isset($_POST["new_password_1"]) && isset($_POST["new_password_2"])) {
		if(strlen($_POST["new_password_1"]) < 5) {
			echo $passwd_req;
			echo $login_form;
			exit();
		}
		if($_POST["new_password_1"] != $_POST["new_password_2"]){ // passwords not the same
			echo '<br><br><b>Passwords Not The Same<br>Please Try Again</b><br><br>';
			echo $login_form;
			exit();
		}
		//if($_POST["new_password_1"]) // must contain a number
		if(!preg_match('/[a-zA-Z]/', $_POST["new_password_1"])) {
			echo "No Letter found in password!";
			echo $passwd_req;
			echo $login_form;
			exit();
		}
		if(!preg_match('/[0-9]/', $_POST["new_password_1"])) {
			echo "No Number found in password!";
			echo $passwd_req;
			echo $login_form;
			exit();
		}
		$sql = 'update users set password = sha1("'.$_POST["new_password_1"].'") where email="'.$_GET["email"].'"';
		$result = mysql_query($sql);
		echo "Your Password Has Been Changed.<br><br><a href='login.php'>Click Here</a> to Login.";
		exit();
	} else {
		$sql = 'select count(*) from users where email="'.$_GET["email"].'" and reset_hash="'.$_GET["reset_hash"].'"';
		$result = mysql_query($sql);
		$row = mysql_fetch_row($result);
		if($row[0] == 1) {  // user and hash correct
			echo '<br><br>Please Create A New Password</b><br><br>';
			echo $login_form;
		}
	}
	exit();
} else if(isset($_GET["email"])) {
	// lookup message in users table
	$sql ='select count(*) from users where email="'.$_GET["email"].'"';
	$result = mysql_query($sql);
	$row = mysql_fetch_row($result);
	if($row[0] >= 1) {  // user found
		// generating hash to send to user in an email at this address
		$sql = 'select user_id, email, password, name, attempts, first_login, last_click, NOW() from users where email = "'.$_GET["email"].'"';
		$result = mysql_query($sql);
		$row = mysql_fetch_row($result);
		$sha = sha1($row[0].$row[1].$row[2].$row[3].$row[4].$row[5].$row[6].$row[7].microtime());

		$sql = 'update users set reset_hash = "'.$sha.'" where email = "'.$_GET["email"].'"';
		$result = mysql_query($sql);

		$subject = $_SERVER['SERVER_NAME']." Password Assistance";
		$message = "
A request has been made to reset the password for an account at this website.

Click the link below to reset your password.

http://".$_SERVER['HTTP_HOST'].$_SERVER[PHP_SELF]."?email=".$_GET["email"]."&reset_hash=".$sha."

If clicking the link does not allow you access, you should be able to copy an paste it into your browser.";

		// WARNING: send message to user - do not display on screen
		mail($_GET["email"], $subject, $message);
	}
	echo "A message sent to your e-mail address.<br><br>Please follow the directions contained inside to reset your password.";
	exit();
} else {

?>
	<form action='login_forget.php' method="get">
	<center>
	Please enter your e-mail address for this account.<br><br><br>
	We'll send you an e-mail with instructions on how to get logged in.<br><br><br>
	e-mail:<input type="text" name="email"><br><br><br>
	<button>Continue</button>
	</center>
	</form>
<?php

}

include_once("footer.php"); ?>
