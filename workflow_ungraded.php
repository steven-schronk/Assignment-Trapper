<?php

include_once("auth.php");
include_once("header.php");
include_once("time.php");

if($role != 0) { die("Account \"".$user_name."\" Is Not Authorized To View This Page.<br><br>This Event Will Be Logged And Reported."); }

// all assignments who have not been graded complete with class name
$sql = "select chapter, section_id, title, schedule.class_id, class.class_name, schedule.assign_type, due_date, sched_id, type_name, due_date from schedule, types, class where (schedule.assign_type = types.assign_type) and (schedule.class_id = class.class_id) and NOW()-due_date > 0 and graded != 1 order by due_date, ava_date desc, title, chapter, section_id, schedule.assign_type";

$result = mysql_query($sql);

//echo $sql;

if (!$result) { die("SQL ERROR: Class Table"); }
$class_table  = '<table class="gridtable"><th>#</th><th>Class Name</th><th>Title</th><th>Type</th><th>Chapter</th>';
$class_table .= '<th>Section</th><th>Due Date</th><th>Human Time</th><th>Edit</th><th>Status</th>';
while($row = mysql_fetch_array($result))
{
	$class_table .= '<tr><td>'.$row['sched_id'].'</td>';
	$class_table .= '<td>'.$row['class_name'].'</td>';
	$class_table .= '<td><a href="detail_root.php?sched='.$row['sched_id'].'">'.$row['title'].'</a></td><td>'.$row['type_name'].'</td><td>'.$row['chapter'].'</td>';
	$class_table .= '<td>'.$row['section_id'].'</td><td>'.$row['due_date'].'</td>';
	$class_table .= '<td>'.absHumanTiming($row['due_date']).'</td>';
	$class_table .= '<td><a href="assignment_add.php?sched='.$row['sched_id'].'&action=edit">Edit</a></td>';
	$class_table .= '<td><a href="workflow_ungraded.php?sched='.$row['sched_id'].'&action=graded">Graded</a></td>';
	$class_table .= '</tr>';
}

$class_table .= '</table>';

// set assignment to graded if link on page is clicked
if(isset($_GET['action']) && isset($_GET['sched'])  )
{
	//echo "Update schedule";
	$sql = 'update schedule set graded = 1 where sched_id = '.$_GET['sched'];

	$result = mysql_query($sql);
}

// list of schedules that are closed and have not been graded.

	// when all students have been graded, send message to all students letting them know the item has been graded.

// flow moving from one ungraded assignment to another showing details for evaluation.

// most recent comments that have been posted from students that have not been replied to.

echo "<h3>Workflows -> Assignments Ready For Grading</h3>";

echo $class_table;

?>

