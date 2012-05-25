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
if ($_FILES["file"]["type"] != "text/plain") { die("Incorrect File Format.<br>Must be C or C++ text file."); }

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

echo "Data Posted Sucessfully";

?> 
