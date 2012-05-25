<?php

include_once("auth.php");
include_once("header.php");
include_once("time.php");
include_once("user_details.php");

// prevents students from seeing other's work
if($role != 0) { $_GET["user"] = $user_id; }

if (!$_GET["sched"]) { die("No Assignment Requested"); }

if(isset($_GET["user"])) { $user_data_sent = true; }

$_GET["sched"] = mysql_real_escape_string($_GET["sched"]);
$_GET["user"] = mysql_real_escape_string($_GET["user"]);

/* get help status for this assignment */
if($role == 0) {

	if($_GET["user"]) { 
		$sql = 'select help_me from sched_details where sched_id ='.$_GET["sched"].' and user_id = '.$_GET["user"];

		$result = mysql_query($sql);

		$row = mysql_fetch_row($result);

		if($row[0] == 1) {
			$help_stat = 'Disable';
			$help_icon = '<img src=gfx/flag_red.png>';
		} else {
			$help_stat = 'Enable';
			$help_icon = '<img src=gfx/flag_white.png>';
		}
	}
} else {
	$sql = 'select help_me from sched_details where sched_id ='.$_GET["sched"].' and user_id = '.$user_id;

	$result = mysql_query($sql);

	$row = mysql_fetch_row($result);

	if($row[0] == 1) {
		$help_stat = 'Disable';
		$help_icon = '<img src=gfx/flag_red.png>';
	} else {
		$help_stat = 'Enable';
		$help_icon = '<img src=gfx/flag_white.png>';
	}
}

/* get files / late status for this assignment */
if($role == 0 && $_GET["user"]) {
	if(assignment_late($_GET["user"], $_GET["sched"])) {
		$file_count .= '<img src=gfx/tick_off.png></td>';
	} else {
		if(file_count($_GET["user"], $_GET["sched"])) {
			$file_count .= '<img src=gfx/star.png></td>';
		} else { $file_count .= '<img src=gfx/error.png></td>'; }
	}

} else {
	if(assignment_late($user_id, $_GET["sched"])) {
		$file_count .= '<img src=gfx/tick_off.png></td>';
	} else {
		if(file_count($user_id, $_GET["sched"])) {
			$file_count .= '<img src=gfx/star.png></td>';
		} else { $file_count .= '<img src=gfx/error.png></td>'; }
	}
}

/* get assignment details */
$html = "";

$sql = "select chapter, section_id, title, class_id, schedule.assign_type, ava_date, due_date, sched_id, NOW()-due_date as status, type_name, graded, NOW()-ava_date as ava from schedule, types where (schedule.assign_type = types.assign_type) and sched_id=".$_GET["sched"]." order by due_date desc, ava_date desc";

$result = mysql_query($sql);

//echo $sql;

if (!$result) { die("SQL ERROR"); }

while($row = mysql_fetch_row($result))
{
	$html .= '<tr>';

	// assignment started?
	if($row[11] < 0){
		$html .= "<td><img src=gfx/bullet_black.png>";
		$started = false;
	} else {
		// assignment open?
		if($row[8] > 0 || $row[10] < 0) { $html .= "<td><img src=gfx/bullet_delete.png>"; } else { $html .= "<td><img src=gfx/bullet_add.png>"; }
		$started = true;
	}


	// assignment graded?
	if($row[12]) { $html .= "<img src=gfx/bullet_disk.png>"; } else { $html .= "<img src=gfx/bullet_wrench.png>"; }

	$html .= $help_icon;
	$html .= $file_count."</td>";
	$html .= '<td><a href="detail_root.php?sched='.$row[7].'">'.$row[2].'</a></td><td>'.$row[9].'</td><td>'.$row[0].'</td>';
	$html .= '<td>'.$row[1].'</td><td>'.$row[5].'</td><td>'.$row[6].'</td>';

	if($started) {
		$html .= '<td>'.absHumanTiming($row[6]).'</td>';
	} else {
		$html .= '<td>'.absHumanTiming($row[5]).'</td>';
	}

	//$html .= '<td>'.absHumanTiming($row[6]).'</td>';
	if($role != 0 ) { $html .= '<td><a href=help_me.php?sched='.$_GET["sched"].'>'.$help_stat.'</a></td>'; }
	$html .= '</tr>';
}

