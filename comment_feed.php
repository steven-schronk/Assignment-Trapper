<?php

include_once("auth_root.php");

/* TODO: Lock out account if this user keeps hitting this page. */

if($role != 0) { die("Account \"".$user_name."\" Is Not Authorized To View This Page.<br><br>This Event Will Be Logged And Reported."); }

?>

<?xml version="1.0" encoding="UTF-8" ?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
        <title>Assignment Trapper - Comment Feed</title>
        <description>Latest comments listed by date.</description>
        <link>http://www.opentextbook.info/at/comment_feed.php</link>
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
		<url>http://www.opentextbook.info/at/gfx/bricks.png</url>
		<link>http://www.opentextbook.info/at/comment_feed.php</link>
		<width>32</width>
		<height>32</height>
	</image>
	<!--
	<textInput>
		<title>Reply</title>
		<description>Reply to student comment.</description>
		<name>comment</name>
		<link>http://www.opentextbook.info/at/m_reply.php</link>
	</textInput>
 	-->
        <item>
                <title>Student, Bobby Section Title</title>
                <description>Here is some text containing an interesting description.</description>
                <link>http://www.opentextbook.info/at/detail.php?sched=3</link>
		<author>student.bobby@my.tccd.edu (Steven Schronk)</author>
		<category domain="comment feed">comments</category>
                <guid>http://www.opentextbook.info/at/detail.php?sched=3</guid>
                <pubDate>Fri, 31 Dec 1999 23:59:59 EST</pubDate>
        </item>
 
</channel>
</rss>

