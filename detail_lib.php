<?php

/*
	schedule details must have an inital record. 

	This checks for inital record and creates on if needed.
*/
function detail_init($user_id, $sched_id)
{
	if (!$user_id) { return; }
	if (!$sched_id) { return; }

	$sql = 'select count(*) as count from sched_details where sched_id = '.$sched_id.' and user_id = '.$user_id;

	//echo $sql;

	$result = mysql_query($sql);
	if (!$result) { die("SQL ERROR: Count Schedule Details"); }
	
	$row = mysql_fetch_array($result);

	if($row['count'] == 0) {

		$sql = 'insert into sched_details values ("", '.$sched_id.', '.$user_id.', 1,1,0, NOW())';

		//echo $sql;
		$result = mysql_query($sql);
		if (!$result) { die("SQL ERROR: Insert Sched Details"); }
	}
}

/*
	val: status of message

		1 = has been viewed
		0 = has not been viewed

	to: message updated for faculty or for student

		fac = faculty
		std = student
*/
function detail_viewed_update($user_id, $sched_id, $val, $to)
{
	detail_init($user_id, $sched_id);

	if($to == "fac") {
		$sql = 'update sched_details set fac_viewed = '.$val.' where sched_id = '.$sched_id.' and user_id = '.$user_id;
	} else if ($to == "std") {
		$sql = 'update sched_details set user_viewed = '.$val.' where sched_id = '.$sched_id.' and user_id = '.$user_id;
	} else {
		die("ERROR: Incorrect Value Sent to Detail Viewed Update");
	}
	//echo $sql;

	$result = mysql_query($sql);
	if (!$result) { die("SQL ERROR: Viewed Update"); }
}

/* toggles help me in the DB */
function helpme_viewed_update($user_id, $sched_id, $val)
{
	detail_init($user_id, $sched_id);

	$sql = 'update sched_details set help_me = '.$val.' where sched_id = '.$sched_id.' and user_id = '.$user_id;

	//echo $sql;

	$result = mysql_query($sql);
	if (!$result) { die("SQL ERROR: Viewed Update"); }	
}


function help_me_query($user_id, $sched_id)
{
	detail_init($user_id, $sched_id);
	$sql = 'select help_me from sched_details where sched_id = '.$sched_id.' and user_id = '.$user_id;

	$result = mysql_query($sql);

	//echo $sql;

	if (!$result) { die("SQL ERROR: Help Me Query"); }

	$row = mysql_fetch_array($result);

	return $row['help_me'];
}

function detail_viewed_query($user_id, $sched_id, $val)
{
	detail_init($user_id, $sched_id);
	$sql = 'select viewed from sched_details where sched_id = 29 and user_id = 15';

	$result = mysql_query($sql);
	if (!$result) { die("SQL ERROR: Viewed Query"); }

	$row = mysql_fetch_array($result);

	return $row['viewed'];
}

/*
	1 = needs help
	0 = does not need help
*/
function detail_help_update($user_id, $sched_id, $val)
{
	detail_init($user_id, $sched_id);

}

function detail_help_query($user_id, $sched_id, $val)
{
	detail_init($user_id, $sched_id);

}

?>
