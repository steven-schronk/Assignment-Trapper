<?php

include_once("auth.php");

$html = "";

$sql = "select * from class";

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
