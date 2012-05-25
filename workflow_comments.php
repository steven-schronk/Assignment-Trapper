<?php

include_once("auth.php");
include_once("header.php");
include_once("time.php");

if($role != 0) { die("Account \"".$user_name."\" Is Not Authorized To View This Page.<br><br>This Event Will Be Logged And Reported."); }

$sql = 'select txt, name, email, title, type_name, DATE_FORMAT(comments.timeposted,"%a, %d %b %Y %T CST") AS timeposted, comments.sub_id, schedule.sched_id, comments.user_id from comments, users, schedule, types where (schedule.assign_type = types.assign_type) and (schedule.sched_id = comments.sub_id) and (comments.user_id = users.user_id) order by timeposted limit 75';


//$sql = 'select txt, name, email, title, type_name, DATE_FORMAT(comments.timeposted,"%a, %d %b %Y %T CST") AS timeposted, comments.sub_id, schedule.sched_id, comments.user_id from comments, users, schedule, types where (schedule.assign_type = types.assign_type) and (schedule.sched_id = comments.sub_id) and (comments.user_id = users.user_id) UNION select txt from filecom order by timeposted limit 30';

$result = mysql_query($sql);

$comment_list = '<table class="gridtable">
	<tr>
		<th>Role</th><th>Title</th><th>Type</th><th>Comment</th>
	</tr>';

while($row = mysql_fetch_array($result))
{
	$row['txt'] = substr( $row['txt'] ,0, 75);
	$comment_list .= '<tr>';
	$comment_list .= '<td>'.$row['name'].'</td>';
	$comment_list .= '<td><a href=detail_root.php?sched='.$row['sched_id'].'&user='.$row['user_id'].'>'.$row['title'].'</a></td>';
	$comment_list .= '<td>'.$row['type_name'].'</td>';
	$comment_list .= '<td>'.$row['txt'].'</td>';
	$comment_list .= '</tr>';
}

$comment_list .= '</table>';

?>

<h1>Most Recent Comments</h1>

<?php echo $comment_list; ?>

