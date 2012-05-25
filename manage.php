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
$assignment_max = $row[1];

$sql ='select count(*), max(timeposted) from comments';

$result = mysql_query($sql);
$row = mysql_fetch_row($result);
$comment_count = $row[0];
$comment_max = $row[1];

$sql = 'select count(*), max(timeposted) from filecom';

$result = mysql_query($sql);
$row = mysql_fetch_row($result);
$filecomm_count = $row[0];
$filecomm_max = $row[1];

$sql = 'select count(*), max(time_post) from files';

$result = mysql_query($sql);
$row = mysql_fetch_row($result);
$file_count = $row[0];
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
	<tr><td>Files:</td><td><?php echo $file_count; ?></td><td><?php echo absHumanTiming($file_max); ?></td><td><?php echo $file_max; ?></td></tr>
	<tr><td>File Comments:</td><td><?php echo $filecomm_count; ?></td><td><?php echo absHumanTiming($filecomm_max); ?></td><td><?php echo $filecomm_max; ?></td></tr>
	<tr><td>Comments:</td><td><?php echo $comment_count; ?></td><td><?php echo absHumanTiming($comment_max); ?></td><td><?php echo $comment_max; ?></td></tr>
	<tr><td>Assignments:</td><td><?php echo $assignment_count; ?></td><td><?php echo absHumanTiming($assignment_max); ?></td><td><?php echo $assignment_max; ?></td></tr>
	<tr><td>Users:</td><td colspan=3><?php echo $user_count; ?></td></tr>
	<tr><td>Users Locked:</td><td colspan=3><?php echo $std_locked; ?></td></tr>
	<tr><td>Current Time:</td><td colspan=3><?php echo date("F d, Y h:i" ,time()); ?></td></tr>
	</table>
</div>
<?php

} else {		// STUDENT MENU

?>
			<h3>Feeds:</h3>

			<img src="gfx/rss.png"><a href="comment_feed.php">Full Comments</a><br>
			<img src="gfx/rss.png"><a href="assignment_feed.php">Assignments Modified</a>

			<h3>Links:</h3>
			<a href="password_change.php">Change Password</a><br>
		

<?php } ?>
