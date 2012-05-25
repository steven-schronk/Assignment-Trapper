<?php

include_once("auth.php");
include_once("header.php");

if($role != 0) { die("Account \"".$user_name."\" Is Not Authorized To View This Page.<br><br>This Event Will Be Logged And Reported."); }

$_GET["name"] = mysql_real_escape_string($_GET["name"]);
$_GET["email"] = mysql_real_escape_string($_GET["email"]);
$_GET["class"] = mysql_real_escape_string($_GET["class"]);

// insert new user into database

if($_GET['action'] == "add")
{
	if ($_GET['name'] == "")  { die("No Name Sent");   }
	if ($_GET['email'] == "") { die("No E-mail Sent"); }
	if ($_GET['class'] == "") { die("No Class Sent"); }

	/* TODO: verify user not already listed */

	/* add person to user's table */

	$sql = 'insert into users values("","'.$_GET['email'].'",SHA1("password"),"'.$_GET['name'].'",0,1,1)';
	//echo $sql;
	$result = mysql_query($sql);
	if (!$result) { die("SQL ERROR: User Add"); }

	/* get new user's User ID */
	$sql= 'select user_id from users where email="'.$_GET['email'].'" and name="'.$_GET['name'].'"';
	//echo $sql;
	$result = mysql_query($sql);
	if (!$result) { die("SQL ERROR: Get User"); }
	$row = mysql_fetch_array($result);

	/* then add user to enrollment for class */
	$sql = 'insert into enrollment values("", '.$_GET['class'].', '.$row['user_id'].')';
	//echo $sql;
	$result = mysql_query($sql);
	if (!$result) { die("SQL ERROR: Enrollment"); }
}

/* get list of classes to select from */
$sql = 'select * from class';
$result = mysql_query($sql);
if (!$result) { die("SQL ERROR"); }
while($row = mysql_fetch_array($result))
{
	$classes .= '
		<option value='.$row['class_id'].'>'.$row['class_name'].'</option>';
	$i++;
}

?>

<form name="input" action="enrollment_new.php" method="get">
<input name="action" type="hidden" value="add">
<input name="class" type="hidden" value="'.$_GET['class'].'">
Name:<input name="name"><br><br>
Email:<input name="email"><br><br>
Class:<select name="class"><option></option><?php echo $classes; ?> </select><br><br>
<input type="submit" value="Add" />
</form>
</body>
</html>


