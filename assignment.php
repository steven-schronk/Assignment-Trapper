<?php

include_once("auth.php");

if(!isset($_GET["class"])) { die("No Class ID Sent"); }

/* get class info */

$class = "";

$sql = "select class_name from class where class_id =". $_GET['class'];

$result = mysql_query($sql);

if (!$result) { die("SQL ERROR"); }

while($row = mysql_fetch_row($result))
{
	$class .= $row[0];
}

/* get list of assignments */
$html = "";

$sql = "select chapter, section_id, title, class_id, schedule.assign_type, ava_date, due_date, sched_id, NOW()-due_date as status, type_name from schedule, types where (schedule.assign_type = types.assign_type) and class_id=". $_GET['class']." order by due_date desc, ava_date desc";

$result = mysql_query($sql);

//echo $sql;

if (!$result) { die("SQL ERROR"); }

while($row = mysql_fetch_row($result))
{

	$html .= '<tr>';

	if($row[8] > 0) { $html .= "<td><img src=gfx/bullet_delete.png></td>"; } else { $html .= "<td><img src=gfx/bullet_add.png></td>"; }

	$html .= '<td><a href="detail.php?sched='.$row[7].'">'.$row[2].'</a></td><td>'.$row[9].'</td><td>'.$row[0].'</td>';
	$html .= '<td>'.$row[1].'</td><td>'.$row[5].'</td><td>'.$row[6].'</td>';

	

	$html .= '</tr>';
}

?>

<h3><?php echo $class; ?> Assignments</h3>

<table border=1>
	<thead>
		<td>Status</td><td>Title</td><td>Type</td><td>Chapter</td><td>Section</td><td>Avalaible Date</td><td>Due Date</td>
	</thead>

	<?php echo $html; ?>
	<!--
	<tr>
		<td>1</td><td>2</td><td><a href="detail.php">In-Class</a></td><td>07/23/2011 12:00</td><td>07/23/2011 12:00</td><td>-</td>
	</tr>
	-->
</table>



