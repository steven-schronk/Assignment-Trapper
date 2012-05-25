<?php

include_once("auth.php");

$sql = "select count(*), user_id from users where email='". $_COOKIE["username"]. "' and password='".$_COOKIE["password"]."'";

$result = mysql_query($sql);

if (!$result) { die("SQL ERROR"); }

$row = mysql_fetch_row($result);

if($row[0] > 0) { } else { echo "Incorrect Username or Password."; }

?>
