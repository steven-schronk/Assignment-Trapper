<?php

include_once("auth_root.php");

include_once("conn.php");

/* TODO: Lock out account if this user keeps hitting this page. */

/* get most recent date for assignment change - this will be the publication date */
$sql = 'select DATE_FORMAT(max(timeposted),"%a, %d %b %Y %T CST") from schedule';

$result = mysql_query($sql);
if (!$result) { die("SQL ERROR"); }
$row = mysql_fetch_array($result);

$pub_date = $row['0'];

//if($role != 0) { die("Account \"".$user_name."\" Is Not Authorized To View This Page.<br><br>This Event Will Be Logged And Reported."); }

if($role == 0) {
	$sql = 'select class_name, title, chapter, type_name, section_id, ava_date, due_date, sched_id, DATE_FORMAT(schedule.timeposted,"%a, %d %b %Y %T CST") AS timeposted, DATE_FORMAT(schedule.timeposted, "%Y%c%d%H%i%S") AS timeposted_num from schedule, class, types where (types.assign_type = schedule.assign_type) and (class.class_id = schedule.class_id) order by schedule.timeposted desc limit 30';

} else {
	// get list of classes this student is in
	$classes = "(";
	$i = 0;
	$sql = 'select class_id from enrollment where user_id='.$user_id;
	// echo $sql;
	$result = mysql_query($sql);
	if (!$result) { die("SQL ERROR: Get Classes"); }
	while( $row = mysql_fetch_array($result))
	{
		if($i == 0 ) {
			$classes .= "schedule.class_id=".$row['class_id'];
		} else {
			$classes .= " or schedule.class_id=".$row['class_id'];
		}
		$i++;
	}
	$classes .= ")";

	$sql = 'select class_name, title, chapter, type_name, section_id, ava_date, due_date, sched_id, DATE_FORMAT(schedule.timeposted,"%a, %d %b %Y %T CST") AS timeposted, DATE_FORMAT(schedule.timeposted, "%Y%c%d%H%i%S") AS timeposted_num from schedule, class, types where (types.assign_type = schedule.assign_type) and (class.class_id = schedule.class_id) and '.$classes.' order by schedule.timeposted desc limit 30';
}

//echo $sql;

$result = mysql_query($sql);

$server_url =  "http://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];
$server_url_base =  "http://".$_SERVER['SERVER_NAME'];
//echo $server_url;

if (!$result) { die("SQL ERROR"); }

$i = 0;
while($row = mysql_fetch_array($result))
{
	$items .= '
        <item>
                <title>'.$row['title'].' - '.$row['type_name'].'</title>
                <description>An assignment for '.$row['class_name'].' has been updated.&lt;p&gt;Name: '.$row['title'].'&lt;p&gt;Chapter: '.$row['chapter'].'&lt;p&gt;Type: '.$row['type_name'].'&lt;p&gt;Section: 
		'.$row['section_id'].'&lt;p&gt;Avaliable Date: '.$row['ava_date'].'
		&lt;p&gt;Due Date: '.$row['due_date'].'</description>
                <link>'.$server_url_base.'/at/detail_root.php?sched='.$row['sched_id'].'&amp;random='.$row['timeposted_num'].'</link>
		<author>steven.schronk@my.tccd.edu (Schronk, Steven)</author>
		<category domain="assignmnet feed">assignments</category>
                <guid>'.$server_url_base.'/at/detail_root.php?sched='.$row['sched_id'].'</guid>
                <pubDate>'.$row['timeposted'].'</pubDate>
        </item>
';
	$i++;
}

$now = date("D, d M Y H:i:s T");



echo '<?xml version="1.0" encoding="UTF-8" ?>';

?>

<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
        <title>Assignment Trapper - Assignment Update Feed</title>
        <description>Latest assignment changes.</description>
        <link><?php echo $server_url; ?></link>
        <lastBuildDate><?php echo $pub_date; ?></lastBuildDate>
        <pubDate><?php echo $pub_date; ?></pubDate>
	<language>en-US</language>
	<copyright>Copyright 2011 Steven Schronk</copyright>
	<managingEditor>steven@schronk.com (Steven Schronk)</managingEditor>
	<webMaster>steven@schronk.com (Steven Schronk)</webMaster>
	<ttl>10</ttl>
	<atom:link href="http://www.opentextbook.info/at/comment_feed.php" rel="self" type="application/rss+xml" />
	<image>
		<title>Assignment Trapper - Assignment Update Feed</title>
		<url><?php echo $server_url_base; ?>/at/gfx/bug.png</url>
		<link><?php echo $server_url_base; ?>/at/assignment_feed.php</link>
		<width>32</width>
		<height>32</height>
	</image>
 
<?php echo $items; ?>

</channel>
</rss>

