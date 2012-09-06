<?php

include_once("auth.php");
include_once("header.php");
include_once("time.php");
include_once("detail_lib.php");
include_once("user_details.php");

// files that have been line commented by faculty
if($role == 0) { // faculty sees list of students names and assignments

	//$sql = 'select sched_id, title, type_name,  chapter, section_id, ava_date, due_date, graded, NOW()-due_date as due, NOW()-ava_date as ava from schedule, types where (schedule.assign_type = types.assign_type) and sched_id = ANY (select sched_id from sched_details where fac_viewed = 0 or help_me != 0 and user_id = '.$user_id.' group by sched_id) order by due_date desc, ava_date desc, title desc, chapter desc, section_id desc';

	$sql ='select sched_details.sched_id, schedule.title, schedule.chapter, schedule.section_id, sched_details.user_id, users.name, help_me, sched_details.timeposted, late, NOW()-due_date as due, NOW()-ava_date as ava, graded from sched_details, schedule, users where (sched_details.sched_id = schedule.sched_id) and (sched_details.user_id = users.user_id) and (fac_viewed = 0 or help_me != 0) group by sched_id order by help_me desc, sched_details.timeposted limit 50';

	$html = '<table class="gridtable">
			<tr>
				<th>#</th><th>Stauts</th><th>Student</th><th>Title</th><th>Chapter</th><th>Section</th>
				<th>Posted</th><th>Human Time</th><th>Mark<br>As<br>Read</th>
			</tr>';

} else { // students see list of assignments
	//$sql = 'select sched_id, title, type_name,  chapter, section_id, graded, timeposted from schedule, types where (schedule.assign_type = types.assign_type) and sched_id = ANY (select sched_id from sched_details where user_viewed = 0 and user_id = '.$user_id.' group by sched_id) order by due_date desc, ava_date desc, title desc, chapter desc, section_id desc';

	$sql ='select sched_details.sched_id, schedule.title, schedule.chapter, schedule.section_id, sched_details.user_id, users.name, help_me, sched_details.timeposted,  late, NOW()-due_date as due, NOW()-ava_date as ava, graded from sched_details, schedule, users where (sched_details.sched_id = schedule.sched_id) and (sched_details.user_id = users.user_id) and (user_viewed = 0 and sched_details.user_id = '.$user_id.') group by sched_id order by help_me desc, sched_details.timeposted limit 50';

	$html = '<table class="gridtable">
			<tr>
				<th>#</th><th>Status</th><th>Title</th><th>Type</th><th>Chapter</th><th>Section</th>
				<th>Posted</th><th>Human Time</th><th>Mark<br>As<br>Read</th>
			</tr>';
}

//echo $sql;

$result = mysql_query($sql);

if (!$result) { die("SQL ERROR"); }
$count = 0;
while($row = mysql_fetch_array($result))
{
	$random = rand();
	$random .= time();
	if($role == 0) {
		$html .= '<tr><td>'.$row['sched_id'].'</td>';
		// assignment open?
		if($row['due'] > 0 || $row['ava'] < 0) { $html .= "<td><img src=gfx/bullet_delete.png>"; } else { $html .= "<td><img src=gfx/bullet_add.png>"; }


//		if($row[8] > 0 || $row[10] < 0) { $html .= "<td><img src=gfx/bullet_delete.png>"; } else { $html .= "<td><img src=gfx/bullet_add.png>"; }
	

		// assignment graded?
		if($row['graded']) { $html .= "<img src=gfx/bullet_disk.png>"; } else { $html .= "<img src=gfx/bullet_wrench.png>"; }

		if($row['help_me']) { $html .= '<img src=gfx/flag_red.png>'; } else { $html .= '<img src=gfx/flag_white.png>'; }

		//$html .= $help_icon;

		if($row['late']) {
			$html .= '<img src=gfx/tick_off.png>';
		} else {
			if(file_count($row['user_id'], $row['sched_id'])) {
				$html .= '<img src=gfx/star.png>';
				} else { $html .= '<img src=gfx/error.png>'; }
		}

		$html .= '<a href="discussion.php?sched='.$row['sched_id'].'"><img src="./gfx/comments_small.png"></a></td>';

		$html .= '<td>'.$row['name'].'</td>';

		$html .= '<td><a href="detail_root.php?sched='.$row['sched_id'].'&user='.$row['user_id'].'">'.$row['title'].'</a></td><td>'.$row['chapter'].'</td>';

		$html .= '<td>'.$row['section_id'].'</td><td>'.$row['timeposted'].'</td>';

		$html .= '<td>'.absHumanTiming($row['timeposted']).'</td>';

		$html .= '<td><a href="index.php?sched='.$row['sched_id'].'&user='.$row['user_id'].'&action=mark&random='.$random.'">Mark as Read</a></td>';

		$html .= '</tr>';

	} else {
		$html .= '<tr><td>'.$row['sched_id'].'</td>';

		// assignment open?
		if($row['due'] > 0 || $row['ava'] < 0) { $html .= "<td><img src=gfx/bullet_delete.png>"; } else { $html .= "<td><img src=gfx/bullet_add.png>"; }

		// assignment graded?
		if($row['graded']) { $html .= "<img src=gfx/bullet_disk.png>"; } else { $html .= "<img src=gfx/bullet_wrench.png>"; }

		if($row['help_me']) { $html .= '<img src=gfx/flag_red.png>'; } else { $html .= '<img src=gfx/flag_white.png>'; }

		//$html .= $help_icon;

		if($row['late']) {
			$html .= '<img src=gfx/tick_off.png>';
		} else {
			if(file_count($user_id, $row['sched_id'])) {
				$html .= '<img src=gfx/star.png>';
				} else { $html .= '<img src=gfx/error.png>'; }
		}

		$html .= '<a href="discussion.php?sched='.$row['sched_id'].'"><img src="./gfx/comments_small.png"></a></td>';

		$html .= '<td><a href="detail_root.php?sched='.$row['sched_id'].'">'.$row['title'].'</a></td><td>'.$row['type_name'].'</td><td>'.$row['chapter'].'</td>';

		$html .= '<td>'.$row['section_id'].'</td><td>'.$row['timeposted'].'</td>';

		$html .= '<td>'.absHumanTiming($row['timeposted']).'</td>';

		$html .= '<td><a href="index.php?sched='.$row['sched_id'].'&action=mark&random='.$random.'">Mark as Read</a></td>';

		$html .= '</tr>';
	}
	$count++;
}

if($count == 0) { $html = "<center><h3>No New Messages At This Time</h3></center>"; }

// set assignment to graded if link on page is clicked
if(isset($_GET['action']) && isset($_GET['sched']))
{
	if($role == 0) {
		detail_viewed_update($_GET['user'], $_GET['sched'], 1, "fac");
		helpme_viewed_update($_GET['user'], $_GET['sched'], 0);
	} else {
		detail_viewed_update($user_id, $_GET['sched'], 1, "std");
	}
	echo '<html><meta http-equiv="refresh" content="0;url=index.php" /></html>';
	exit();
}
?>

<h3>Recent Assignment Messages</h3>

	<?php echo $html; ?>
	<?php if($count > 0) { include("legend.php"); } ?>
</table>



