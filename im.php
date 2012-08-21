<?php

include_once("auth.php");

?>

<html>
<script type="text/javascript" src="ajax.js"></script>
<script type="text/javascript" src="debugger.js"></script>
<script>
var last_chat_id = -1;	// chat id of last chat message received
var chat_div;
var chat_json = new Object();
var chat_ping = null;

if(document.layers)
    document.captureEvents(Event.KEYDOWN);
	document.onkeydown =
    function (evt) {
        var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
        if (keyCode == 13) { 
		        document.getElementById('send').click();
        } else return true;
    };

function parse_message_response(){
	var message_count = chat_json.m.length;
	if(message_count > 0) { beep_sound.play(); }
	var message_text = "";
	for(var i = 0; i < message_count; i++){
		message_text += '<div><font color="red">' + chat_json.m[i].t + '</font>&nbsp;';
		message_text += '<font color="blue">' + chat_json.m[i].n + '</font>&nbsp;';
		message_text += chat_json.m[i].c + '</div>';
		last_chat_id = chat_json.m[i].id;
	}
	document.getElementById("chat_window").innerHTML += message_text;
}

function parse_first_resonse(){
	last_chat_id = chat_json.m[0].id;
	getChat("im_chat_update.php?id="+last_chat_id, "chat_window");
}

function update_ping(){
	if(chat_ping > 2000){ document.getElementById("chat_status").innerHTML = "<img src='./gfx/bullet_red.png'>"; }
	else if (chat_ping > 1000){ document.getElementById("chat_status").innerHTML = "<img src='./gfx/bullet_yellow.png'>"; }
	else { document.getElementById("chat_status").innerHTML = "<img src='./gfx/bullet_green.png'>"; }
}

function getChat(url, pageElement){
	// START TIMER
	var timer = new Date();
	var t_start = timer.getTime();
	//debugEvent(url, "get");

	// WE USE A JAVASCRIPT FEATURE HERE CALLED "INNER FUNCTIONS"
	// USING THESE MEANS THE LOCAL VARIABLES RETAIN THEIR VALUES AFTER THE OUTER FUNCTION
	// HAS RETURNED. THIS IS USEFUL FOR THREAD SAFETY, SO
	// REASSIGNING THE ONREADYSTATECHANGE FUNCTION DOESN'T STOMP OVER EARLIER REQUESTS.
	function ajaxBindCallback(){
		if(ajaxRequest.readyState == 0) { window.status = "Waiting...";      }
		if(ajaxRequest.readyState == 1) { window.status = "Loading Page..."; }
		if(ajaxRequest.readyState == 2) { window.status = "Data Received...";}
		if(ajaxRequest.readyState == 3) { window.status = "Interactive...";  }
		if(ajaxRequest.readyState == 4) {
			window.status = "Transaction Complete...";

      // STOP TIMER AND FIND DIFFERENCE
      // MUST CREATE NEW TIMER INSTANCE :)
      var timer2 = new Date();
      var t_end = timer2.getTime();
      var t_diff = t_end - t_start;
      chat_ping = t_diff;
      update_ping();

      // TEST HTTP STATUS CODE - DISPLAY IN DUBUGGER AND STATUS
      switch (ajaxRequest.status.toString()) {
        case "200" :
          window.status = "Page Loaded Sucessfully";
		  chat_json = JSON.parse(ajaxRequest.response);
			if(last_chat_id == -1) {
				parse_first_resonse();
			} else {
		  		parse_message_response();
			}
          debugEvent(url, "got", ajaxRequest.responseText, t_diff);
          break;
        case "403" :
          window.status = "Forbidden...";
          debugEvent(url, "error_403", ajaxRequest.responseText, t_diff);
          break;
        case "404" :
          window.status = "File Not Found...";
          debugEvent(url, "error_404", ajaxRequest.responseText, t_diff);
          break;
        case "500" :
          window.status = "File Not Found...";
          debugEvent(url, "error_500", ajaxRequest.responseText, t_diff);
          break;
        default :
          window.status = "Unknown Ajax Error..."+ajaxRequest.status.toString();
        }
			}
	}
	var ajaxRequest = null;
	// BIND OUR CALLBACK THEN HIT THE SERVER...
	if (window.XMLHttpRequest) {
		ajaxRequest = new XMLHttpRequest();
		ajaxRequest.onreadystatechange = ajaxBindCallback;
		ajaxRequest.open("GET", url, true);
		ajaxRequest.send(null);
	} else if (window.ActiveXObject) {
		ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
		if (ajaxRequest) {
			ajaxRequest.onreadystatechange = ajaxBindCallback;
			ajaxRequest.open("GET", url, true);
			ajaxRequest.send();
			}
		}
}

function start_updates(){
	beep_sound = document.getElementById('beep_sound');
	beep_sound.src = 'sfx/beep.wav';
	click_sound = document.getElementById('click_sound');
	click_sound.src = 'sfx/click.wav';
	document.getElementById('message').focus();
	chat_div = document.getElementById("chat_window");
	getChat("im_chat_update.php?id=-1", "chat_window");
	setInterval(update_chat_messages, 2000);
	update_users_online();
	setInterval(update_users_online, 15000);
}

function update_chat_messages(){
	getChat( "im_chat_update.php?id="+last_chat_id, "chat_window");
	chat_window.scrollTop = chat_window.scrollHeight;
}

function update_users_online(){
	getPage("im_user_update.php", "chat_users", "");
}

function send_message(){
	sendData("im_send_message.php?message="+document.getElementById("message").value);
	click_sound.play();
	document.getElementById("message").value = '';
}

function disable_sound(){
	beep_sound.src = '';
	click_sound.src = '';
}

</script>

<style>

body {
	font-family: Tahoma, sans-serif;
	font-size: 14px;
	background-color: #c5bcff;
}
#chat_window {
	border: solid 1px #000;
	background-color: #fff;
	float: left;
	width: 490px;
	padding-left: 10px;
	overflow:hidden;
	height:300px;
}
#chat_users {
	border: solid 1px #000;
	background-color: #dedede;
	float: right;
	width: 150px;
	padding-left: 10px;
	overflow:hidden;
	height:300px;
}
#users_list {
	list-style-type: none;
}
#users_list li {
	padding-top: 5px;
}
#send {
	padding: 10px;
}
</style>
<body  onLoad="start_updates();">
<audio id="beep_sound" style="display: none;"></audio>
<audio id="click_sound" style="display: none;"></audio>
<div id=chat_window></div>
<div id=chat_users></div>
<div id=chat_input>
	<table><tr>
		<td><textarea id="message" cols=65 rows=1></textarea></td>
		<td><button id="send" onCLick="send_message();">Send</button></td>
		<td><div id=chat_status><img src="./gfx/bullet_green.png"></div></td>
		<tr><td><button onCLick="openDebug();">Debug</button></td><td></td></tr>
	</tr></table>
</div>
</body>
</html>
