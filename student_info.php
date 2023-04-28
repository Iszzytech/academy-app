<?php
session_start();
include("DB_Connection/connection.php");

if(!isset($_SESSION['regcodeToken'])){
    
  header('location:index.html');
}

?>


<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Student_info</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
    <link rel="stylesheet" href="Student_info.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    

     <style type="text/css">
       #regiration_form fieldset:not(:first-of-type)
       {
          display: none;
       }
       
       .res {
        padding: 14px 16px;
      }

      @media only screen and (max-width: 700px)
      {
        .res {
          display: none !important;
        }
      }
       
     </style>

  </head>
  <body class="u-body u-xl-mode" style="background-color: beige;"><header style="background-color: white;" class="u-clearfix u-header u-header" id="sec-d5c7"><div class="u-clearfix u-sheet u-sheet-1">
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
            <ul class="u-nav u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="index.html" style="padding: 10px 20px;">Back to Homepage</a>
</li></ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Index.html" style="padding: 10px 20px;">Back to Homepage</a>
</li></ul>        
             </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div></header>
    <section class="u-align-center u-clearfix u-section-1" id="sec-5c7b">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-tab-links-align-left u-tabs u-tabs-1">
          <div class="u-tab-content">
            <div class="u-container-style u-tab-active u-tab-pane u-white u-tab-pane-1" id="tab-0da5" role="tabpanel" aria-labelledby="link-tab-0da5">
              <div class="u-container-layout u-container-layout-1">
                <div class="u-form u-form-1">

                  <!--STUDENT FORM -->
               <div class="container" style="width: 100%;">
                <h1></h1>
              <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              
              <form id="regiration_form" novalidate action="registerusers.php"  method="post">
              <fieldset>
                <h3>Step 1: Create your account</h3>
                <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" id="name" name="fname" class="form-control" required>
                </div>
                <div class="form-group">
                <label for="Department">Department</label>
                <input type="text" id="depart" name="dept" class="form-control" required>
                </div>
                <div class="form-group">
                <label for="Matric Number">Matric Number</label>
                <input type="text" onkeydown ="isInputNumber(event)" id="mat" maxlength="9"  name="matric" class="form-control" required>
                </div>
                <div class="form-group">
                <label for="Phone Number">Phone Number</label>
                <input type="text" onkeypress="isInputNumber(event)" maxlength="11" id="phone" name="phoneno" class="form-control" required>
                </div>
                <div class="form-group">
                <label for="Gender">Gender</label>
                <select name="gender" class="form-control" required> 
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Others">Others</option>
                </select>
                </div>
                <div class="form-group">
                <label for="email">Email address</label>
                <div class="alert alert-danger" id="failure" style="padding: 10px; margin-top: 5px; display: none; font-size: 11px;">
               <strong>Invalid Email!</strong> Email is not a valid email 
                </div>
                <div class="alert alert-success" id="success" style="padding: 10px; margin-top: 5px; display: none; font-size: 11px;">
               <strong>Valid Email!</strong> Email is valid 
                </div>
                <input type="email" id="e-mail" onkeypress="checkEmail()" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" id="passw" name="pass" class="form-control" required>
                </div>
                <div class="form-group">
                <label for="exampleInputPassword2">Confirm Password</label>
                <input type="password" id="cpassw" name="cpass" class="form-control" required>
                </div>
                <input type="button" id="btn_next" name="btn_next" class="next btn btn-info" value="Next" disabled/>
              </fieldset>
              <fieldset>
                <h3> Select courses you wish to apply for</h3>
                <div class="form-group">
                <input type="checkbox" name="courseid[]" id="course_mat108" value="Mat 108"> 
                <label for="course_mat108">Mat 108</label>
                </div>
                <div class="form-group">
                <input type="checkbox" name="courseid[]" id="course_mat112" value="Mat 112"> 
                <label for="course_mat112">Mat 112</label>
                </div>
                <div class="form-group">
                <input type="checkbox" name="courseid[]" onchange="checkCourse()" id="course_mat142" value="Mat 142"> 
                <label for="course_mat142">Mat 142</label>
                </div>
                <div class="form-group">
                <input type="checkbox" name="courseid[]" onchange="checkCourse()" id="course_mat162" value="Mat 162"> 
                <label for="course_mat162">Mat 162</label>
                </div>
                <div class="form-group">
                <input type="checkbox" name="courseid[]" onchange="checkCourse()" id="course_mat172" value="Mat 172"> 
                <label for="course_mat172">Mat 172</label>
                </div>
                <div class="form-group">
                <input type="checkbox" name="courseid[]" onchange="checkCourse()" id="course_phy102" value="Phy 102"> 
                <label for="course_phy102">Phy 102</label>
                </div>
                <div class="form-group">
                <input type="checkbox" name="courseid[]" onchange="checkCourse()" id="course_phy104" value="Phy 104"> 
                <label for="course_phy104">Phy 104</label>
                </div>
                <div class="form-group">
                <input type="checkbox" name="courseid[]" onchange="checkCourse()" id="course_chm102" value="Chm 102"> 
                <label for="course_chm102">Chm 102</label>
                </div>
                <div class="form-group">
                <input type="checkbox" name="courseid[]" onchange="checkCourse()" id="course_bot102" value="Bot 102"> 
                <label for="course_bot102">Bot 102</label>
                </div>
                <div class="form-group">
                <input type="checkbox" name="courseid[]" onchange="checkCourse()" id="course_zoo102" value="Zoo 102"> 
                <label for="course_zoo102">Zoo 102</label>
                </div>
                <div class="form-group">
                <input type="checkbox" name="courseid[]" onchange="checkCourse()" id="course_bio102" value="Bio 102"> 
                <label for="course_bio102">Bio 102</label>
                </div>
                <div class="form-group">
                <input type="checkbox" name="courseid[]" onchange="checkCourse()" id="course_csc112" value="Csc 112"> 
                <label for="course_csc112">Csc 112</label>
                </div>
                <div class="form-group">
                <input type="checkbox" name="courseid[]" onchange="checkCourse()" id="course_csc120" value="Csc 120"> 
                <label for="course_csc120">Csc 120</label>
                </div>
                <div class="form-group">
                <input type="checkbox" name="courseid[]" onchange="checkCourse()" id="course_csc104" value="Csc 104"> 
                <label for="course_csc104">Csc 104</label>
                </div>
                <div class="form-group">
                <input type="checkbox" name="courseid[]" onchange="checkCourse()" id="course_csc132" value="Csc 132"> 
                <label for="course_csc132">Csc 132</label>
                </div>
                
                <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                <input type="button" name="next" id="btn_course" class="next btn btn-info" value="Next" disabled/>
              </fieldset>
              <fieldset>
                <h3>Step 3: Feedback</h3>
                <div class="form-group">
                <label>Confirm details before submitting it all</label>
                
                </div>
                <div class="form-group">
                <img src="images/cont2.jpg" style="width: 50%; height: 50%;"/>
                <label for="address">Click the button below to submit data</label>
                </div>
                <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                <input type="submit" name="submit" class="submit btn btn-success" value="Submit" id="submit_data" />
              </fieldset>
              </form>
              </div>
                   
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    
    <footer class="u-clearfix u-footer u-grey-80" id="sec-99ba"><div class="u-clearfix u-sheet u-sheet-1">
        <a href="https://nicepage.com" class="u-image u-logo u-image-1" data-image-width="500" data-image-height="200">
          <img src="images/logo.png" class="u-logo-image u-logo-image-1 res">
        </a>
        <p class="u-text u-text-default u-text-1">Designed by Iszzytech @copyright 2022. All Right Reserved</p>
      </div></footer>
  
  </body>
