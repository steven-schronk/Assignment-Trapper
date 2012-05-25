<?php

include_once("auth.php");
//include_once("header.php");

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

// send message to user as reciept of file

$uid = md5(uniqid(time()));

/*
$from_name = "Assignment Trapper";
$from_mail = "noreply@opentextbook.info";

$message  = "Comment about Assignment<br><br>";
$message .= '<a href=http://opentextbook.info/at/detail_root.php?sched='.$_GET["sched"].'>Click Here</a> to view.';

$header = "From: ".$from_name." <".$from_mail.">\r\n";
$header .= "Reply-To: ".$replyto."\r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
$header .= "This is a multi-part message in MIME format.\r\n";
$header .= "--".$uid."\r\n";
$header .= "Content-type:text/html; charset=iso-8859-1\r\n";
$header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
$header .= $message;

//mail($user_email, "Comment About Assignment", "", $header);
mail("steven.schronk@my.tccd.edu", "Comment About Assignment", "", $header);

*/

//echo "<br>".$header."<br>";

//echo "Data Posted Sucessfully<br><br>";

//echo 'Click <a href=detail_root.php?sched='.$_GET["sched"].'>Here</a> To Return to Assignment Details';

//echo '<html><meta http-equiv="refresh" content="5;detail_root.php?sched='.$_GET["sched"].'" /></html>';
echo '<html><meta http-equiv="refresh" content="0;url=detail_root.php?sched='.$_GET["sched"].'" /></html>';

}

?>
