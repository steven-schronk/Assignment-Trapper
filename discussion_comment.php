<?php

include_once("auth.php");
include_once("header.php");

if(!isset($_POST['comment'])) { die("Must Send Comment"); } else { $_POST['comment'] = mysql_real_escape_string($_POST['comment']); }

if(isset($_GET['sched'])) {
	$_GET['sched'] = mysql_real_escape_string($_GET['sched']);
	$sql = 'insert into discussion_post values ("",'.$user_id.',"",'.$_GET['sched'].',"'.$_POST['comment'].'",NOW())';
	$result = mysql_query($sql);
	
	$html = '<meta HTTP-EQUIV="REFRESH" content="0; url=discussion.php?sched='.$_GET['sched'].'">';

} else if(isset($_GET['topic'])) {
	$_GET['topic'] = mysql_real_escape_string($_GET['topic']);
	$sql = 'insert into discussion_post values ("",'.$user_id.','.$_GET['topic'].',"","'.$_POST['comment'].'",NOW())';
	$result = mysql_query($sql);

	$html = '<meta HTTP-EQUIV="REFRESH" content="0; url=discussion.php?topic='.$_GET['topic'].'">';

} else { die("Must Send Topic or Assignment Number"); }

echo $html;

?>
