<?php

include_once("auth.php");

include_once("time.php");

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

$sql = "select chapter, section_id, title, class_id, schedule.assign_type, ava_date, due_date, sched_id, NOW()-due_date as due, type_name, NOW()-ava_date as ava, due_date from schedule, types where (schedule.assign_type = types.assign_type) and class_id=". $_GET['class']." order by due_date desc, ava_date desc";

$result = mysql_query($sql);

//echo $sql;

if (!$result) { die("SQL ERROR"); }
$i = 1;
while($row = mysql_fetch_row($result))
{
	$html .= '<tr><td>'.$i.'</td>';
	//$html .= '<tr><td>'.$row[10].'</td>';

	if($row[8] > 0 || $row[10] < 0) { $html .= "<td><img src=gfx/bullet_delete.png></td>"; } else { $html .= "<td><img src=gfx/bullet_add.png></td>"; }

	if($role == 0 ) { 
		$html .= '<td><a href="detail_root.php?sched='.$row[7].'">'.$row[2].'</a></td><td>'.$row[9].'</td><td>'.$row[0].'</td>';
	} else {
		$html .= '<td><a href="detail_root.php?sched='.$row[7].'">'.$row[2].'</a></td><td>'.$row[9].'</td><td>'.$row[0].'</td>';
	}

	$html .= '<td>'.$row[1].'</td><td>'.$row[5].'</td><td>'.$row[6].'</td>';

	$html .= '<td>'.absHumanTiming($row[11]).'</td>';

	if($role==0) { $html .= '<td><a href="assignment_add.php?sched='.$row[7].'&action=edit">Edit</a></td>'; }

	$html .= '</tr>';
	$i++;
}

?>

<h3><?php echo $breadcrumb; ?> -> All Assignments</h3>

<table class="gridtable">
	<tr>
		
			<th>#</th><th>Status</th><th>Title</th><th>Type</th><th>Chapter</th><th>Section</th><th>Avalaible Date</th><th>Due Date</th><th>Human Time</th>
		<?php if($role==0) { echo '<th>Update</th>'; } ?>
	</tr>
	<?php echo $html; ?>
</table>



