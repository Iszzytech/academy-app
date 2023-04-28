<?php
session_start();
$con = mysqli_connect("localhost","root","");
mysqli_select_db($con, "aqueel_db");

$total_que = 0;
$res = mysqli_query($con, "SELECT * FROM `questions` WHERE `courses` = '$_SESSION[course_category]'");
$total_que = mysqli_num_rows($res);
echo $total_que;




?>