<?php

include_once("auth.php");
include_once("header.php");
include_once("time.php");

if(isset($_GET['sched'])) {
	$_GET['sched'] = mysql_real_escape_string($_GET['sched']);
	$form = "sched=".$_GET['sched'];
	$sql = 'select name, role, post_content, post_time from discussion_post, users where users.user_id = discussion_post.user_id and sched_id='.$_GET['sched'];
	$sql2 = "select chapter, section_id, title, class_id, schedule.assign_type, ava_date, due_date, sched_id, NOW()-due_date as status, type_name, graded, NOW()-ava_date as ava from schedule, types where (schedule.assign_type = types.assign_type) and sched_id=".$_GET["sched"]." order by due_date desc, ava_date desc";
	$result2 = mysql_query($sql2);
	$row = mysql_fetch_array($result2);

	$html .= '<table class="gridtable">
				<tr>
					<th>#</th><th>Status</th><th>Title</th><th>Type</th><th>Chapter</th><th>Section</th><th>Avalable Date</th><th>Due Date</th><th>Human Time</th>
			</tr>';

	$html .= '<tr>';

	$html .= '<td>'.$row['sched_id'].'</td>';

	// assignment started?
	if($row['ava'] < 0){
		$html .= "<td><img src=gfx/bullet_black.png>";
		$started = false;
	} else {
		// assignment open?
		if($row['status'] > 0 || $row['ava'] < 0) { $html .= "<td><img src=gfx/bullet_delete.png>"; } else { $html .= "<td><img src=gfx/bullet_add.png>"; }
		$started = true;
	}

	// assignment graded?
	if($row['graded']) { $html .= "<img src=gfx/bullet_disk.png>"; } else { $html .= "<img src=gfx/bullet_wrench.png>"; }

	$html .= $help_icon;
	$html .= $file_count;
	$html .= $discussion;
	$html .= '<td><a href="detail_root.php?sched='.$row['sched_id'].'">'.$row['title'].'</a></td><td>'.$row['type_name'].'</td><td>'.$row['chapter'].'</td>';
	$html .= '<td>'.$row['section_id'].'</td><td>'.$row['ava_date'].'</td><td>'.$row['due_date'].'</td>';

	if($started) {
		$html .= '<td>'.absHumanTiming($row['due_date']).'</td>';
	} else {
		$html .= '<td>'.absHumanTiming($row['ava_date']).'</td>';
	}

	if($role != 0 ) { $html .= '<td><a href=help_me.php?sched='.$_GET["sched"].'>'.$help_stat.'</a></td>'; }
	$html .= '</tr>';
	$html .= '</table>';

} else if(isset($_GET['topic'])) {
	$_GET['topic'] = mysql_real_escape_string($_GET['topic']);
	$form = "topic=".$_GET['topic'];
	$sql = 'select name, role, post_content, post_time from discussion_post, users where users.user_id = discussion_post.user_id and topic_id='.$_GET['topic'];
	$sql2 = 'select topic_name, topic_description, discussion_sticky from discussion_topic where topic_id='.$_GET['topic'];
	$result2 = mysql_query($sql2);
	$row2 = mysql_fetch_array($result2);
	$html .= '<div class="class_block">';
	if($row2["discussion_sticky"] == 1 ) { $html .= '<img src="./gfx/lightbulb.png">'; } else { $html .= '<img src="./gfx/lightbulb_off.png">'; }
	$html .= '<a href="./discussion.php?topic='.$_GET['topic'].'" class="topictitle">'.$row2["topic_name"].'</a>
			<br><br>'.$row2["topic_description"].'</div>';
} else { die("Must Send Topic or Assignment Number"); }

$html .= '<br><br>';

$result = mysql_query($sql);
while($row = mysql_fetch_array($result)){

	if($row['role'] == 0 ) { $icon = '<div class="com_head_fac"><img src="gfx/user_suit.png">'; } else { $icon = '<div class="com_head"><img src="gfx/user_green.png">'; }

	$html .= '<div class="comment">'.$icon .'<span class="com_name">'.$row["name"].'</span><span class="com_date">'.$row["post_time"].'</span><span class="com_human">'.absHumanTiming($row["post_time"]).'</span></div><div class="com_body">'.$row["post_content"].'</div>
	</div><br><br>';
}

echo $html;
?>

<div class="comment_box">Add Comment:<form action="discussion_comment.php?<?php echo $form; ?>" method="post">
			<textarea name="comment" id="comment" cols="85" rows="6"></textarea><br><br>
			<input type="submit" value="Add Comment" />
			</form></div>

