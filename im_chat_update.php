<?php
include_once("auth.php");
//sleep(1);
$_GET["user"] = mysql_real_escape_string($_GET["user"]);
if($_GET["id"] == -1) {
		$sql = "select chat_id, time(chat_time) as short_chat_time, name, content from chat, users where users.user_id = chat.user_id and chat_time > NOW() - interval 5 minute";
	} else {
		$sql = "select chat_id, time(chat_time) as short_chat_time, name, content from chat, users where users.user_id = chat.user_id and chat_id > ".$_GET["id"]." limit 100";
	}
$result = mysql_query($sql);
$chat_data = '{"m":[';
if(mysql_num_rows($result)){
	while($row = mysql_fetch_array($result)){
		$chat_data .= '{"id": '.$row[chat_id].',"t":"'.$row[short_chat_time].'","n":"'.$row[name].'","c":"'.$row[content].'"},';
	}
	$chat_data = substr($chat_data, 0, -1);
	$chat_data .= ']}';
} else $chat_data .= "]}";
echo $chat_data;
?>
