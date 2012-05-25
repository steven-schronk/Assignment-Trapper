<?php

include_once("auth.php");

if($role==0) {

$sql = 'select count(*) from users';

$result = mysql_query($sql);

$row = mysql_fetch_row($result);

$user_count = $row[0];


$sql = 'select count(*) from schedule';

$result = mysql_query($sql);

$row = mysql_fetch_row($result);

$assignment_count = $row[0];


$sql = 'select count(*) from comments';

$result = mysql_query($sql);

$row = mysql_fetch_row($result);

$comment_count = $row[0];


$sql = 'select count(*) from filecom';

$result = mysql_query($sql);

$row = mysql_fetch_row($result);

$filecomm_count = $row[0];


$sql = 'select count(*) from files';

$result = mysql_query($sql);

$row = mysql_fetch_row($result);

$file_count = $row[0];

?>
			<div class="col2">
			<h3>Feeds:</h3>

			<img src="gfx/rss.png"><a href="comment_feed.php">Full Comments</a><br>
			<img src="gfx/rss.png"><a href="assignment_feed.php">Assignments Modified</a>

			<h3>Links:</h3>
			<a href="assignment_add.php">Add New Assignment</a><br>
			<a href="enrollment.php">Enrollment Manager</a><br>
			<a href="enrollment_new.php">New Enrollment</a><br>
			<a href="password_change.php">Change Password</a><br>
			</div>
			<div class="col1">
				<table>
					<tr><td>Users:</td><td><?php echo $user_count; ?></td></tr>
					<tr><td>Assignments:</td><td><?php echo $assignment_count; ?></td></tr>
					<tr><td>File Count:</td><td><?php echo $file_count; ?></td></tr>
					<tr><td>Comments:</td><td><?php echo $comment_count; ?></td></tr>
					<tr><td>Line Comments:</td><td><?php echo $filecomm_count; ?></td></tr>
				</table>
			</div>
<?php

} else {

?>
			<h3>Feeds:</h3>

			<img src="gfx/rss.png"><a href="comment_feed.php">Full Comments</a><br>
			<img src="gfx/rss.png"><a href="assignment_feed.php">Assignments Modified</a>

			<h3>Links:</h3>
			<a href="password_change.php">Change Password</a><br>
		

<?php } ?>
