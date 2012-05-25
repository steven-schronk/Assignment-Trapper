<?php

include_once("auth.php");

if($role==0) {
?>

			<h3>Feeds:</h3>

			<img src="gfx/rss.png"><a href="comment_feed.php">Full Comments</a><br>
			<img src="gfx/rss.png"><a href="assignment_feed.php">Assignments Modified</a>

			<h3>Links:</h3>
			<a href="assignment_add.php">Add New Assignment</a><br>
			<a href="enrollment.php">Enrollment Manager</a><br>
			<a href="enrollment_new.php">New Enrollment</a><br>
			<a href="password_change.php">Change Password</a><br>
<?php

} else {

?>
			<h3>Links:</h3>
			<a href="password_change.php">Change Password</a><br>
		

<?php } ?>
