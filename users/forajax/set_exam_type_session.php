<?php
session_start();
$con = mysqli_connect("localhost","root","");
mysqli_select_db($con, "aqueel_db");


$courseName = $_GET['course_category'];
$_SESSION['course_category'] = $courseName;
$duration = "";
$res = mysqli_query($con, "SELECT * FROM `course_category` WHERE `courses` = '$courseName'");
while($row = mysqli_fetch_array($res))
{
$duration = $row["exam_time_in_minutes"];

}

$_SESSION["duration"] = $duration;
$_SESSION["start_time"]=date("Y-m-d H:i:s");

$end_time = date('Y-m-d H:i:s', strtotime('+'.$_SESSION["duration"].'minutes', strtotime($_SESSION["start_time"])));

$_SESSION["end_time"] = $end_time;
$_SESSION["exam_start"] = "yes";



?>