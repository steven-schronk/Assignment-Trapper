<?php

header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if($user_id != '') {
	if($role == 0) {
		$menu = '<ul>
				<li><a href="javascript:void(0);" target="_blank" onClick="window.open(\'im.php\', \'Chat Room\', \'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=700,height=400,left = 310,top = 275\');">Chat</a></li>
				<li><a href=#>Chat Log</a>
        		<li><a href="classes.php">Classes</a></li>
				<li><a href="#">Discussion Board</a></li>
				<li><a href="index.php">Messages</a></li>
			    <li><a href="manage.php">Manage Accounts</a></li>
				<li><a href="#">Search</a></li>
			</ul><div class="login_menu">'.$_COOKIE["username"].'&nbsp;&nbsp;&nbsp;&nbsp;<button class="logout_button" onClick="logout();">Logout</button></div>';
	} else {
		$menu = '<ul>
				<li><a href="javascript:void(0);" target="_blank" onClick="window.open(\'im.php\', \'Chat Room\', \'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=700,height=400,left = 310,top = 275\');">Chat</a></li>
				<li><a href=#>Chat Log</a>
        		<li><a href="classes.php">Classes</a></li>
				<li><a href="#">Discussion Board</a></li>
				<li><a href="index.php">Messages</a></li>
			    <li><a href="manage.php">Manage Account</a></li>
				<li><a href="#">Search</a></li>
			</ul><div class="login_menu">'.$_COOKIE["username"].'&nbsp;&nbsp;&nbsp;&nbsp;<button class="logout_button" onClick="logout();">Logout</button></div>';
	}
} else {
	$menu = '';
}

?>

<html>
<head>
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
</head>
<body onload="sh_highlightDocument();">

<div class="main_menu"><?php echo $menu; ?></div><br>
<table><tr><td><img src="gfx/bricks.png"></td><td class="banner_header">Assignment Trapper</td></tr></table>
<br>

