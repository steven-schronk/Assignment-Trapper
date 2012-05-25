<?php

include_once("auth.php");

if($role != 0) { die("Account \"".$user_name."\" Is Not Authorized To View This Page.<br><br>This Event Will Be Logged And Reported."); }

if (!$_GET["sched"]) { die("No Assignment Requested"); }

/* get list of all class types */

$sql = 'select assign_type, type_name from types order by type_name';

$result = mysql_query($sql);

if (!$result) { die("SQL ERROR"); }

$i = 0;
while($row = mysql_fetch_array($result))
{
	$items .= '<option value='.$row['assign_type'].'>'.$row['type_name'].'</option>';
}

?>

<input name="title" type="text">

<select>
	<?php echo $items; ?>
</select>

<input name="chapter" type="text">
<input name="section" type="text">
<input name="title" type="text">
<input name="title" type="text">