</html>
<script type="text/javascript">
$(document).ready(function(){
	var current = 1,current_step,next_step,steps;
	steps = $("fieldset").length;
	$(".next").click(function(){
		current_step = $(this).parent();
		next_step = $(this).parent().next();
		next_step.show();
		current_step.hide();
		setProgressBar(++current);
	});
	$(".previous").click(function(){
		current_step = $(this).parent();
		next_step = $(this).parent().prev();
		next_step.show();
		current_step.hide();
		setProgressBar(--current);
	});
	setProgressBar(current);
	// Change progress bar action
	function setProgressBar(curStep){
		var percent = parseFloat(100 / steps) * curStep;
		percent = percent.toFixed();
		$(".progress-bar")
			.css("width",percent+"%")
			.html(percent+"%");		
	}
});

//Disable buttons if fields are empty
const submitBtn = document.getElementById("btn_next");
const fullname = document.getElementById("name");
const department = document.getElementById("depart");
const matricno = document.getElementById("mat");
const phoneno = document.getElementById("phone");
const email = document.getElementById("e-mail");
const pass = document.getElementById("passw");
const cpass = document.getElementById("cpassw");

  
function updateSubmitBtn(){
const fullNameValue = fullname.value.trim();
const deptValue = department.value.trim();
const matricValue = matricno.value.trim();
const phoneValue = phoneno.value.trim();
const emailValue = email.value.trim();
const passValue = pass.value.trim();
const cpassValue = cpass.value.trim();
debugger;

if(fullNameValue && deptValue && matricValue && phoneValue && emailValue && passValue && cpassValue){
  submitBtn.removeAttribute('disabled');
}else {
  submitBtn.setAttribute('disabled', 'disabled');
}
}

