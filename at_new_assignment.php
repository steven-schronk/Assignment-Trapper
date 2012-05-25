<?php

include_once("auth_root.php");

if($role != 0) { die("Account \"".$user_name."\" Is Not Authorized To View This Page.<br><br>This Event Will Be Logged And Reported."); }

// TODO: Add this back... if (!$_GET["sched"]) { die("No Assignment Requested"); }

include 'include/std_functions.php';

  $sane = true; // must check sanity before posting

  if ($_POST){// post submitted - verify all input for valid data
		if ($_POST['class'] == "") { $sane = false; $class_error="Field Must Not Be Left Blank"; }
		if ($_POST['title'] == "") { $sane = false; $title_error="Field Must Not Be Left Blank"; }
		/* title: Text Constraint Not Implemented... */
		if ($_POST['st'] == "") { $sane = false; $st_error="Field Must Not Be Left Blank"; }
		//if ($_POST['chapter'] == "") { $sane = false; $chapter_error="Field Must Not Be Left Blank"; }
		/* chapter: Text Constraint Not Implemented... */
		//if ($_POST['section_id'] == "") { $sane = false; $section_id_error="Field Must Not Be Left Blank"; }
		/* section_id: Text Constraint Not Implemented... */
		//if (!check_date($_POST['ava_date'])){$sane = false; $ava_date_error="Field Must be a Valid Date"; }
		if ($_POST['ava_date'] == "") { $sane = false; $ava_date_error="Field Must Not Be Left Blank"; }
		//if (!check_date($_POST['due_date'])){$sane = false; $due_date_error="Field Must be a Valid Date"; }
		if ($_POST['due_date'] == "") { $sane = false; $due_date_error="Field Must Not Be Left Blank"; }

	foreach ($_POST as $value) {
              $value = mysql_real_escape_string($value);
        }

    if($sane) {
	$sql = 'INSERT INTO schedule VALUES ("",'.$_POST['class'].','.$_POST['st']. ',"'.$_POST['title']. '","'.$_POST['chapter']. '","'.$_POST['section_id']. '","'.$_POST['ava_date']. '","'.$_POST['due_date']. '")';

	//echo $sql;

	mysql_select_db("trapper", $con);
	if (!mysql_query($sql)) {  die('Could not insert data: ' . mysql_error()); }
	mysql_close();
		echo '<html><head><title>Elbit Systems of America - Carpool/Vanpool Interest Survey</title></head>
		<body>			<META HTTP-EQUIV="Refresh" CONTENT="4" URL="output.php">
			<center>
				<div id="green_box">
					<br />
						Thank you for submitting data to this example.
					<br />
				</div>
			</center>
		</body>
		</html>';
	//echo $sql;
	exit;
    }
}


/* get list of all class types */

$sql = 'select assign_type, type_name from types order by type_name';

$result = mysql_query($sql);

if (!$result) { die("SQL ERROR"); }

$i = 0;
while($row = mysql_fetch_array($result))
{
	$items .= '<option value='.$row['assign_type'].'>'.$row['type_name'].'</option>';
}


/* get list of current classes */

$sql = 'select * from class order by class_name';

$result = mysql_query($sql);

if (!$result) { die("SQL ERROR"); }

$i = 0;
while($row = mysql_fetch_array($result))
{
	$classes .= '<option value='.$row['class_id'].'>'.$row['class_name'].'</option>';
}


?>


<html>
<link rel="stylesheet" type="text/css" media="all" href="include/style.css" />
<link rel="stylesheet" type="text/css" media="all" href="include/calendar.css" title="win2k-cold-1" />

<script type="text/javascript" src="include/calendar.js"></script>
<script type="text/javascript" src="include/position.js"></script>
<script type="text/javascript" src="include/calendar-en.js"></script>
<script type="text/javascript" src="include/calendar-setup.js"></script>

<h2><img src="gfx/bricks.png">Assignment Trapper</h2>
<div class="header">
	<div class="menu">
	<a href="index.php">Classes</a> | <a href="manage.php">Manage Account</a> | <?php echo $_COOKIE["username"]; ?> | <a href="#" onClick='logout();'>Logout</a>
	</div>
</div>

<br>
	<div id="banner">
		<h3>Edit Schedule</h3>
	</div>

	<div id="centercontent">
		<form name="form" action="" method="post">

	<div class="input">
		<table width="100%">
			<tr>
				<td width="40%">
					<div class="input_form">
						<select name="class">
						<?php echo $classes; ?>
						</select>
					</div>
				</td>
				<td width="60%">
					<div class="input_error"><?php echo $class_error ?></div>
					<div class="input_name">Class</div>
					<div class="input_description">Select class this assignment is connected to.</div>
				</td>
			</tr>
		</table>
	</div>


	<div class="input">
		<table width="100%">
			<tr>
				<td width="40%">
					<div class="input_form">
						<input name="title" size="32" value="<?php echo $_POST['title'] ?>">
					</div>
				</td>
				<td width="60%">
					<div class="input_error"><?php echo $title_error ?></div>
					<div class="input_name">Title</div>
					<div class="input_description">Full title of class assignment.</div>
				</td>
			</tr>
		</table>
	</div>
	
	<div class="input">
		<table width="100%">
			<tr>
				<td width="40%">
					<div class="input_form">
						<select name="st">

    <option value=""></option>
