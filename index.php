<?php

include_once("auth.php");
include_once("header.php");
include_once("time.php");

// files that have been line commented by faculty
$sql = 'select sched_id, title, type_name,  chapter, section_id, ava_date, due_date, graded, NOW()-due_date as due, NOW()-ava_date as ava from schedule, types where (schedule.assign_type = types.assign_type) and sched_id = ANY (select sub_id from comments where fac_id is NOT NULL and user_id = '.$user_id.' group by sub_id) order by due_date desc, ava_date desc, title desc, chapter desc, section_id desc';

//echo $sql;

$result = mysql_query($sql);

if (!$result) { die("SQL ERROR"); }
$html = "";
while($row = mysql_fetch_array($result))
{	
	$html .= '<tr><td>'.$row['sched_id'].'</td>';
	//$html .= '<tr><td>'.$row[10].'</td>';

	// assignment open?
	if($row['due'] > 0 || $row['ava'] < 0) { $html .= "<td><img src=gfx/bullet_delete.png>"; } else { $html .= "<td><img src=gfx/bullet_add.png>"; }

	// assignment graded?
	if($row['graded']) { $html .= "<img src=gfx/bullet_disk.png>"; } else { $html .= "<img src=gfx/bullet_wrench.png>"; }

	$html .= '<img src=gfx/email.png></td>';

	$html .= '<td><a href="detail_root.php?sched='.$row['sched_id'].'">'.$row['title'].'</a></td><td>'.$row['type_name'].'</td><td>'.$row['chapter'].'</td>';

	$html .= '<td>'.$row['section_id'].'</td><td>'.$row['ava_date'].'</td><td>'.$row['due_date'].'</td>';

	$html .= '<td>'.absHumanTiming($row['due_date']).'</td>';

	//if($role==0) { $html .= '<td><a href="assignment_add.php?sched='.$row[7].'&action=edit">Edit</a></td>'; }

	$html .= '</tr>';
}

// list of assignments with comments by faculty.

//$sql = "";

// list of recently graded assignments - most recent first
$sql = "select sched_id, title, chapter, section_id from schedule where graded = 1 and class_id =2 order by due_date, ava_date, title, chapter, section_id;";

?>

<h3>Recent Assignment Comments</h3>

<table class="gridtable">
	<tr>
			<th>#</th><th>Status</th><th>Title</th><th>Type</th><th>Chapter</th><th>Section</th><th>Avalaible Date</th><th>Due Date</th><th>Human Time</th>
		<?php if($role==0) { echo '<th>Update</th>'; } ?>
	</tr>
	<?php echo $html; ?>
</table>



