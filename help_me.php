<?php

include_once("auth.php");
include_once("detail_lib.php");

if (!$_GET["sched"]) { die("No Assignment Requested"); }

// each time you hit this page, you toggle help me on or off...

$val = help_me_query($user_id, $_GET["sched"]);

//echo $val;

if($val == 0) {
	helpme_viewed_update($user_id, $_GET["sched"], 1);
} else {
	helpme_viewed_update($user_id, $_GET["sched"], 0);
}

echo '<html><meta http-equiv="refresh" content="0;url=detail_root.php?sched='.$_GET["sched"].'" /></html>';

?>
