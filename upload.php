<?php

include_once("auth.php");


if (!$_GET["sched"]) { die("No Assignment Sent"); }

$_GET["sched"] = mysql_real_escape_string($_GET["sched"]);
$_FILES["file"]["name"] = mysql_real_escape_string($_FILES["file"]["name"]);
$_FILES["file"]["size"] = mysql_real_escape_string($_FILES["file"]["size"]);

$sql = "select count(*) as count, class_id, due_date from schedule where due_date > NOW() and sched_id=".$_GET["sched"];

$result = mysql_query($sql);

if (!$result) { die("SQL ERROR"); }

$row = mysql_fetch_row($result);

if($row[0] == 0) { die("Assignment Not Open For Submission"); }

$deadline = $row[1];
$class_id = $row[2];

/* check for correct file extension */
$allowedExtensions = array("c", "cpp", "c++", "h");
if(!in_array(end(explode(".", $_FILES["file"]["name"])), $allowedExtensions)) { die("File Extension Not Correct"); }

/* check for file type */
//echo "File Type:".$_FILES["file"]["type"];
//if ($_FILES["file"]["type"] != "text/plain") { die("Incorrect File Format.<br>Must be C or C++ text file."); }

/* check for file size */
if($_FILES["file"]["size"] > 400000) { die("File Must be Smaller Than 400KB."); }

//echo $_FILES["file"]["tmp_name"];

$data  = file_get_contents($_FILES["file"]["tmp_name"]);

$data = addslashes($data);

//echo "->".$data."<-";

$sql = 'insert into files values("", '.$_GET["sched"].','.$user_id.',"'.$data.'", "'.$_FILES["file"]["name"].'",'.$_FILES["file"]["size"].', NOW())';

//echo $sql;

$result = mysql_query($sql);

if (!$result) { die("SQL ERROR"); }

// send message to user as reciept of file

$uid = md5(uniqid(time()));

$from_name = "Assignment Trapper";
$from_mail = "noreply@opentextbook.info";
$filename = $_FILES["file"]["name"];

$message  = "The attached file has been posted to an assignment.";

$header = "From: ".$from_name." <".$from_mail.">\r\n";
$header .= "Reply-To: ".$replyto."\r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
$header .= "This is a multi-part message in MIME format.\r\n";
$header .= "--".$uid."\r\n";
$header .= "Content-type:text/plain; charset=iso-8859-1\r\n";
$header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
$header .= $message."\r\n\r\n";
$header .= "--".$uid."\r\n";
$header .= "Content-Type: text/plain; name=\"".$filename."\"\r\n"; // use different content types here
//$header .= "Content-Transfer-Encoding: base64\r\n";
$header .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
$header .= $data."\r\n\r\n";
$header .= "--".$uid."--";

mail($user_email, "File Received", "", $header);

/* move to classes page */


echo "Data Posted Sucessfully<br><br>";

echo 'Click <a href=detail_root.php?sched='.$_GET["sched"].'>Here</a> To Return to Assignment Details';


//echo '<html><meta http-equiv="refresh" content="0; detail.php?sched='.$_GET["sched"].'" />Data Posted Sucessfully</html>';

?> 
