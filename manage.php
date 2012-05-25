<?php

include_once("auth.php");
include_once("header.php");
include_once("time.php");

if($role==0) {

$sql = 'select count(*) from users';

$result = mysql_query($sql);
$row = mysql_fetch_row($result);
$user_count = $row[0];


$sql = 'select count(*), max(timeposted) from schedule';

$result = mysql_query($sql);
$row = mysql_fetch_row($result);
$assignment_count = $row[0];
if($assignment_count == 0) {
	$assignment_max = "Never";
	$assignment_time = "Never";
} else {
	$assignment_max = $row[1];
	$assignment_time = absHumanTiming($assignment_max);
}

$sql ='select count(*), max(timeposted) from comments';

$result = mysql_query($sql);
$row = mysql_fetch_row($result);
$comment_count = $row[0];
if($comment_count == 0) {
	$comment_max = "Never";
	$comment_time = "Never";
} else {
	$comment_max = $row[1];
	$comment_time = absHumanTiming($comment_max);
}


$sql = 'select count(*), max(timeposted) from filecom';

$result = mysql_query($sql);
$row = mysql_fetch_row($result);
$filecomm_count = $row[0];
if($filecomm_count == 0) {
	$filecomm_max = "Never";
	$filecomm_time = "Never";
} else {
	$filecomm_max = $row[1];
	$filecomm_time = absHumanTiming($filecomm_max);
}


$sql = 'select count(*), max(time_post) from files';

$result = mysql_query($sql);
$row = mysql_fetch_row($result);
$file_count = $row[0];
if($file_count == 0) {
	$file_max = "Never";
	$file_time = "Never";
} else {
	$file_max = $row[1];
	$file_time = absHumanTiming($file_max);
}

$file_max = $row[1];

$sql = 'select count(*) from users where attempts > 100';

$result = mysql_query($sql);
$row = mysql_fetch_row($result);
$std_locked = $row[0];

			// ADIMINISTRATOR MENU
?>
<div class="col2">

	<table>
		<tr><td><img src="gfx/rss.png"></td><td class="link_header">Feeds</td></tr>
		<tr><td></td><td><a href="comment_feed.php">Full Comments</a></td></tr>
		<tr><td></td><td><a href="assignment_feed.php">Assignments Modified</a></td></tr>
	</table>
	<br><br>
	<table>
		<tr><td><img src="gfx/report.png"></td><td class="link_header">Assignments</td></tr>
		<tr><td></td><td><a href="assignment_add.php">Add New Assignment</a></td></tr>
	</table>
	<br><br>
	<table>
		<tr><td><img src="gfx/user_female.png"></td><td class="link_header">Users</td></tr>
		<tr><td></td><td><a href="enrollment.php">Enrollment Manager</a></td></tr>
		<tr><td></td><td><a href="enrollment_new.php">New Enrollment</a></td></tr>
		<tr><td></td><td><a href="password_change.php">Change Personal Password</a></td></tr>
		<tr><td></td><td><a href="password_change_user.php">Change User Password</a></td></tr>
	</table>
	<br><br>
	<table>
		<tr><td><img src="gfx/cog.png"></td><td class="link_header">Workflows</td></tr>
		<tr><td></td><td><a href="index.php">Comments From Students</a></td></tr>
		<tr><td></td><td><a href="workflow_comments.php">Most Recent Comments</a></td></tr>
		<tr><td></td><td><a href="workflow_ungraded.php">Assignments Ready For Grading</a></td></tr>
	</table>
	<br><br>
	<table>
		<tr><td><img src="gfx/database.png"></td><td class="link_header">System Admin</td></tr>
		<tr><td></td><td><a href="adminer.php">SQL Admin</a></td></tr>
	</table>
</div>
<div class="col">
	<table class="gridtable">
	<tr><th>Stat</th><th>Value</th><th>Human Time</th><th>Last Updated</th></tr>
	<tr><td>Files:</td><td><?php echo $file_count; ?></td><td><?php echo $file_time; ?></td><td><?php echo $file_time; ?></td></tr>
	<tr><td>File Comments:</td><td><?php echo $filecomm_count; ?></td><td><?php echo $filecomm_time; ?></td><td><?php echo $filecomm_max; ?></td></tr>
	<tr><td>Comments:</td><td><?php echo $comment_count; ?></td><td><?php echo $comment_time; ?></td><td><?php echo $comment_max; ?></td></tr>
	<tr><td>Assignments:</td><td><?php echo $assignment_count; ?></td><td><?php echo $assignment_time; ?></td><td><?php echo $assignment_max; ?></td></tr>
	<tr><td>Users:</td><td colspan=3><?php echo $user_count; ?></td></tr>
	<tr><td>Users Locked:</td><td colspan=3><?php echo $std_locked; ?></td></tr>
	<tr><td>Current Time:</td><td colspan=3><?php echo date("F d, Y h:i" ,time()); ?></td></tr>
	</table>
</div>
<?php

} else {		// STUDENT MENU


$sql = 'select count(*), max(time_post) from files where user_id = '.$user_id;

$result = mysql_query($sql);
$row = mysql_fetch_row($result);
$file_count = $row[0];
if($file_count == 0) {
	$file_max = "Never";
	$file_time = "Never";
} else {
	$file_max = $row[1];
	$file_time = absHumanTiming($file_max);
}

$sql ='select count(*), max(timeposted) from comments where user_id = '.$user_id;

$result = mysql_query($sql);
$row = mysql_fetch_row($result);
$comment_count = $row[0];
if($comment_count == 0) {
	$comment_max = "Never";
	$comment_time = "Never";
} else {
	$comment_max = $row[1];
	$comment_time = absHumanTiming($comment_max);
}

$sql = 'select count(*), max(timeposted) from filecom where user_id = '.$user_id;

$result = mysql_query($sql);
$row = mysql_fetch_row($result);
$filecomm_count = $row[0];
if($filecomm_count == 0) {
	$filecomm_max = "Never";
	$filecomm_time = "Never";
} else {
	$filecomm_max = $row[1];
	$filecomm_time = absHumanTiming($filecomm_max);
}

?>
<div class="col2">
	<table>
		<tr><td><img src="gfx/rss.png"></td><td class="link_header">Feeds</td></tr>
		<tr><td></td><td><a href="comment_feed.php">Full Comments</a></td></tr>
		<tr><td></td><td><a href="assignment_feed.php">Assignments Modified</a></td></tr>
	</table>
	<br><br>
	<table>
		<tr><td><img src="gfx/world_link.png"></td><td class="link_header">Links</td></tr>
		<tr><td></td><td><a href="password_change.php">Change Password</a></td></tr>
	</table>
</div>
<div class="col">
	<table class="gridtable">
	<tr><th>Stat</th><th>Count</th><th>Human Time</th><th>Last Updated</th></tr>
	<tr><td>Files:</td><td><?php echo $file_count; ?></td><td><?php echo $file_time; ?></td><td><?php echo $file_max; ?></td></tr>
	<tr><td>File Comments:</td><td><?php echo $filecomm_count; ?></td><td><?php echo $filecomm_time; ?></td><td><?php echo $filecomm_max; ?></td></tr>
	<tr><td>Comments:</td><td><?php echo $comment_count; ?></td><td><?php echo $comment_time; ?></td><td><?php echo $comment_max; ?></td></tr>
	</table>
</div>

<?php } ?>
