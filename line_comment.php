<?php

include_once("auth_root.php");

//if($role != 0) { die("Account \"".$user_name."\" Is Not Authorized To View This Page.<br><br>This Event Will Be Logged And Reported."); }

if (!$_GET["file_id"])  { die("No File ID Sent"); }
if (!$_GET["line_num"]) { die("No Line Number Sent"); }
if (!$_GET["comment"])  { die("No Comment Sent"); }
if ($_GET["comment"] == "")  { die("Comment of Zero Length Cannot Be Posted"); }

$_GET["file_id"] = mysql_real_escape_string($_GET["file_id"]);
$_GET["line_num"] = mysql_real_escape_string($_GET["line_num"]);
//$_GET["comment"] = mysql_real_escape_string($_GET["comment"]);

//TODO: Verify that this file belongs to user if role not root...

// insert comment contents into DB
$sql = 'insert into filecom values ("", '.$_GET["file_id"].','.$_GET["line_num"].','.$user_id.','.$_GET["comment"].',NOW())';

//echo $sql;

$result = mysql_query($sql);

if (!$result) { die("SQL ERROR: File Comment Insert"); }

// strip quotes off ends of comment.
$comment = substr($_GET[comment], 1, -1);

$html = '';
$html .= "<img src='gfx/down_arrow.png'>";
$html .= "<span class=line_comment_txt>".$comment."</span>";
$html .= "<span class=line_comment_name>".$user_name."</span>";
$html .= "<span class=line_comment_time>Just Now</span>";

echo $html;

?>
