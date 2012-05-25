<?php

include_once("auth.php");
include_once("time.php");

if (!$_GET["file_id"])  { die("No File Name Sent"); }

$_GET["file_id"] = mysql_real_escape_string($_GET["file_id"]);

if($role == 0 ) {
	$sql = 'select file_1, user_id from files where file_id ='.$_GET["file_id"];
} else {
	$sql = 'select file_1, user_id from files where file_id ='.$_GET["file_id"].' and user_id='.$user_id;
}

//echo $sql;

$result = mysql_query($sql);

$row = mysql_fetch_row($result);

$row[0] = htmlspecialchars($row[0]);
$row[0] = tab2space($row[0]);

echo "<html><pre>".$row[0]."</pre></html>";

?>
