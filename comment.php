<?php

include_once("auth.php");

if (!$_GET["comment"]) { die("No Comment Sent");     }
if (!$_GET["sched"])   { die("No Schedule ID Sent"); }

if($_GET["comment"] == "") { die("Comment Must Not Be Empty"); }

$sql = 'insert into comments values("", '.$user_id.', '.$_GET["sched"].', "'.$_GET["comment"].'", NOW())';

echo $sql;


$result = mysql_query($sql);

if (!$result) { die("SQL ERROR"); } else { echo "Data Posted Sucessfully"; }

?>
