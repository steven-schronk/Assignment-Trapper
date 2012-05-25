<?php

include_once("auth.php");

if (!$_GET["comment"]) { die("No Comment Sent");     }
if (!$_GET["sched"])   { die("No Schedule ID Sent"); }

$_GET["user"] = mysql_real_escape_string($_GET["user"]);
$_GET["sched"] = mysql_real_escape_string($_GET["sched"]);
$_GET["comment"] = mysql_real_escape_string($_GET["comment"]);

// faculty must submit not only the schedule, but the user commented about as well
if($role == 0 && !$_GET["user"]) {  die("No User ID Sent"); }

if($_GET["comment"] == "") { die("Comment Must Not Be Empty"); }

if($role == 0) { // faculty comment to student
	$sql = 'insert into comments values("", '.$_GET["user"].', '.$_GET["sched"].','.$user_id.','.$role.', "'.$_GET["comment"].'", NOW())';
} else { // student comment to faculty
	$sql = 'insert into comments values("", '.$user_id.', '.$_GET["sched"].', NULL,'.$role.', "'.$_GET["comment"].'", NOW())';
}

//echo $sql;

$result = mysql_query($sql);

if (!$result) { die("SQL ERROR"); } else {

echo "Data Posted Sucessfully<br><br>";

echo 'Click <a href=detail_root.php?sched='.$_GET["sched"].'>Here</a> To Return to Assignment Details';


//echo '<html><meta http-equiv="refresh" content="0; detail.php?sched='.$_GET["sched"].'" /></html>';

}


?>
