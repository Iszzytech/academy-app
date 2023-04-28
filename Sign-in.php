<?php
session_start();
include('DB_Connection/connection.php');

?>


<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Login Now">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Sign in</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
    <link rel="stylesheet" href="login.css" type="text/css">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 4.5.4, nicepage.com">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"logo": "images/logoMain.jpg"
    }   
</script>

    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Sign in">
    <meta property="og:type" content="website">
    <style>

      .signInRes{
        display: none;
        cursor: pointer;
      }
      @media only screen and (max-width: 700px)
        {
          .res{
               margin-top: -5em !important;
          }

          .regCont {
            display: none !important;
          }
          
          .signinCont{
            width: 100% !important;
           
            
          }

          .signupCont{
            width: 100% !important;
            margin: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) !important;

          
          }
          span {
            font-size: 14px;
            font-weight: 100;
            line-height: 20px;
            letter-spacing: 0.5px;
            margin: 20px 0 30px;
            color: green;
          }

          .signInRes{
            display: block;
            cursor: pointer;
          }
         
        }  
    </style>
  </head>


  <body class="u-body u-xl-mode">
  <header class="u-clearfix u-header u-header res" id="sec-d5c7">
    <div class="u-clearfix u-sheet u-sheet-1">
        <a href="index.html" class="u-image u-logo u-image-1" data-image-width="500" data-image-height="200">
          <img src="images/logoMain.jpg" class="u-logo-image u-logo-image-1">
        </a>
        <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
          <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
            <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
              <svg class="u-svg-link" viewBox="0 0 24 24"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
              <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
</g></svg>
            </a>
          </div>
          <div class="u-custom-menu u-nav-container">
            <ul class="u-nav u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Sign-in.php" style="padding: 10px 20px;">Sign in</a>
</li></ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                  <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Sign-in.php" style="padding: 10px 20px;">Sign in</a>
</li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div>
    </header>
   
    <!--SIGN IN AND SIGN UP PAGE-->
    
<div class="cont" id="container">
  <center>
	<div class="form-container sign-up-container signupCont">
		<form action="#" method="POST">
			<h1>Register</h1>
			<span style="margin-bottom: 10px;">Enter your registration code</span>
      <div class="alert alert-danger" id="failure2" style="padding: 10px; margin-top: 5px; display: none; font-size: 11px;">
       <strong>Invalid!</strong> Registration code does not exist
       </div>
       <div class="alert alert-danger" id="failure3" style="padding: 10px; margin-top: 5px; display: none; font-size: 11px;">
       <strong>Error!</strong> Registration is already used
       </div>
			<input type="text" name="regCode" placeholder="Registration Code" /><br/>
      <p class="signInRes"> Already a member? <span id="signInR">Login</span></p>
			<button style="color: white; margin-top: 10px;" type="submit" name="btn_submit">Continue</button>
		</form>

    <?php
    
    
     if(isset($_POST['btn_submit']))
     {
        $regCode = htmlentities(mysqli_real_escape_string($con, $_POST['regCode']));
        $token ="used";
        $newToken = "unused";

        $query = "SELECT * FROM registrationtoken WHERE tokens ='$regCode' && tokenstatus ='$newToken'";
        $result = mysqli_query($con, $query);
        $num = mysqli_num_rows($result);

        $query2 = "SELECT * FROM registrationtoken WHERE tokens ='$regCode' && tokenstatus ='$token'";
        $result2 = mysqli_query($con, $query2);
        $num2 = mysqli_num_rows($result2);

        if($num == 1)
        {
       
          $updateQuery = "UPDATE registrationtoken SET tokenstatus = 'used' WHERE tokens = '$regCode'";
          $uquery = mysqli_query($con, $updateQuery);
          if($uquery){
            $_SESSION['regcodeToken'] = $regCode;

            ?>
            <script type="text/javascript">
               window.location = "student_info.php";
            </script>
            <?php
          }
          else{
            ?>
        <script type="text/javascript">
          document.getElementById("failure2").style.display = 'block';
          document.getElementById("failure3").style.display = 'none';
        </script>
            <?php
           
          }
          exit();
        }
        else if($num2 == 1)
        {
          ?>
        <script type="text/javascript">
          document.getElementById("failure3").style.display = 'block';
          document.getElementById("failure2").style.display = 'none';
        </script>
            <?php
        }
        else{
          ?>
        <script type="text/javascript">
          document.getElementById("failure2").style.display = 'block';
          document.getElementById("failure3").style.display = 'none';
        </script>
            <?php
        }

     }
    ?>
	</div>
  </center>
	<div class="form-container sign-in-container signinCont">
    
		<form action="" name="loginForm" method="post">
			<h1>Sign in</h1>
		
			<span>Login into your account to access your dashboard</span>
      <div class="alert alert-danger" id="failure" style="padding: 10px; margin-top: 5px; display: none; font-size: 11px;">
       <strong>Does Not Match!</strong> Invalid Matric Number or Password
       </div>
			<input style="margin-bottom: 10px;" name="txt_matric" type="text" placeholder="Matric Number" />
			<input name="txt_pass" type="password" placeholder="Password" />
			<a href="#">Forgot your password?</a> <p class="signInRes"> Not yet a member? <span id="signUpR">Register</span></p>
			<button style="color: white;" name="btn_login" type="submit">Sign In</button>
		</form>
    <?php

     if(isset($_POST['btn_login']))
     {
       $loginMatric = htmlentities(mysqli_real_escape_string($con,$_POST['txt_matric']));
       $loginPass = htmlentities(mysqli_real_escape_string($con,$_POST['txt_pass']));
       $loginPass = md5($loginPass);
       //Check if user doesn't exist
       $fetchRows = 0;
       $queryLogin = "SELECT * FROM users WHERE `matric_no` = '$loginMatric' && `password` = '$loginPass'";
       $getResult = mysqli_query($con, $queryLogin);
       $fetchRows = mysqli_num_rows($getResult);

       if($fetchRows == 0 ){
        
        ?>

       <script type="text/javascript">
         document.getElementById("failure").style.display = 'block';
       </script>

        <?php

       } 
       
       else 
          {
              $_SESSION['matric_no'] = $loginMatric;
              ?>
              <script type="text/javascript">
                window.location = "users/index.php";
              </script>

              <?php
          }

     }

    ?>

	</div>
	<div class="overlay-container regCont">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right ">
				<h1>Hello, Student!</h1>
				<p>Enter your registration code to gain access to the online mock exam</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>



<script>

  const signUpButton = document.getElementById('signUp');
  const signInButton = document.getElementById('signIn');
  const container = document.getElementById('container');
  
  signUpButton.addEventListener('click', () => {
    container.classList.add("right-panel-active");
  });
  
  signInButton.addEventListener('click', () => {
    container.classList.remove("right-panel-active");
  });
    </script>

<script>

const signUpButtonR = document.getElementById('signUpR');
const signInButtonR = document.getElementById('signInR');
const containerR = document.getElementById('container');

signUpButtonR.addEventListener('click', () => {
  containerR.classList.add("right-panel-active");
});

signInButtonR.addEventListener('click', () => {
  containerR.classList.remove("right-panel-active");
});
  </script>

  
   
  </body>
</html>