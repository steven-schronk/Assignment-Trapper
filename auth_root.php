<?php

include_once("conn.php");

/* verify username and password - do not pass if incorrect */
if(!isset($_COOKIE["username"])) { include("login.php"); exit; }
if(!isset($_COOKIE["password"])) { include("login.php"); exit; }

$sql = "select count(*), user_id, role, name from users where email='". $_COOKIE["username"]. "' and password=SHA('".$_COOKIE["password"]."')";

$result = mysql_query($sql);

if (!$result) { die("SQL ERROR"); }

$row = mysql_fetch_row($result);

if($row[0] > 0) { } else { echo "Incorrect Username or Password."; }

/* if we don't get a good login, send username and password form and exit */
if($row[0] < 1)  { include("login.php"); exit; }

/* set global var with user id and email address - shown on pages and used in URL's */
$user_id = $row[1];
$role = $row[2];
$user_name = $row[3];

if($user_id == NULL) { die("User ID Not Set For This User. Contact Technical Support."); }

?>
