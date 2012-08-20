<?php
include_once("auth.php");
if (!$_GET["message"]) { die("No Chat Message Sent"); }
$_GET["message"] = mysql_real_escape_string($_GET["message"]);
$sql = 'insert into chat values ("", '.$user_id.', "'.$_GET["message"].'", NOW())';
$result = mysql_query($sql);
echo $sql;
?>