/* get class this assignment is from for breadcrumbs */
$sql = 'select schedule.class_id, class.class_name from schedule, class where (schedule.class_id = class.class_id) and schedule.sched_id = '.$_GET["sched"];

//echo $sql;

$result = mysql_query($sql);

if (!$result) { die("SQL ERROR"); }

$row = mysql_fetch_array($result);

$breadcrumb = '<a href=assignment.php?class='.$row['class_id'].'>'.$row['class_name'].'</a>&nbsp;';

if($_GET["user"] == '' ) { 
	/* get class id for this schedule id */

	$sql = 'select class_id from schedule where sched_id='.$_GET["sched"];

	$result = mysql_query($sql);

	if (!$result) { die("SQL ERROR"); }

	$row = mysql_fetch_row($result);

	$class_id = $row[0];

	/* get list of students that are in this class and generate a list of them */
	$sql = 'select users.name, users.email, users.user_id, role from users, enrollment where (users.user_id = enrollment.user_id) and enrollment.class_id='.$class_id.' order by users.name';

	//echo $sql;

	$result = mysql_query($sql);

	if (!$result) { die("SQL ERROR"); }

	$student_list = '<table class="gridtable">
	<tr>
		<th>Role</th><th>Name</th><th>Email</th><th>Grade</th>
	</tr>';

	while($row = mysql_fetch_array($result)) // getting list of students
	{
		$student_list .= '<tr><td>';
		if($row['role'] == 0) { $student_list .= '<img src="gfx/user_suit.png">'; } else { $student_list .=  '<img src="gfx/user_green.png">'; }
		$student_list .= '</td><td>'.$row['name'].'</td><td>'.$row['email'].'<td><a href=detail_root.php?sched='.$_GET["sched"].'&user='.$row['user_id'].'>Grade</a></td></tr>';
	}

	$student_list .= '</table>';
} else {
	/* get latest versions of each file for this assignment ---------------------------------------------------------------------*/

	// determine if we are logged in as root and if user ID has been sent...
	if($_GET["user"] && $role == 0 ) { $this_user = $_GET["user"]; } else { $this_user = $user_id; }

	// first get list of file_ids that are distinct names and the latest versions
	$sql = 'select distinct file_name, max(file_id) from files where user_id='.$this_user.' and sched_id='.$_GET["sched"].' group by file_name order by file_name';

	//echo $sql;

	$result = mysql_query($sql);

	if (!$result) { die("SQL ERROR: File List"); }

	$i = 0;

	while($row = mysql_fetch_row($result)) // moving through list of files for this user and assignment
	{

		// get all comments for this particular file
		//$sql = "select filecom_id, file_id, line_no, user_id, txt, timeposted from filecom where file_id=".$row[0]." order by line_no, timeposted";
		$sql = 'select line_no, filecom.user_id, name,  timeposted, txt, role from filecom, users 
			where (users.user_id = filecom.user_id) and file_id='.$row[1].' order by line_no, timeposted';

		//echo $sql;

		$filecom = mysql_query($sql);
		if (!$filecom) { die("SQL ERROR: File Comments"); }

		// only get first line comment
		$filecoms = mysql_fetch_array($filecom);

		$code = $row[5];

		// get file contents and details for each file
		$sql = 'select file_id, time_post, file_name, file_size, time_post, file_1 from files where file_id ='.$row[1];

		//echo $sql;

		$result2 = mysql_query($sql);
		if (!$result2) { die("SQL ERROR: File Details"); }
		while($row2 = mysql_fetch_array($result2)) // moving through contents of each specific file
		{
			//echo sql;

			//echo $row2['file_name'];
			$code = $row2['file_1'];
			$code = htmlspecialchars($code);
			// convert tabs into spaces
			$code = tab2space($code);
		
			/* add line numbers to code */
			$lines = explode("\n", $code);

			$i = 1; $code = "";
			foreach($lines AS $line) // moving through each line of code in file
			{
				if($role == 0) { $comm_class = "line_comment_fac"; } else { $comm_class = "line_comment_stu"; }
				// we only get line comments as they are needed
				if($filecoms['line_no'] == $i) { // comment exists for this line

					do {
						// run through comment rows for this line for display
						if($filecoms['role'] == 0) {
							$code .= "<div class=line_comment_display_fac>";
						} else {
							$code .= "<div class=line_comment_display_stu>";
						}		
						$code .= "<img src='gfx/down_arrow.png'>";
						$code .= "<span class=line_comment_txt>".$filecoms['txt']."</span>";
						$code .= "<span class=line_comment_name>".$filecoms['name']."</span>";
						$code .= "<span class=line_comment_time>".absHumanTiming($filecoms['timeposted'])."</span>";
						$code .= "</div>";

						$filecoms = mysql_fetch_array($filecom); // get next line comment

					} while ($filecoms['line_no'] == $i);

					$code .= "<div id='line_com_".$row2['file_id']."_".$i."' class='".$comm_class."'>";
					$code .= "<img src='gfx/down_arrow.png'><input id='line_com_val_".$row2['file_id']."_".$i."' type=text size=100>&nbsp;&nbsp;";
					$code .= "<button onClick='line_comment_save(".$row2['file_id'].", ".$i.", \"line_com_".$row2['file_id']."_".$i."\",\"line_com_val_".$row2['file_id']."_".$i."\");'>Save</button>&nbsp;&nbsp;";
					$code .= "<button onClick='line_comment_cancel(\"line_com_".$row2['file_id']."_".$i."\");'>Cancel</button></div>";
				} else { // no comment for this line
					$code .= "<div id='line_com_".$row2['file_id']."_".$i."' class='".$comm_class."'>";
					$code .= "<img src='gfx/down_arrow.png'><input id='line_com_val_".$row2['file_id']."_".$i."' type=text size=100>&nbsp;&nbsp;";
					$code .= "<button onClick='line_comment_save(".$row2['file_id'].", ".$i.", \"line_com_".$row2['file_id']."_".$i."\",\"line_com_val_".$row2['file_id']."_".$i."\");'>Save</button>&nbsp;&nbsp;";
					$code .= "<button onClick='line_comment_cancel(\"line_com_".$row2['file_id']."_".$i."\");'>Cancel</button></div>";			
				}

				$code .= "<div id='line' onClick='line_comment(\"line_com_".$row2['file_id']."_".$i."\" , \"line_com_val_".$row2['file_id']."_".$i."\");' class='line'><span class='line_num'>".$i."</span>";
				if($line == '') { 	$code .= "<pre id='line_dat' class='line_dat'> </pre></div>\n";
				} elseif($line == "\r") {
							$code .= "<pre id='line_dat' class='line_dat'> </pre></div>\n";
				} else {          	$code .= "<pre id='line_dat' class='line_dat'>".$line."</pre></div>\n"; }
				$i++;
			}

		// header for file

		if(file_late($row2['file_id'])) { $late_indicator  = '<div class="file_head_late">'; } else { $late_indicator  = '<div class="file_head">'; }

		$files .= '<div class="file">
			'.$late_indicator.'<img src="gfx/page_white_gear.png">
				<span class="fname"><a href=file_raw.php?file_id='.$row2['file_id'].'>'.$row2['file_name'].'</a></span>
				<span class="fsize">'.$row2['file_size'].'B</span>
				<span class="fdate">'.$row2['time_post'].'</span>
				<span class="fhuman">'.absHumanTiming($row2['time_post']).'</span>
				<!-- <span class="fedit"><button>Edit</button></span>
				<span class="fraw"><button>Raw</button></span>-->
			</div>
			<div class="highlight">
				<div>
'.$code.'

				</div>
			</div>
		</div><br><br>';
		}

	}

	/* get comments for this assignment */
	$sql = 'select comment_id, stdusers.name, sub_id, fac_id, facusers.name as facname, txt, timeposted, comments.role from users stdusers, comments LEFT JOIN users facusers on (facusers.user_id = comments.fac_id) where (stdusers.user_id = comments.user_id) and comments.user_id='.$_GET["user"].' and sub_id='.$_GET["sched"].' order by timeposted';

	//echo $sql;

	$result = mysql_query($sql);

	if (!$result) { die("SQL ERROR"); }

	while($row = mysql_fetch_array($result))
	{
		if($row['role'] != 0) {
			$comm .= '<div class="comment"><div class="com_head">';
		} else {
			$comm .= '<div class="comment"><div class="com_head_fac">';
		}
	
		if($row['facname']) { $comm .= '<img src="gfx/user_suit.png">'; } else { $comm .= '<img src="gfx/user_green.png">'; }
	
		if(!$row['facname']) { 
			$comm .= '<span class="com_name">'.$row['name'].'</span>';
		} else {
			$comm .= '<span class="com_name">'.$row['facname'].'</span>';
		}

		$comm .= '<span class="com_date">'.$row['timeposted'].'</span>';
		$comm .= '<span class="com_human">'.absHumanTiming($row['timeposted']).'</span></div>';

		$row['txt'] = htmlspecialchars($row['txt']);
		$row['txt'] = tab2space($row['txt']);
		// add breaks to text of comment - for readability
		$row['txt'] = str_replace("\n", "<br>", $row['txt']);

		$comm .= '<div class="com_body">
'.$row['txt'].'
		</div>
	</div><br><br>';

	}

	if($role != 0) {
		$comment_form = '<div class="comment_box">Add Comment:<form action="comment.php" method="get">
			<textarea name="comment" id="comment" cols="85" rows="6"></textarea><br><br>
			<input name="sched" type="hidden" value='.$_GET["sched"].'>
			<input name="user" type="hidden" value='.$_GET["user"].'>
			<input type="submit" value="Add Comment" />
			</form></div>';
	} else { // returns root user back to same page after a post - otherwise would return to list of students
		$comment_form = '<div class="comment_box">Add Comment:<form action="comment.php" method="get">
			<textarea name="comment" id="comment" cols="85" rows="6"></textarea><br><br>
			<input name="sched" type="hidden" value='.$_GET["sched"].'>
			<input name="user" type="hidden" value='.$_GET["user"].'>
			<input name="action" type="hidden" value="ret">
			<input type="submit" value="Add Comment" />
			</form></div>';
	}
}

