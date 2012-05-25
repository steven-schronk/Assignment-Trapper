<?php

include_once("auth.php");
include_once("header.php");
include_once("time.php");

if($role != 0) { die("Account \"".$user_name."\" Is Not Authorized To View This Page.<br><br>This Event Will Be Logged And Reported."); }

?>



<div class="col2">
	<h3><img src="gfx/report.png">Assignments:</h3>
		<a href="workflow_comments.php">Most Recent Comments</a><br>
		<a href="workflow_ungraded.php">Assignments Ready For Grading</a>
</div>
<div class="col1">
</div>