<?php echo $items; ?>
	</select>

					</div>
				</td>
				<td width="60%">
					<div class="input_error"><?php echo $st_error ?></div>
					<div class="input_name">Assignment Type</div>
					<div class="input_description">Assignments are organized into similar types.</div>
				</td>
			</tr>
		</table>
	</div>
	
	<div class="input">
		<table width="100%">
			<tr>
				<td width="40%">
					<div class="input_form">
						<input name="chapter" size="32" value="<?php echo $_POST['chapter'] ?>">
					</div>
				</td>
				<td width="60%">
					<div class="input_error"><?php echo $chapter_error ?></div>
					<div class="input_name">Chapter</div>
					<div class="input_description">Chapter of class assignment.</div>
				</td>
			</tr>
		</table>
	</div>
	
	<div class="input">
		<table width="100%">
			<tr>
				<td width="40%">
					<div class="input_form">
						<input name="section_id" size="32" value="<?php echo $_POST['section_id'] ?>">
					</div>
				</td>
				<td width="60%">
					<div class="input_error"><?php echo $section_id_error ?></div>
					<div class="input_name">Section Number</div>
					<div class="input_description">Section of class assignment.</div>
				</td>
			</tr>
		</table>
	</div>
	
	<div class="input">
		<table width="100%">
			<tr>
				<td width="40%">
					<div class="input_form">
						
	<div class="input" style="height: 175px;">
	  <div style="float: left; margin-left: 1em; margin-bottom: 1em;" id="ava_datediv"></div>
	  <input id="ava_date" name="ava_date" style="position: relative; left: 225px; top:-75px;">
	<script type="text/javascript">

  		function dateChanged(calendar) {
    			if (calendar.dateClicked) {
				var y = calendar.date.getFullYear();
				var m = calendar.date.getMonth() + 1;
				var d = calendar.date.getDate();
				var h = calendar.date.getHours();
				var i = calendar.date.getMinutes();
				var input = document.getElementById("ava_date");
				input.value = y + "-" + m + "-" + d + " " + h + ":" + i + ":00";
    				}
  			};

		Calendar.setup(
		{
			//calendar.setDateFormat("%y/%m/%d %H");
			flat : "ava_datediv",
			singleClick: "true",
			showsTime   : "true",
			timeFormat: "12",
			flatCallback : dateChanged,
			weekNumbers  : false,
			//date         : <?php if( $_POST['ava_date'] == "" ) { echo '"' . todays_date() . '"'; } else { echo  '"' . $_POST['ava_date'] . '"'; } ?>
			//date: "11/20/1977 4:5:23"
		});
	</script>
	
					</div>
				</td>
				<td width="60%">
					<div class="input_error"><?php echo $ava_date_error ?></div>
					<div class="input_name">Available Date</div>
					<div class="input_description">Date and time assignment is open for posting.</div>
				</td>
			</tr>
		</table>
	</div>
	
	<div class="input">
		<table width="100%">
			<tr>
				<td width="40%">
					<div class="input_form">
						
	<div class="input" style="height: 175px;">
	  <div style="float: left; margin-left: 1em; margin-bottom: 1em;" id="due_datediv"></div>
	  <input  id="due_date" name="due_date" style="position: relative; left: 225px; top:-75px;">
	<script type="text/javascript">

  		function dateChanged(calendar) {
    			if (calendar.dateClicked) {
				var y = calendar.date.getFullYear();
				var m = calendar.date.getMonth() + 1;
				var d = calendar.date.getDate();
				var h = calendar.date.getHours();
				var i = calendar.date.getMinutes();
				var input = document.getElementById("due_date");
				input.value = y + "-" + m + "-" + d + " " + h + ":" + i + ":00";
    				}
  			};

		Calendar.setup(
		{
			//calendar.setDateFormat("%y/%m/%d %H");
			flat : "due_datediv",
			singleClick: "true",
			showsTime   : "true",
			timeFormat: "12",
			flatCallback : dateChanged,
			weekNumbers  : false,
			//date         : <?php if( $_POST['ava_date'] == "" ) { echo '"' . todays_date() . '"'; } else { echo  '"' . $_POST['ava_date'] . '"'; } ?>
			//date: "11/20/1977 4:5:23"
		});
	</script>
	
					</div>
				</td>
				<td width="60%">
					<div class="input_error"><?php echo $due_date_error ?></div>
					<div class="input_name">Due Date</div>
					<div class="input_description">Date and time assignment is closed for posting.</div>
				</td>
			</tr>
		</table>
	</div>
	
	<div id="digitalsig"><center>
		<div id=spacer style="padding:20px;">
		<input type="submit" value="Submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="reset"  value="Reset">
		</div>
	 </center>
	</form>
	</div>

	</body></html>