if(isset($_GET["user"])) {
	$sql = 'select name, role from users where user_id='.$_GET["user"];
	
	$result = mysql_query($sql);

	$row = mysql_fetch_row($result);

	if($role == 0) { $student_user_name = $row[0]; }
	$user_id_role = $row[1];
}

/* determine if assignment is still open */

$sql = 'select count(*) from schedule where ava_date < NOW() and due_date > NOW() and sched_id ='.$_GET["sched"];

//echo $sql;

$result = mysql_query($sql);

$row = mysql_fetch_row($result);

if($row[0] == 1) { // assignment is open

	if($role == 0 && $user_id_role == 0 && $user_data_sent) { // my role is root, student role is root and a user has been sent...
		$upload_form = '<div class="comment_box">Upload File:<form action="upload.php?sched='.$_GET["sched"].'" method="post" enctype="multipart/form-data">
		<input type="file" name="file" size="40"><br><br>
		<input name="user" type="hidden" value='.$_GET["user"].'>
		<input name="action" type="hidden" value="ret">
		<input type="submit" name="submit" value="Submit"/>
		</form></div>';
	} else if($role != 0) {
		$upload_form = '<div class="comment_box">Upload File:<form action="upload.php?sched='.$_GET["sched"].'" method="post" enctype="multipart/form-data">
		<input type="file" name="file" size="40"><br><br>
		<input type="submit" name="submit" value="Submit"/>
		</form></div>';
	} else {
		$upload_form = '';
	}

} else { // assignment is closed - show as a red upload box
	if($role == 0 && $user_id_role == 0 && $user_data_sent) {
		$upload_form = '<div class="comment_box_closed"><div class="comment_box_closed_message">-20 POINTS</div>
		Upload File:<form action="upload.php?sched='.$_GET["sched"].'" method="post" enctype="multipart/form-data">
		<input type="file" name="file" size="40"><br><br>
		<input name="user" type="hidden" value='.$_GET["user"].'>
		<input name="action" type="hidden" value="ret">
		<input type="submit" name="submit" value="Submit"/>
		</form></div>';
	} else if($role != 0) {
		$upload_form = '<div class="comment_box_closed"><div class="comment_box_closed_message">-20 POINTS</div>
			Upload File:<form action="upload.php?sched='.$_GET["sched"].'" method="post" enctype="multipart/form-data">
			<input type="file" name="file" size="40"><br><br>
			<input type="submit" name="submit" value="Submit"/>
			</form></div>';
	} else {
		$upload_form = '';
	}
}

