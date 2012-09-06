<?php

include_once("auth.php");
include_once("header.php");
include_once("time.php");
include_once("user_details.php");

if(!isset($_GET["class"])) { die("No Class ID Sent"); }

/* get class info */

$class = "";

$_GET["class"] = mysql_real_escape_string($_GET["class"]);

$sql = "select class_name, class_id from class where class_id =". $_GET['class'];

$result = mysql_query($sql);

if (!$result) { die("SQL ERROR"); }

$row = mysql_fetch_array($result);

$breadcrumb =  '<a href=assignment.php?class='.$row['class_id'].'>'.$row['class_name'].'</a>&nbsp;';

/* get list of assignments */
$html = "";

if($role == 0) {
	$sql = "select chapter, section_id, title, class_id, schedule.assign_type, ava_date, due_date, sched_id, NOW()-due_date as due, type_name, NOW()-ava_date as ava, due_date, graded from schedule, types where (schedule.assign_type = types.assign_type) and class_id=". $_GET['class']." order by due_date desc, ava_date desc, title, chapter, section_id, schedule.assign_type";

} else {

	$sql = "select chapter, section_id, title, class_id, schedule.assign_type, ava_date, due_date, sched_id, NOW()-due_date as due, type_name, NOW()-ava_date as ava, due_date, graded from schedule, types where (schedule.assign_type = types.assign_type) and class_id=". $_GET['class']." and NOW()-ava_date > 0 order by due_date desc, ava_date desc, title, chapter, section_id, schedule.assign_type";

	//$sql = "select chapter, section_id, title, class_id, schedule.assign_type, ava_date, due_date, schedule.sched_id, NOW()-due_date as due, type_name, NOW()-ava_date as ava, due_date, graded, help_me from schedule, types, sched_details where (schedule.assign_type = types.assign_type) and (sched_details.sched_id = schedule.sched_id) and class_id=". $_GET['class']." and NOW()-ava_date > 0 order by due_date desc, ava_date desc, title, chapter, section_id, schedule.assign_type";

	//$sql = "select chapter, section_id, title, class_id, schedule.assign_type, ava_date, due_date, schedule.sched_id, NOW()-due_date as due, type_name, NOW()-ava_date as ava, due_date, graded, help_me from schedule LEFT JOIN sched_details on (sched_details.sched_id = schedule.sched_id), types  where schedule.sched_id = ANY (select sched_id from schedule where class_id = ". $_GET['class'].") and (schedule.assign_type = types.assign_type)order by due_date desc, ava_date desc, title, chapter, section_id, schedule.assign_type";

}

$result = mysql_query($sql);

//echo $sql;

if (!$result) { die("SQL ERROR"); }
while($row = mysql_fetch_row($result)){
	$html .= "\n<tr><td>".$row[7]."</td>";

	// assignment started?
	if($row[10] < 0){
		$html .= "<td><img src=gfx/bullet_black.png>";
		$started = false;
	} else {
		// assignment open?
		if($row[8] > 0 || $row[10] < 0) { $html .= "<td><img src=gfx/bullet_delete.png>"; } else { $html .= "<td><img src=gfx/bullet_add.png>"; }
		$started = true;
	}

	// assignment graded?
	if($row[12]) { $html .= "<img src=gfx/bullet_disk.png>"; } else { $html .= "<img src=gfx/bullet_wrench.png>"; }

	if($role != 0 ) {

		if(need_help($user_id, $row[7])) {
			$html .= '<img src=gfx/flag_red.png>';
		} else { $html .= '<img src=gfx/flag_white.png>'; }

		if(assignment_late($user_id, $row[7])) {
			$html .= '<img src=gfx/tick_off.png>';
		} else {
			if(file_count($user_id, $row[7])) {
				$html .= '<img src=gfx/star.png>';
			} else { $html .= '<img src=gfx/error.png>'; }
		}
	}

	$html .= '<a href="discussion.php?sched='.$row[7].'"><img src="./gfx/comments_small.png"></a></td>';

	if($role == 0 ) {
		$html .= '<td><a href="detail_root.php?sched='.$row[7].'">'.$row[2].'</a></td><td>'.$row[9].'</td><td>'.$row[0].'</td>';
	} else {
		$html .= '<td><a href="detail_root.php?sched='.$row[7].'">'.$row[2].'</a></td><td>'.$row[9].'</td><td>'.$row[0].'</td>';
	}

	$html .= '<td>'.$row[1].'</td><td>'.$row[5].'</td><td>'.$row[6].'</td>';

	if($started) {
		$html .= '<td>'.absHumanTiming($row[11]).'</td>';
	} else {
		$html .= '<td>'.absHumanTiming($row[5]).'</td>';
	}

	if($role==0) { $html .= '<td><a href="assignment_add.php?sched='.$row[7].'&action=edit">Edit</a></td>'; }

	$html .= '</tr>';
}

?>

<h3><?php echo $breadcrumb; ?> -> All Assignments</h3>

<table class="gridtable">
	<tr>
			<th>#</th><th>Status</th><th>Title</th><th>Type</th><th>Chapter</th><th>Section</th><th>Avalaible Date</th><th>Due Date</th><th>Human Time</th>
		<?php if($role==0) { echo '<th>Update</th>'; } ?>
	</tr>
	<?php echo $html; ?>
	<?php include("legend.php"); ?>

</table>



