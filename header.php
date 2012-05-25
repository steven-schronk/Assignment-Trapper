<?php

if($user_id != '') {
	if($role == 0) { 
		$menu = '<a href="index.php">Classes</a> | <a href="manage.php">Manage Accounts</a> | <a href="workflow.php">Workflows</a> | '.$_COOKIE["username"].' | <a href="#" onClick="logout();">Logout</a>';
	} else {
		$menu = '<a href="index.php">Classes</a> | <a href="manage.php">Manage Account</a> | '.$_COOKIE["username"].' | <a href="#" onClick="logout();">Logout</a>';
	}
} else {
	$menu = '';
}

?>

<html>
<script type="text/javascript" src="ajax.js"></script>
<script type="text/javascript" src="debugger.js"></script>
<script type="text/javascript" src="general.js"></script>
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" type="text/css" media="all" href="include/calendar.css" title="win2k-cold-1" />

<script type="text/javascript" src="sh_main.js"></script>
<script type="text/javascript" src="sh_cpp.js"></script>
<link type="text/css" rel="stylesheet" href="sh_ide-eclipse.css">

<script type="text/javascript" src="include/calendar.js"></script>
<script type="text/javascript" src="include/position.js"></script>
<script type="text/javascript" src="include/calendar-en.js"></script>
<script type="text/javascript" src="include/calendar-setup.js"></script>

<body onload="sh_highlightDocument();">

<h2><img src="gfx/bricks.png">Assignment Trapper</h2>
<div class="header">
	<div class="menu">
		<?php echo $menu; ?>
	</div>
</div>

<br>

