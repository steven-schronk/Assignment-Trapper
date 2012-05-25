<?php

include_once("auth.php");

$html = "";

$user_id = mysql_real_escape_string($user_id);

$sql = 'select distinct class.class_id, class_name, class_section, class_location, class_instructor from enrollment, class, users where (users.user_id = enrollment.user_id) and (enrollment.class_id = class.class_id) and enrollment.user_id = '.$user_id;

$result = mysql_query($sql);

if (!$result) { die("SQL ERROR"); }

while($row = mysql_fetch_row($result))
{
	//$html .= '<tr><td><a href=assignment.php?class='.$row[0].'>'.$row[1].'</a></td><td>'.$row[2].'</td>';
	//$html .= '<td>'.$row[3].'</td><td>'.$row[4].'</td></tr>';

	$html .= '<div class="class_block">';
	$html .= '<h3><img src=gfx/house.png><a href=assignment.php?class='.$row[0].'>'.$row[1].'</a></h3>';
	$html .= '<table><tr><td>Section:</td><td>'.$row[2].'</td></tr>';
	$html .= '<tr><td>Location:</td><td>'.$row[3].'</td></tr>';
	$html .= '<tr><td>Instructor:</td><td>'.$row[4].'</td></tr>';
	$html .= '</table></div>';
}

echo $html;

?>
