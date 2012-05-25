<?php

include_once("auth.php");

$_COOKIE["username"] = mysql_real_escape_string($_COOKIE["username"]);
$_COOKIE["password"] = mysql_real_escape_string($_COOKIE["password"]);

$sql = "select count(*), user_id from users where email='". $_COOKIE["username"]. "' and password='".$_COOKIE["password"]."'";

$result = mysql_query($sql);

if (!$result) { die("SQL ERROR"); }

$row = mysql_fetch_row($result);

if($row[0] > 0) { } else { echo "Incorrect Username or Password."; }

?>
