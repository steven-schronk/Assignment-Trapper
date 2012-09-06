<?php

include_once("auth.php");
include_once("header.php");
include_once("time.php");

if($role != 0) { die("Account \"".$user_name."\" Is Not Authorized To View This Page.<br><br>This Event Will Be Logged And Reported."); }

$sql = 'select role, name, discussion_post.user_id, topic_id, sched_id, post_content, post_time from discussion_post, users where users.user_id = discussion_post.user_id  order by post_time desc limit 75';

//$sql = 'select txt, name, email, title, type_name, DATE_FORMAT(comments.timeposted,"%a, %d %b %Y %T CST") AS timeposted, comments.sub_id, schedule.sched_id, comments.user_id from comments, users, schedule, types where (schedule.assign_type = types.assign_type) and (schedule.sched_id = comments.sub_id) and (comments.user_id = users.user_id) UNION select txt from filecom order by timeposted limit 30';

$result = mysql_query($sql);

$comment_list = '<table class="gridtable">
	<tr>
		<th>Name</th><th>Title</th><th>Type</th><th>Comment</th>
	</tr>';

while($row = mysql_fetch_array($result))
{
	if($row['role'] == 0 ) { $icon = '<div class="com_head_fac"><img src="gfx/user_suit.png">'; } else { $icon = '<div class="com_head"><img src="gfx/user_green.png">'; }

	if($row['sched_id'] == "0"){ $link = '<a href=discussion.php?topic='.$row['topic_id'].'>Link To Topic</a>'; }
	else { $link = '<a href=discussion.php?sched='.$row['sched_id'].'>Link To Assignment Discussion</a>';  }

	$html .= '<div class="comment">'.$icon .'<span class="com_name">'.$row["name"].'</span><span class="com_date">'.$row["post_time"].'</span><span class="com_human">'.absHumanTiming($row["post_time"]).'</span><span class="com_link">'.$link.'</span></div><div class="com_body">'.$row["post_content"].'</div>
	</div><br><br>';

	/*

	$row['txt'] = substr( $row['txt'] ,0, 75);
	$comment_list .= '<tr>';
	$comment_list .= '<td>'.$row['name'].'</td>';
	$comment_list .= '<td><a href=detail_root.php?sched='.$row['sched_id'].'&user='.$row['user_id'].'>'.$row['title'].'</a></td>';
	$comment_list .= '<td>'.$row['type_name'].'</td>';
	$comment_list .= '<td>'.$row['txt'].'</td>';
	$comment_list .= '</tr>';
	*/
}


?>

<h1>Most Recent Discussion Topics In Order of Posting</h1>

<?php echo $html; ?>

