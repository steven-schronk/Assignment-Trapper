<?php

include_once("auth.php");
include_once("header.php");


$sql = 'select topic_id, topic_name, discussion_sticky, topic_description from discussion_topic order by discussion_sticky desc, topic_name, topic_description';
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)){
	$html .= '<div class="class_block">';
	if($row['discussion_sticky'] == 1 ) { $html .= '<img src="./gfx/lightbulb.png">'; } else { $html .= '<img src="./gfx/lightbulb_off.png">'; }

	$html .= '<a href="./discussion.php?topic='.$row['topic_id'].'" class="topictitle">'.$row['topic_name'].'</a><br><br>
			'.$row['topic_description'].'
		</div>';
}

echo $html;
?>
