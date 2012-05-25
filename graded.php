<?php

include_once("auth.php");
include_once("header.php");
include_once("time.php");

if($role != 0) { die("Account \"".$user_name."\" Is Not Authorized To View This Page.<br><br>This Event Will Be Logged And Reported."); }

// set assignment to graded if link on page is clicked
if(isset($_GET['action']) && isset($_GET['sched'])  )
{
	//echo "Update schedule";
	$sql = 'update schedule set graded = 1 where sched_id = '.$_GET['sched'];

	$result = mysql_query($sql);
}