/* generate next and back buttons */

if($role == 0) {

	// list of all students alphabetically in this class
	$sql = 'select enrollment.user_id, name  from schedule, enrollment, users where (schedule.class_id = enrollment.class_id) and (enrollment.user_id = users.user_id) and sched_id = '.$_GET["sched"].' and name < "'.$student_user_name.'" order by name desc, email desc, user_id desc limit 1';

	$result = mysql_query($sql);

	$row = mysql_fetch_array($result);

	//echo $sql;

	if ($row['name']) { $back_button = '<a href=detail_root.php?sched='.$_GET["sched"].'&user='.$row['user_id'].'><img src="gfx/resultset_previous.png" style="border-style: none"></a>'; } else { $back_button = '<img src="gfx/resultset_previous_disabled.png" style="border-style: none">'; }

	$sql = 'select enrollment.user_id, name  from schedule, enrollment, users where (schedule.class_id = enrollment.class_id) and (enrollment.user_id = users.user_id) and sched_id = '.$_GET["sched"].' and name > "'.$student_user_name.'" order by name, email, user_id limit 1';

	$result = mysql_query($sql);

	$row = mysql_fetch_array($result);

	//echo "<br>".$sql;

	if ($row['name']) { $next_button = '<a href=detail_root.php?sched='.$_GET["sched"].'&user='.$row['user_id'].'><img src="gfx/resultset_next.png" style="border-style: none"></a>'; } else { $next_button = '<img src="gfx/resultset_next_disabled.png" style="border-style: none">'; }

}

?>

<h3><?php echo $breadcrumb; ?> -> Assignment Details</h3>

<table class="gridtable">
	<tr>
		<th>Status</th><th>Title</th><th>Type</th><th>Chapter</th><th>Section</th><th>Avalable Date</th><th>Due Date</th><th>Human Time</th>

		<?php if($role != 0 ) { echo "<th>Help</th>"; } ?>
	</tr>
	<a name="top">
	<?php echo $html; ?>
</table>
<br><br>
	
	<center><?php echo $back_button; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#bottom"><img src="gfx/resultset_down.png" style="border-style: none"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $next_button; ?></center>
	<?php echo $upload_form; ?>

<br><br>
	<?php echo $student_list; ?>
	<?php echo "<h1>".$student_user_name."</h1>"; ?>
	<?php echo $files; ?>
	<a name="bottom">
	<center><?php echo $back_button; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#top"><img src="gfx/resultset_up.png" style="border-style: none"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $next_button; ?></center>
	<?php echo "<h1>".$student_user_name."</h1>"; ?>
	
	<?php echo $comm; ?>
	<?php echo $comment_form; ?>

	

</html>
