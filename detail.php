<?php

include_once("auth.php");

if (!$_GET["sched"]) { die("No Assignment Requested"); }

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
	$html .= '<td>'.$row[1].'</td><td>'.$row[5].'</td><td>'.$row[6].'</td>';
	$html .= '</tr>';
	if($row[7] > 0) { $submission = 'disabled=true'; }
}

/*
$html = "";

$sql = "select chapter, section_id, title, class_id, assign_type, ava_date, due_date, NOW()-due_date as status from schedule where sched_id=".$_GET["sched"]." order by due_date desc, ava_date desc";

$result = mysql_query($sql);

if (!$result) { die("SQL ERROR"); }

while($row = mysql_fetch_row($result))
{
	$html .= '<tr><td>'.$row[0].'</td><td>'.$row[1].'</td><td>'.$row[2].'</td>';
	$html .= '<td>'.$row[3].'</td><td>'.$row[4].'</td><td>'.$row[5].'</td><td>'.$row[6].'</td></tr>';
	if($row[7] > 0) { $submission = 'disabled=true'; }
}
*/
/* get latest versions of each file for this assignment */

$sql = 'select file_id, max(time_post), file_name, file_size, time_post, file_1 from files where user_id='.$user_id.' and sched_id='.$_GET["sched"].' group by file_name order by file_name;';

//echo $sql;

$result = mysql_query($sql);

if (!$result) { die("SQL ERROR"); }

while($row = mysql_fetch_row($result))
{
	$code = $row[5];
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
			<span class="fname">'.$row[2].'</span>
			<span class="fsize">'.$row[3].'B</span>
			<span class="fdate">'.$row[4].'</span>
			<span class="fedit"><button>Edit</button></span>
			<span class="fraw"><button>Raw</button></span>
		</div>
		<div class="highlight">
			<pre class="sh_cpp">
'.$code.'

			</pre>
		</div>
	</div>';
}


/* get comments for this assignment */

$sql = 'select comment_id, name, sub_id, txt, timeposted, role from comments, users where (users.user_id = comments.user_id) and sub_id='.$_GET["sched"].' order by timeposted';

//echo $sql;

$result = mysql_query($sql);

if (!$result) { die("SQL ERROR"); }

while($row = mysql_fetch_row($result))
{

	$comm .= '<div class="comment"><div class="com_head">';
	
	if($row[5] == 0) { $comm .= '<img src="gfx/user_suit.png">'; } else { $comm .= '<img src="gfx/user_green.png">'; }

	$comm .= '<span class="com_name">'.$row[1].'</span><span class="com_date">'.$row[4].'</span></div>
	<div class="com_body"><pre>
'.$row[3].'
	</pre></div>
</div><br><br>';

}

?>

<h3>Assignment Details</h3>

<table class="gridtable">
	<tr>
		<th>Chapter</th><th>Section</th><th>Title</th><th>Type</th><th>Avalaible</th><th>Due</th><th>Submission</th>
	</tr>

	<?php echo $html; ?>
	<!--
	<tr>
		<td>1</td><td>2</td><td><a href="detail.php">In-Class</a></td><td>07/23/2011 12:00</td><td>07/23/2011 12:00</td><td>-</td>
	</tr>
	-->
</table>
<br>

<!--<ol>
	<li>#include &lt;stdio.h&gt;</li>
	<li>	main() { printf(&quot;Hello World&quot;); }</li>
	<li>more stuff here!!!</li>
</ol>-->

<form action='upload.php?sched=<?php echo $_GET["sched"]; ?>' method="post" enctype="multipart/form-data">
<input type="file" name="file" size="40" <?php echo $submission; ?>><br><br>
<input type="submit" name="submit" value="Submit" <?php echo $submission; ?> />
</form>

<br>

<?php echo $files; ?>

<?php echo $comm; ?>

<form action='comment.php' method="get">
<textarea name="comment" id="comment" cols="85" rows="6"></textarea><br><br>
<input name="sched" type="hidden" value='<?php echo $_GET["sched"]; ?>'>
<input type="submit" value="Add Comment" />
</form>



