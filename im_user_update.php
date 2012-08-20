<?php

include_once("conn.php");

/* get list of users that are currently looged in */
$sql = "select name from users where last_click > NOW()-300 order by name";

$result = mysql_query($sql);
$users_online = "";
while($row = mysql_fetch_array($result))
{
	$users_online .= '<div>'.$row['name'].'</div>';
}

echo $users_online;

?>
