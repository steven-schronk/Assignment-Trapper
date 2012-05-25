<?php

include_once("auth_root.php");

if($role != 0) { die("Account \"".$user_name."\" Is Not Authorized To View This Page.<br><br>This Event Will Be Logged And Reported."); }

if (!$_GET["file_id"])  { die("No File ID Sent"); }
if (!$_GET["line_num"]) { die("No Line Number Sent"); }
if (!$_GET["comment"])  { die("No Comment Sent"); }
if ($_GET["comment"] == "")  { die("Comment of Zero Length Cannot Be Posted"); }


// insert comment contents into DB
$sql = 'insert into filecom values ("", '.$_GET["file_id"].','.$_GET["line_num"].','.$user_id.',"'.$_GET["comment"].'",NOW())';

//echo $sql;

$result = mysql_query($sql);

if (!$result) { die("SQL ERROR: File Comment Insert"); }

$html = '';
$html .= "<img src='gfx/down_arrow.png'>";

$html .= $_GET["comment"];

$html .= "<div id=comment_username>".$user_name . "</div><div id=comment_time>Now</div>";

echo $html;



?>
