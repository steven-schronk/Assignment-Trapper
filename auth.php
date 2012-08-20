<?php
ob_start("ob_gzhandler");
include_once("conn.php");

/* verify username and password - do not pass if incorrect */
if(!isset($_COOKIE["username"])) { include("login.php"); exit; }
if(!isset($_COOKIE["password"])) { include("login.php"); exit; }

$_COOKIE["username"] = mysql_real_escape_string($_COOKIE["username"]);
$_COOKIE["password"] = mysql_real_escape_string($_COOKIE["password"]);

$sql = "select count(*), user_id, role, name, first_login, email from users where attempts < 100 and email='". $_COOKIE["username"]. "' and password=SHA(\"".$_COOKIE["password"]."\")";

//echo $sql;

$result = mysql_query($sql);

if (!$result) { die("SQL ERROR: Get Cred"); }

$row = mysql_fetch_row($result);

/* if we don't get a good login, send username and password form and exit */
if($row[0] <= 0) { // bad login

	// increment tries for user - this will lock them out
	$sql = "update users set attempts = attempts + 1 where email='". $_COOKIE["username"]."'";

	$result = mysql_query($sql);

	//echo $sql;

	echo "Incorrect Username or Password.";
	include("login.php");
	exit;
} else { // good login

	// set attempts to zero
	$sql = "update users set attempts = 0 where email='". $_COOKIE["username"]."'";

	$result = mysql_query($sql);
}

/* set global var with user id and email address - shown on pages and used in URL's */
$user_id = $row[1];
$role = $row[2];
$user_name = $row[3];
$first_login = $row[4];
$user_email = $row[5];

/* update user status to indcate that this user is online - used mostly for chat features */
$sql = "update users set last_click = NOW() where user_id = ".$user_id;

$result = mysql_query($sql);

/* if this is your first login, you MUST change password */
if($first_login == 1) { include("password_change.php"); exit; }

if($user_id == NULL) { die("User ID Not Set For This User. Contact Technical Support."); }

?>
