<?php

function need_help($user_id, $sched_id)
{
	if(!isset($user_id)) { return -1; }

	$sql = 'select help_me from sched_details where user_id = '.$user_id.' and sched_id = '.$sched_id;
	$result = mysql_query($sql);
	
	if (!$result) { die("SQL ERROR"); }

	$row = mysql_fetch_array($result);

	return $row[0];
}

function file_count($user_id, $sched_id)
{
	if(!isset($user_id)) { return -1; }
	$sql = 'select count(*) from files where user_id = '.$user_id.' and sched_id = '.$sched_id;
	$result = mysql_query($sql);
	
	if (!$result) { die("SQL ERROR"); }

	$row = mysql_fetch_array($result);

	return $row[0];
}

function file_late($file_id)
{
	$sql = 'select due_date - time_post as late from files, schedule where (files.sched_id = schedule.sched_id) and file_id ='.$file_id;

	$result = mysql_query($sql);

	if (!$result) { die("SQL ERROR: File Details For File Late"); }

	$row = mysql_fetch_array($result);

	if($row['late'] < 0) return true;

	return false;
}

function assignment_late($user_id, $sched_id)
{
	if(!isset($user_id)) { return -1; }
	$sql = 'select late from sched_details where user_id = '.$user_id.' and sched_id = '.$sched_id;
	$result = mysql_query($sql);

	if (!$result) { die("SQL ERROR"); }

	$row = mysql_fetch_array($result);

	return $row[0];
}

?>
