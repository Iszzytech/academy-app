<?php
session_start();

$con = mysqli_connect('localhost','root','');

mysqli_select_db($con, 'aqueel_db');

if(isset($_POST['submit']))
{
  $fullname = htmlentities(mysqli_real_escape_string($con,$_POST['fname']));
  $dept = htmlentities(mysqli_real_escape_string($con,$_POST['dept']));
  $matric = htmlentities(mysqli_real_escape_string($con,$_POST['matric']));
  $phoneno = htmlentities(mysqli_real_escape_string($con,$_POST['phoneno']));
  $gender = htmlentities(mysqli_real_escape_string($con,$_POST['gender']));
  $email = htmlentities(mysqli_real_escape_string($con,$_POST['email']));
  $password = htmlentities(mysqli_real_escape_string($con,$_POST['pass']));
  $cpassword = htmlentities(mysqli_real_escape_string($con,$_POST['cpass']));
  $newpassword = md5($password);
  $registeredCourses = $_POST['courseid'];


  
  //Check for the password length
  if(strlen($password) < 9){
    echo"<script>alert('Password should be minimum of 9 characters ')</script>";
  }

  //Check for email validation
  $check_email = "SELECT * FROM users WHERE email = '$email'";
  $run_check = mysqli_query($con, $check_email);
  $num = mysqli_num_rows($run_check);
  
  if ($num == 1)
  {
    echo "<script>alert('Email already exist, Please try using another email')</script>";
    echo "<script>window.open('student_info.php', '_self')</script>";
   
  }

  //Check for matric number validation
  $check_matric = "SELECT * FROM users WHERE matric_no = '$matric'";
  $run_check2 = mysqli_query($con, $check_matric);
  $num2 = mysqli_num_rows($run_check2);
  
  if ($num2 == 1)
  {
    echo "<script>alert('Matric Number already exist, Please try using another matric number')</script>";
    echo "<script>window.open('student_info.php', '_self')</script>";
   
  } 

  else if($password !== $cpassword)
  {
    echo "<script>alert('Password and confirm password does not match')</script>";
    echo "<script>window.open('student_info.php', '_self')</script>";
      
  }
  else{
  
    $insert = "INSERT INTO `users`(`name`, `department`, `matric_no`, `phone_no`, `gender`, `email`, `password`) VALUES('$fullname','$dept','$matric','$phoneno','$gender','$email','$newpassword')";
    $query = mysqli_query($con, $insert);
    if($query)
    {
      foreach($registeredCourses as $item)
   {
     $queryCourse = "INSERT INTO `registered_courses`(`student _name`, `matric_no`, `courses`) VALUES('$fullname', '$matric', '$item')";
     $query_run = mysqli_query($con, $queryCourse);
   }

   if($query_run){
    session_destroy();
    echo "<script>alert('Registration successful')</script>";
    echo "<script>window.open('Sign-in.php', '_self')</script>";
    exit();
   } else
    {
      echo "<script>alert('An error occured')</script>";
      echo "<script>window.open('student_info.php', '_self')</script>";
      exit();
    }
  }
  }
}

?>