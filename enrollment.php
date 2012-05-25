<?php

include_once("auth.php");

if($role != 0) { die("Account \"".$user_name."\" Is Not Authorized To View This Page.<br><br>This Event Will Be Logged And Reported."); }

if($_GET['action'] == "delete")
{
	if ($_GET['class'] == "")   { die("No Class ID Sent"); }
	if ($_GET['user_id'] == "") { die("No User ID Sent");  }
	$sql = 'delete from enrollment where user_id='.$_GET['user_id'].' and class_id ='.$_GET['class'];
	$result = mysql_query($sql);
	if (!$result) { die("SQL ERROR"); }
}

if($_GET['action'] == "add")
{
	if ($_GET['class'] == "")   { die("No Class ID Sent"); }
	if ($_GET['user_id'] == "") { die("No User ID Sent");  }

	/* TODO: verify user not already listed */

	$sql = 'insert into enrollment values ("",'.$_GET['class'].','.$_GET['user_id'].')';
	$result = mysql_query($sql);
	if (!$result) { die("SQL ERROR"); }
}

/* get list of classes to select from */
$sql = 'select * from class';
$result = mysql_query($sql);
if (!$result) { die("SQL ERROR"); }
while($row = mysql_fetch_array($result))
{
	$classes .= '
		<tr><td><a href=enrollment.php?class='.$row['class_id'].'>'.$row['class_name'].'</a></td><td>'.$row['class_section'].'</td><td>'.$row['class_location'].'</td><td>'.$row['class_instructor'].'</td></tr>';
	$i++;
}

/* get list of all students */
$sql = 'select user_id, name, email from users  order by name';
$result = mysql_query($sql);
if (!$result) { die("SQL ERROR"); }
while($row = mysql_fetch_array($result))
{
	$all_students .= '<option value='.$row['user_id'].'>'.$row['name'].'</option>';
}

if ($_GET["class"]) {
	/* get current class info */
	$sql = 'select class_name, class_section, class_location, class_instructor from class where class_id ='.$_GET['class'];
	$result = mysql_query($sql);
	if (!$result) { die("SQL ERROR"); }
	while($row = mysql_fetch_array($result))
	{
		$class_info .= '<h3>'.$row['class_name'].' - '.$row['class_section'].' - '.$row['class_location'].' - '.$row['class_instructor'].'</h3>';
	}

	/* get list of students in this class */
	$sql = 'select enrollment.user_id, name, email from enrollment, users where (users.user_id = enrollment.user_id) and class_id='.$_GET['class'];
	$result = mysql_query($sql);
	if (!$result) { die("SQL ERROR"); }
	while($row = mysql_fetch_array($result))
	{
		$students .= '<tr><td>'.$row['name'].'</td><td>'.$row['email'].'</td><td><a href=enrollment.php?class='.$_GET['class'].'&user_id='.$row['user_id'].'&action=delete>Delete</a></td></tr>';
	}
}

?>

<h3>Enrollment Manager</h3>

<table class="gridtable">
	<tr>
		<th>Class Name</th><th>Section</th><th>Location</th><th>Instructor</th>
	</tr>
	<?php echo $classes; ?>
</table>
<br><br>

<?php if($class_info != "") { echo $class_info.'

<form name="input" action="enrollment.php" method="get">
<input name="action" type="hidden" value="add">
<input name="class" type="hidden" value="'.$_GET['class'].'">
<select name="user_id"><option></option>'.$all_students.'</select>&nbsp;&nbsp;&nbsp;<input type="submit" value="Add" /><br><br><br>
</form> 
<table class="gridtable">
	<tr>
			<th>Student Name</th><th>Student Email</th><th>Action</th>
	</tr>
	'.$students.'
</table>';

} ?>
