<?php

//include_once("auth_root.php");
include_once("conn.php");

/* TODO: Lock out account if this user keeps hitting this page. */

if($role != 0) { die("Account \"".$user_name."\" Is Not Authorized To View This Page.<br><br>This Event Will Be Logged And Reported."); }

$sql = 'select txt, name, email, title, type_name, DATE_FORMAT(timeposted,"%a, %d %b %Y %T CST") AS timeposted, comments.sub_id from comments, users, schedule, types where (schedule.assign_type = types.assign_type) and (schedule.sched_id = comments.sub_id) and (comments.user_id = users.user_id) order by timeposted limit 30';

$result = mysql_query($sql);

$server_url =  "http://".$_SERVER['SERVER_ADDR'].$_SERVER['PHP_SELF'];
$server_url_base =  "http://".$_SERVER['SERVER_ADDR'];
//echo $server_url;

if (!$result) { die("SQL ERROR"); }

$i = 0;
while($row = mysql_fetch_array($result))
{
	$items .= '
        <item>
                <title>'.$row['name'].' - '.$row['title'].' - '.$row['type_name'].'</title>
                <description>'.$row['txt'].'</description>
                <link>'.$server_url_base.'/at/detail.php?sched='.$row['sub_id'].'</link>
		<author>'.$row['email'].' ('.$row['name'].')</author>
		<category domain="comment feed">comments</category>
                <guid>'.$server_url_base.'/at/detail.php?sched='.$row['sub_id'].'random='.$i.'</guid>
                <pubDate>'.$row['timeposted'].'</pubDate>
        </item>
';

	$i++;

}

$now = date("D, d M Y H:i:s T");

//echo $now;

?>
<?xml version="1.0" encoding="UTF-8" ?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
        <title>Assignment Trapper - Comment Feed</title>
        <description>Latest comments listed by date.</description>
        <link><?php echo $server_url; ?></link>
        <lastBuildDate>Fri, 31 Dec 1999 23:59:59 EST</lastBuildDate>
        <pubDate>Fri, 31 Dec 1999 23:59:59 EST</pubDate>
	<language>en-US</language>
	<copyright>Copyright 2011 Steven Schronk</copyright>
	<managingEditor>steven@schronk.com (Steven Schronk)</managingEditor>
	<webMaster>steven@schronk.com (Steven Schronk)</webMaster>
	<ttl>10</ttl>
	<atom:link href="http://www.opentextbook.info/at/comment_feed.php" rel="self" type="application/rss+xml" />
	<image>
		<title>Assignment Trapper - Comment Feed</title>
		<url><?php echo $server_url_base; ?>/at/gfx/bricks.png</url>
		<link><?php echo $server_url_base; ?>/at/comment_feed.php</link>
		<width>32</width>
		<height>32</height>
	</image>
 
<?php echo $items; ?>

</channel>
</rss>

