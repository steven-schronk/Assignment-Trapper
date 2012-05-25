<?php

include_once("auth.php");

include_once("time.php");

if (!$_GET["sched"]) { die("No Assignment Requested"); }

$_GET["sched"] = mysql_real_escape_string($_GET["sched"]);

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

	$html .= '<td><a href="detail.php?sched='.$row[7].'">'.$row[2].'</a></td><td>'.$row[9].'</td><td>'.$row[0].'</td>';
	$html .= '<td>'.$row[1].'</td><td>'.$row[5].'</td><td>'.$row[6].'</td><td>'.absHumanTiming($row[6]).'</td>';
	$html .= '</tr>';
}

/* determine if assignment is still open */

$sql = 'select count(*) from schedule where ava_date < NOW() and due_date > NOW() and sched_id ='.$_GET["sched"];

$result = mysql_query($sql);

$row = mysql_fetch_row($result);

if($row[0] == 1) { $submission = ''; } else { $submission = 'disabled=true'; }


/* get class this assignment ID from for breadcrumbs */
$sql = 'select schedule.class_id, class.class_name from schedule, class where (schedule.class_id = class.class_id) and schedule.sched_id = '.$_GET["sched"];

//echo $sql;

$result = mysql_query($sql);

if (!$result) { die("SQL ERROR"); }

$row = mysql_fetch_array($result);

$breadcrumb = '<a href=assignment.php?class='.$row['class_id'].'>'.$row['class_name'].'</a>&nbsp;';

/* get latest versions of each file for this assignment ---------------------------------------------------------------------*/


// first get list of file_ids that are distinct names and the latest versions

$sql = 'select distinct file_name, max(file_id) from files where user_id='.$user_id.' and sched_id='.$_GET["sched"].' group by file_name order by file_name';

//echo $sql;

$result = mysql_query($sql);

if (!$result) { die("SQL ERROR: File List"); }

// store these file_id in an array
$i = 0;

while($row = mysql_fetch_row($result))
{
	$sql = 'select file_id, time_post, file_name, file_size, time_post, file_1 from files where file_id ='.$row[1];

	//echo $sql;

	$result2 = mysql_query($sql);
	if (!$result2) { die("SQL ERROR: File Details"); }
	while($row2 = mysql_fetch_array($result2))
	{
		//echo $sql;
		$code = $row2['file_1'];
		
		/* escape open and close symbols <> */
		$code = str_replace("<", "&lt;", $code);
		$code = str_replace(">", "&gt;", $code);

		/* add line numbers to code */
		$lines = explode("\n", $code);

		$i = 1; $code = "";
		foreach($lines AS $line)
		{
			$code .= "\n".$i."|";
			$code .= $line;
			$i++;
		}

		$files .= '<div class="file">
			<div class="file_head"><img src="gfx/page_white_gear.png">
				<span class="fname">'.$row2['file_name'].'</span>
				<span class="fsize">'.$row2['file_size'].'B</span>
				<span class="fdate">'.absHumanTiming($row2['time_post']).'</span>
				<span class="fdate">'.$row2['time_post'].'</span>
				<span class="fraw"><button>Raw</button></span>
			</div>
			<div class="highlight">
				<pre class="sh_cpp">
'.$code.'

				</pre>
			</div>
		</div><br>';
	}
}

/*
	/* get latest versions of each file for this assignment

	//$sql = 'select file_id, max(time_post), file_name, file_size, time_post, file_1 from files where user_id='.$_GET["user"].' and sched_id='.$_GET["sched"].' group by file_name order by file_name;';

	$sql = 'select file_id, max(time_post), file_name, file_size, time_post, file_1 from files where user_id='.$user_id.' and sched_id='.$_GET["sched"].' group by file_name order by file_name;';

	//echo $sql;

	$result = mysql_query($sql);

	if (!$result) { die("SQL ERROR: Get File"); }

	while($row = mysql_fetch_row($result))
	{
		$code = $row[5];
		/* escape open and close symbols <> 
		$code = str_replace("<", "&lt;", $code);
		$code = str_replace(">", "&gt;", $code);

		/* add line numbers to code 
		$lines = explode("\n", $code);

		$i = 1; $code = "";
		foreach($lines AS $line)
		{
			$code .= "\n".$i."|";
			$code .= $line;
			$i++;
		}

		$files .= '<div class="file">
			<div class="file_head"><img src="gfx/page_white_gear.png">
				<span class="fname">'.$row[2].'</span>
				<span class="fsize">'.$row[3].'B</span>
				<span class="fdate">'.$row[4].'</span>
				<span class="fraw"><button>Raw</button></span>
			</div>
			<div class="highlight">
				<pre class="sh_cpp">
	'.$code.'

				</pre>
			</div>
		</div>';
	}

}

*/

/* get comments for this assignment */

//$sql = 'select comment_id, name, sub_id, txt, timeposted, comments.role from comments, users where (users.user_id = comments.user_id) and comments.user_id='.$user_id.' and sub_id='.$_GET["sched"].' order by timeposted';

$sql = 'select comment_id, stdusers.name, sub_id, fac_id, facusers.name as facname, txt, timeposted, comments.role from users stdusers,comments LEFT JOIN users facusers on (facusers.user_id = comments.fac_id) where (stdusers.user_id = comments.user_id) and comments.user_id='.$user_id.' and sub_id='.$_GET["sched"].' order by timeposted';

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

	$comm .= '<span class="com_date_human">'.absHumanTiming($row['timeposted']).'</span></div>';

	$comm .= '<span class="com_date">'.$row['timeposted'].'</span></div>
	<div class="com_body"><pre>
'.$row['txt'].'
	</pre></div>
</div><br><br>';

}

?>

<h3><?php echo $breadcrumb; ?> -> Assignment Details</h3>

<table class="gridtable">
	<tr>
		<th>Status</th><th>Title</th><th>Type</th><th>Chapter</th><th>Section</th><th>Avalable Date</th><th>Due Date</th><th>Human Time</th>
	</tr>

	<?php echo $html; ?>
</table>
<br>

<form action='upload.php?sched=<?php echo $_GET["sched"]; ?>' method="post" enctype="multipart/form-data">
<input type="file" name="file" size="40" <?php echo $submission; ?>><br><br>
<input type="submit" name="submit" value="Submit" <?php echo $submission; ?> />
</form>

<br>

<?php echo $files; ?>

<br><br>

<?php echo $comm; ?>

<form action='comment.php' method="get">
<textarea name="comment" id="comment" cols="85" rows="6"></textarea><br><br>
<input name="sched" type="hidden" value='<?php echo $_GET["sched"]; ?>'>
<input type="submit" value="Add Comment" />
</form>



