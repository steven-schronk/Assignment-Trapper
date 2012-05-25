<?php

include_once("auth.php");

if($role != 0) { die("Account \"".$user_name."\" Is Not Authorized To View This Page.<br><br>This Event Will Be Logged And Reported."); }

if (!$_GET["sched"]) { die("No Assignment Requested"); }

$_GET["sched"] = mysql_real_escape_string($_GET["sched"]);

/* determine if assignment is still open */

$sql = 'select count(*) from schedule where ava_date < NOW() and due_date > NOW() and sched_id ='.$_GET["sched"];

$result = mysql_query($sql);

$row = mysql_fetch_row($result);

if($row[0] == 1) { $submission = 'Open'; } else { $submission = 'Closed'; }

/* get assignment details */
$html = "";

$sql = "select chapter, section_id, title, class_id, schedule.assign_type, ava_date, due_date, sched_id, NOW()-due_date as status, type_name from schedule, types where (schedule.assign_type = types.assign_type) and sched_id=".$_GET["sched"]." order by due_date desc, ava_date desc";

$result = mysql_query($sql);

//echo $sql;

if (!$result) { die("SQL ERROR"); }

while($row = mysql_fetch_row($result))
{
	$html .= '<tr>';

	if($row[8] > 0) { $html .= "<td><img src=gfx/bullet_delete.png></td>"; } else { $html .= "<td><img src=gfx/bullet_add.png></td>"; }

	$html .= '<td><a href="detail_root.php?sched='.$row[7].'">'.$row[2].'</a></td><td>'.$row[9].'</td><td>'.$row[0].'</td>';
	$html .= '<td>'.$row[1].'</td><td>'.$row[5].'</td><td>'.$row[6].'</td>';
	$html .= '<td>'.$submission.'</td></tr>';
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

	while($row = mysql_fetch_array($result))
	{
		$student_list .= '<tr><td>';
		if($row['role'] == 0) { $student_list .= '<img src="gfx/user_suit.png">'; } else { $student_list .=  '<img src="gfx/user_green.png">'; }
		$student_list .= '</td><td>'.$row['name'].'</td><td>'.$row['email'].'<td><a href=detail_root.php?sched='.$_GET["sched"].'&user='.$row['user_id'].'>Grade</a></td></tr>';
	}

	$student_list .= '</table>';
} else {

	/* get latest versions of each file for this assignment */
	$sql = 'select file_id, max(time_post), file_name, file_size, time_post, file_1 from files where user_id='.$_GET["user"].' and sched_id='.$_GET["sched"].' group by file_name order by file_name;';

	//echo $sql;

	$result = mysql_query($sql);

	if (!$result) { die("SQL ERROR: File List"); }

	while($row = mysql_fetch_row($result))
	{
		/* get latest versions of each file for this assignment */

		$sql = 'select file_id, max(time_post), file_name, file_size, time_post, file_1 from files where user_id='.$_GET["user"].' and sched_id='.$_GET["sched"].' group by file_name order by file_name;';

		//$sql = 'select file_id, max(time_post), file_name, file_size, time_post, file_1 from files where user_id='.$user_id.' and sched_id='.$_GET["sched"].' group by file_name order by file_name;';

	//echo $sql;


		// get all comments for this particular file
		$sql = "select filecom_id, file_id, line_no, user_id, txt, timeposted from filecom where file_id=".$row[0]." order by line_no, timeposted";
	
		$filecom = mysql_query($sql);
		if (!$filecom) { die("SQL ERROR: File Comments"); }

		// only get first line comment
		$filecoms = mysql_fetch_array($filecom);

		// TODO: COMPLETE GETTING FILE COMMENTS

		$code = $row[5];
		/* escape open and close symbols <> */
		/*
			< = &lt;
			> = &gt;
			/ = &#47;  	
			] = &#93;
			[ = &#91;
			" = &#34;
			' = &#39;
	*/

		//$code = str_replace("<", "&lt;", $code);
		//$code = str_replace(">", "&gt;", $code);
		//$code = str_replace("\t", "TAB", $code);

		$code = htmlspecialchars($code);

		/* add line numbers to code */
		$lines = explode("\n", $code);

		// lines of code in file
		$i = 1; $code = "";
		foreach($lines AS $line)
		{
			// we only get line comments as they are needed
			if($filecoms['line_no'] == $i) {
				// comment lies in here if present and empty form hides here if not...
				//$code .= "<div id='line_com_".$i."' onClick='line_comment();' class='line_comment'><img src='gfx/down_arrow.png'>Data Here</div>";
				$code .= "<div id='line_com_".$i."' onClick='line_comment();' class='line_comment'>";
				$code .= "<img src='gfx/down_arrow.png'><input id='line_com_val_".$i."' type=text size=100>&nbsp;&nbsp;";
				$code .= "<button onClick='line_comment_save(\"line_com_val_".$i."\");'>Save</button>&nbsp;&nbsp;";
				$code .= "<button onClick='line_comment_cancel(\"line_com_".$i."\");'>Cancel</button></div>";
			} else {
				// comment lies in here if present and empty form hides here if not...
				//$code .= "<div id='line_com_".$i."' onClick='line_comment();' class='line_comment'><img src='gfx/down_arrow.png'>Data Here</div>";
				$code .= "<div id='line_com_".$i."' onClick='line_comment();' class='line_comment'>";
				$code .= "<img src='gfx/down_arrow.png'><input id='line_com_val_".$i."' type=text size=100>&nbsp;&nbsp;";
				$code .= "<button onClick='line_comment_save(\"line_com_val_".$i."\");'>Save</button>&nbsp;&nbsp;";
				$code .= "<button onClick='line_comment_cancel(\"line_com_".$i."\");'>Cancel</button></div>";			
			}

			$code .= "<div id='line' onClick='line_comment(\"line_com_".$i."\");' class='line'><span class='line_num'>".$i."</span>";
			if($line == '') { $code .= "<pre id='line_dat' class='line_dat'> </pre></div>\n";
			} else {          $code .= "<pre id='line_dat' class='line_dat'>".$line."</pre></div>\n"; }
			$i++;
		}

		// header for file
		$files .= '<div class="file">
			<div class="file_head"><img src="gfx/page_white_gear.png">
				<span class="fname">'.$row[2].'</span>
				<span class="fsize">'.$row[3].'B</span>
				<span class="fdate">'.$row[4].'</span>
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

	/* get comments for this assignment */

	//$sql = 'select comment_id, name, sub_id, txt, timeposted, comments.role from comments, users where (users.user_id = comments.user_id) and comments.user_id='.$_GET["user"].' and sub_id='.$_GET["sched"].' order by timeposted';

	$sql = 'select comment_id, stdusers.name, sub_id, fac_id, facusers.name as facname, txt, timeposted, comments.role from users stdusers,comments LEFT JOIN users facusers on (facusers.user_id = comments.fac_id) where (stdusers.user_id = comments.user_id) and comments.user_id='.$_GET["user"].' and sub_id='.$_GET["sched"].' order by timeposted';


	//echo $sql;

	$result = mysql_query($sql);

	if (!$result) { die("SQL ERROR"); }

	while($row = mysql_fetch_array($result))
	{

	$comm .= '<div class="comment"><div class="com_head">';
	
	if($row['facname']) { $comm .= '<img src="gfx/user_suit.png">'; } else { $comm .= '<img src="gfx/user_green.png">'; }
	
	if(!$row['facname']) { 
		$comm .= '<span class="com_name">'.$row['name'].'</span>';
	} else {
		$comm .= '<span class="com_name">'.$row['facname'].'</span>';
	}

	$comm .= '<span class="com_date">'.$row['timeposted'].'</span></div>
	<div class="com_body"><pre>
'.$row['txt'].'
	</pre></div>
</div><br><br>';

	}

	$comment_form = '<form action="comment.php" method="get">
	<textarea name="comment" id="comment" cols="85" rows="6"></textarea><br><br>
	<input name="sched" type="hidden" value='.$_GET["sched"].'>
	<input name="user" type="hidden" value='.$_GET["user"].'>
	<input type="submit" value="Add Comment" />
	</form>';
}

?>

<h3><?php echo $breadcrumb; ?> -> Assignment Details</h3>

<table class="gridtable">
	<tr>
		<th>Chapter</th><th>Section</th><th>Title</th><th>Type</th><th>Avalaible</th><th>Due</th><th>Submission</th><th>Status</th>
	</tr>

	<?php echo $html; ?>
</table>
<br><br>
	<?php echo $student_list; ?>
	
	<?php echo $files; ?>

	<?php echo $comm; ?>

	<?php echo $comment_form; ?>

</html>



