<?php

$hostname = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'trapper';

$conn = mysql_connect($hostname, $db_user, $db_pass);
if (!$conn) { die('Could not connect to database.'); }

mysql_select_db($db_name);

?>