fullname.addEventListener('change', updateSubmitBtn);
department.addEventListener('change', updateSubmitBtn);
matricno.addEventListener('change', updateSubmitBtn);
phoneno.addEventListener('change', updateSubmitBtn);
email.addEventListener('change', updateSubmitBtn);
pass.addEventListener('change', updateSubmitBtn);
cpass.addEventListener('change', updateSubmitBtn);
  
//Allowing only numbers
function isInputNumber(evt){
  var ch = String.fromCharCode(evt.which);
  if(!(/[0-9]/.test(ch))){
    evt.preventDefault();
  }
}

//Checking Email
function checkEmail() {
    var em = document.getElementById('e-mail').value;
    
    // pattern
    var emailRegexp = /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i;
    
    // check
    if(emailRegexp.test(em)) {
       document.getElementById("failure").style.display = 'none';
       document.getElementById("success").style.display = 'block';
       setTimeout("document.getElementById('success').style.display = 'none'", 2000);
       submitBtn.style.display = 'block';
    }
    else {
       document.getElementById("success").style.display = 'none';
       document.getElementById("failure").style.display = 'block';
       submitBtn.style.display = 'none';
    }
}


//Checking Courses
function checkCourse()
{
  $btn_course = document.getElementById("btn_course");
  $mat108 = document.getElementById("course_mat108").checked;
  $mat112 = document.getElementById("course_mat112").checked;
  $mat142 = document.getElementById("course_mat142").checked;
  $mat162 = document.getElementById("course_mat162").checked;
  $mat172 = document.getElementById("course_mat172").checked;
  $phy102 = document.getElementById("course_phy102").checked;
  $phy104 = document.getElementById("course_phy104").checked;
  $chm102 = document.getElementById("course_chm102").checked;
  $bot102 = document.getElementById("course_bot102").checked;
  $zoo102 = document.getElementById("course_zoo102").checked;
  $bio102 = document.getElementById("course_bio102").checked;
  $csc112 = document.getElementById("course_csc112").checked;
  $csc120 = document.getElementById("course_csc120").checked;
  $csc104 = document.getElementById("course_csc104").checked;
  $csc132 = document.getElementById("course_csc132").checked;


  if ( $mat108 === false && $mat112 === false && $mat142 === false && $mat162 === false && $mat172 === false && $phy102 === false && $phy104 === false && $chm102 === false && $bot102 === false && $zoo102 === false && $bio102 === false && $csc112 === false && $csc120 === false && $csc104 === false && $csc132 === false) 
  {
        $btn_course.setAttribute('disabled', 'disabled');
  }else{
    $btn_course.removeAttribute('disabled');
  }
}
</script>