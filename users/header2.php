<?php
session_start();
include "../DB_Connection/connection.php";
if(!isset($_SESSION['matric_no'])){
    
    header('location:../Sign-in.php');
  }
  
?>

<?php
$matric = $_SESSION['matric_no'];
$query = mysqli_query($con,"SELECT * FROM `users` WHERE `matric_no` = '$matric'");
$row = mysqli_fetch_array($query);

$uid = $row['id'];
$name = $row['name'];
$dept = $row['department'];
$phoneNo = $row['phone_no'];
$email = $row['email'];
$profileImage = $row['img_url'];

?>




<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>User Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css1/bootstrap.min.css">
    <link rel="stylesheet" href="css1/font-awesome.min.css">
    <link rel="stylesheet" href="css1/profile.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="style.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>
        #qid {
        padding: 10px 15px;
        -moz-border-radius: 50px;
        -webkit-border-radius: 50px;
        border-radius: 20px;
        }
        label.btn {
            padding: 18px 60px;
            white-space: normal;
            -webkit-transform: scale(1.0);
            -moz-transform: scale(1.0);
            -o-transform: scale(1.0);
            -webkit-transition-duration: .3s;
            -moz-transition-duration: .3s;
            -o-transition-duration: .3s
        }

        label.btn:hover {
            text-shadow: 0 3px 2px rgba(0,0,0,0.4);
            -webkit-transform: scale(1.1);
            -moz-transform: scale(1.1);
            -o-transform: scale(1.1)
        }
        label.btn-block {
            text-align: left;
            position: relative
        }

        label .btn-label {
            position: absolute;
            left: 0;
            top: 0;
            display: inline-block;
            padding: 0 10px;
            background: rgba(0,0,0,.15);
            height: 100%
        }

        label .glyphicon {
            top: 34%
        }
        .element-animation1 {
            animation: animationFrames ease .8s;
            animation-iteration-count: 1;
            transform-origin: 50% 50%;
            -webkit-animation: animationFrames ease .8s;
            -webkit-animation-iteration-count: 1;
            -webkit-transform-origin: 50% 50%;
            -ms-animation: animationFrames ease .8s;
            -ms-animation-iteration-count: 1;
            -ms-transform-origin: 50% 50%
        }
        .element-animation2 {
            animation: animationFrames ease 1s;
            animation-iteration-count: 1;
            transform-origin: 50% 50%;
            -webkit-animation: animationFrames ease 1s;
            -webkit-animation-iteration-count: 1;
            -webkit-transform-origin: 50% 50%;
            -ms-animation: animationFrames ease 1s;
            -ms-animation-iteration-count: 1;
            -ms-transform-origin: 50% 50%
        }
        .element-animation3 {
            animation: animationFrames ease 1.2s;
            animation-iteration-count: 1;
            transform-origin: 50% 50%;
            -webkit-animation: animationFrames ease 1.2s;
            -webkit-animation-iteration-count: 1;
            -webkit-transform-origin: 50% 50%;
            -ms-animation: animationFrames ease 1.2s;
            -ms-animation-iteration-count: 1;
            -ms-transform-origin: 50% 50%
        }
        .element-animation4 {
            animation: animationFrames ease 1.4s;
            animation-iteration-count: 1;
            transform-origin: 50% 50%;
            -webkit-animation: animationFrames ease 1.4s;
            -webkit-animation-iteration-count: 1;
            -webkit-transform-origin: 50% 50%;
            -ms-animation: animationFrames ease 1.4s;
            -ms-animation-iteration-count: 1;
            -ms-transform-origin: 50% 50%
        }
        @keyframes animationFrames {
            0% {
                opacity: 0;
                transform: translate(-1500px,0px)
            }

            60% {
                opacity: 1;
                transform: translate(30px,0px)
            }

            80% {
                transform: translate(-10px,0px)
            }

            100% {
                opacity: 1;
                transform: translate(0px,0px)
            }
        }

        @-webkit-keyframes animationFrames {
            0% {
                opacity: 0;
                -webkit-transform: translate(-1500px,0px)
            }
            60% {
                opacity: 1;
                -webkit-transform: translate(30px,0px)
            }

            80% {
                -webkit-transform: translate(-10px,0px)
            }

            100% {
                opacity: 1;
                -webkit-transform: translate(0px,0px)
            }
        }

        @-ms-keyframes animationFrames {
            0% {
                opacity: 0;
                -ms-transform: translate(-1500px,0px)
            }

            60% {
                opacity: 1;
                -ms-transform: translate(30px,0px)
            }
            80% {
                -ms-transform: translate(-10px,0px)
            }

            100% {
                opacity: 1;
                -ms-transform: translate(0px,0px)
            }
        }

        .modal-header {
            background-color: transparent;
            color: inherit
        }

        .modal-body {
            min-height: 205px
        }
        #loadbar {
            position: absolute;
            width: 62px;
            height: 77px;
            top: 2em
        }
        .blockG {
            position: absolute;
            background-color: #FFF;
            width: 10px;
            height: 24px;
            -moz-border-radius: 8px 8px 0 0;
            -moz-transform: scale(0.4);
            -moz-animation-name: fadeG;
            -moz-animation-duration: .8800000000000001s;
            -moz-animation-iteration-count: infinite;
            -moz-animation-direction: linear;
            -webkit-border-radius: 8px 8px 0 0;
            -webkit-transform: scale(0.4);
            -webkit-animation-name: fadeG;
            -webkit-animation-duration: .8800000000000001s;
            -webkit-animation-iteration-count: infinite;
            -webkit-animation-direction: linear;
            -ms-border-radius: 8px 8px 0 0;
            -ms-transform: scale(0.4);
            -ms-animation-name: fadeG;
            -ms-animation-duration: .8800000000000001s;
            -ms-animation-iteration-count: infinite;
            -ms-animation-direction: linear;
            -o-border-radius: 8px 8px 0 0;
            -o-transform: scale(0.4);
            -o-animation-name: fadeG;
            -o-animation-duration: .8800000000000001s;
            -o-animation-iteration-count: infinite;
            -o-animation-direction: linear;
            border-radius: 8px 8px 0 0;
            transform: scale(0.4);
            animation-name: fadeG;
            animation-duration: .8800000000000001s;
            animation-iteration-count: infinite;
            animation-direction: linear
        }
        #rotateG_01 {
            left: 0;
            top: 28px;
            -moz-animation-delay: .33s;
            -moz-transform: rotate(-90deg);
            -webkit-animation-delay: .33s;
            -webkit-transform: rotate(-90deg);
            -ms-animation-delay: .33s;
            -ms-transform: rotate(-90deg);
            -o-animation-delay: .33s;
            -o-transform: rotate(-90deg);
            animation-delay: .33s;
            transform: rotate(-90deg)
        }
        #rotateG_02 {
            left: 8px;
            top: 10px;
            -moz-animation-delay: .44000000000000006s;
            -moz-transform: rotate(-45deg);
            -webkit-animation-delay: .44000000000000006s;
            -webkit-transform: rotate(-45deg);
            -ms-animation-delay: .44000000000000006s;
            -ms-transform: rotate(-45deg);
            -o-animation-delay: .44000000000000006s;
            -o-transform: rotate(-45deg);
            animation-delay: .44000000000000006s;
            transform: rotate(-45deg)
        }
        #rotateG_03 {
            left: 26px;
            top: 3px;
            -moz-animation-delay: .55s;
            -moz-transform: rotate(0deg);
            -webkit-animation-delay: .55s;
            -webkit-transform: rotate(0deg);
            -ms-animation-delay: .55s;
            -ms-transform: rotate(0deg);
            -o-animation-delay: .55s;
            -o-transform: rotate(0deg);
            animation-delay: .55s;
            transform: rotate(0deg)
        }
        #rotateG_04 {
            right: 8px;
            top: 10px;
            -moz-animation-delay: .66s;
            -moz-transform: rotate(45deg);
            -webkit-animation-delay: .66s;
            -webkit-transform: rotate(45deg);
            -ms-animation-delay: .66s;
            -ms-transform: rotate(45deg);
            -o-animation-delay: .66s;
            -o-transform: rotate(45deg);
            animation-delay: .66s;
            transform: rotate(45deg)
        }
        #rotateG_05 {
            right: 0;
            top: 28px;
            -moz-animation-delay: .7700000000000001s;
            -moz-transform: rotate(90deg);
            -webkit-animation-delay: .7700000000000001s;
            -webkit-transform: rotate(90deg);
            -ms-animation-delay: .7700000000000001s;
            -ms-transform: rotate(90deg);
            -o-animation-delay: .7700000000000001s;
            -o-transform: rotate(90deg);
            animation-delay: .7700000000000001s;
            transform: rotate(90deg)
        }
        #rotateG_06 {
            right: 8px;
            bottom: 7px;
            -moz-animation-delay: .8800000000000001s;
            -moz-transform: rotate(135deg);
            -webkit-animation-delay: .8800000000000001s;
            -webkit-transform: rotate(135deg);
            -ms-animation-delay: .8800000000000001s;
            -ms-transform: rotate(135deg);
            -o-animation-delay: .8800000000000001s;
            -o-transform: rotate(135deg);
            animation-delay: .8800000000000001s;
            transform: rotate(135deg)
        }
        #rotateG_07 {
            bottom: 0;
            left: 26px;
            -moz-animation-delay: .99s;
            -moz-transform: rotate(180deg);
            -webkit-animation-delay: .99s;
            -webkit-transform: rotate(180deg);
            -ms-animation-delay: .99s;
            -ms-transform: rotate(180deg);
            -o-animation-delay: .99s;
            -o-transform: rotate(180deg);
            animation-delay: .99s;
            transform: rotate(180deg)
        }
        #rotateG_08 {
            left: 8px;
            bottom: 7px;
            -moz-animation-delay: 1.1s;
            -moz-transform: rotate(-135deg);
            -webkit-animation-delay: 1.1s;
            -webkit-transform: rotate(-135deg);
            -ms-animation-delay: 1.1s;
            -ms-transform: rotate(-135deg);
            -o-animation-delay: 1.1s;
            -o-transform: rotate(-135deg);
            animation-delay: 1.1s;
            transform: rotate(-135deg)
        }
        @-moz-keyframes fadeG {
            0% {
                background-color: #000
            }

            100% {
                background-color: #FFF
            }
        }

        @-webkit-keyframes fadeG {
            0% {
                background-color: #000
            }

            100% {
                background-color: #FFF
            }
        }

        @-ms-keyframes fadeG {
            0% {
                background-color: #000
            }

            100% {
                background-color: #FFF
            }
        }

        @-o-keyframes fadeG {
            0% {
                background-color: #000
            }
            100% {
                background-color: #FFF
            }
        }

        @keyframes fadeG {
            0% {
                background-color: #000
            }

            100% {
                background-color: #FFF
            }
        }


        .navbar{
            width: 100%;
            display: flex;
            align-items: center;
        }

        .menu-icon {
            width: 25px;
            cursor: pointer;
            display:none;

        }

        .scrollable{
            height: auto;
            overflow: scroll;
        }

        .btn_changedp{
      height: 50px;
      width: 50px;
      border-radius: 50%;
      margin-left: -60px;
      box-shadow: 1px 2px 3px rgba(100,100,100,0.5);
       background-color: #14CE8D;     
    }

        .setting-container, .inbox-container{
        display: block;
        font-family: 'Ropa Sans';
        width: 100%;
        height: 100%;
        margin-top: 2%; 
      }

      .heading{
        text-align: center;
        font-family: calibri;
        font-size: 26px;
        padding: 14px;
        background-color: #FAFAFA;
        border-bottom: 1px solid rgb(210,210,210);
      }

            table.setting_table{
        width: 100%;
        box-shadow: 1px 1px 5px 2px rgba(0,0,0,0.1);
      }

      table.setting_table tr{
        border-bottom: 1px solid rgba(100,100,100,0.08);
        background-color: rgb(250,250,250);
        cursor: pointer;
      }

      table.setting_table tr:hover{ 
        background-color: #F5F5F5;
      }

      table.setting_table td{
        padding: 20px;
      }

      table.setting_table td.col-1{
        width: 20%;
        color:black;
      }

      table.setting_table td.col-2{
        width: 75%;
        color: rgba(0,0,0,0.5);
      }

      table.setting_table td.col-3{
        width: 5%;
        color: rgb(0,0,200);
      }

      table tr td input{
        border: 1px solid rgba(200,200,200,0.7);
        border-radius: 5px;
        width: 100%;
        padding: 5px;
        margin:0;
      }



       @media only screen and (max-width: 700px) 
       {
           nav .res {
               width: 100%;
               background: #006DF0;
               position: absolute;
               top: 75px;
               right: 0;
               z-index: 2;
               max-height: 0px;
              
           }

           nav .res .resLi {
               display: block;
               margin-top: 10px;
               margin-bottom: 10px;
       }

       nav .res .resLi .resA {
           color: #fff;
             }

        .menu-icon{
            display: block;
            cursor: pointer;

        }   
        
        .resMenu {
            margin-top: -6em;
            left: 60px;
            width: auto; 
        }

       #menuList 
       {
           overflow: hidden !important;
           transition: 0.5s !important;      
        }

        .resC {
            margin-bottom: 2em;
            
        }

         .resMain{
            top: 50%;
            left: 50%;
            transform: translate(-40%, -0%);
         }   
            }
    </style>
</head>

<body>

    <div class="all-content-wrapper">

        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
													<i class="educate-icon educate-nav"></i>
												</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                            <div class="navbar">
                                            <img src="../images/Hamburger.png" class="menu-icon" onclick="togglemenu()">
                                            <nav>
                                            <ul id="menuList" class="nav navbar-nav mai-top-nav res">
                                                <li class="nav-item resLi"><a href="index.php" class="nav-link resA">Dashboard</a>
                                                </li>
                                                <li class="nav-item resLi"><a href="old_exam_results.php" class="nav-link resA">Last Result</a>
                                                </li>
                                                <li class="nav-item resLi"><a href="regCourses.php" class="nav-link resA">Registered Courses</a>
                                                </li>
                                                <li class="nav-item resLi"><a href="logout.php" class="nav-link resA">Logout</a>
                                                </li>
                                            </ul>
                                            </nav>
                                            
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        var menuList = document.getElementById("menuList");
                                      
                                        function togglemenu()
                                        {
                                        
                                            if (menuList.style.maxHeight === "0px")
                                            {
                                              menuList.style.maxHeight = "400px";
                                            }
                                            else{
                                                menuList.style.maxHeight = "0px";
                                            }

                                        }
                                    </script>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-11 resMenu">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">


                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                    <?php echo"<img src='$profileImage'>"; ?>
                                              <span class="admin-name"><?php echo $name; ?></span>
                                              <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                            </a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li><a href="edit_profile.php"><span class="edu-icon edu-user-rounded author-log-ic"></span>Edit Profile</a>
                                                        </li>
                                                        <li><a href="logout.php"><span class="edu-icon edu-locked author-log-ic"></span>Log Out</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                
                                                        </ul>


                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu start -->

            

            <!-- Mobile Menu end -->
           
        </div>

        <script type="text/javascript">
    setInterval(function(){
        timer();
    },1000);
    function timer()
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                if(xmlhttp.responseText=="00:00:01")
                {
                    window.location="result.php";
                }

                document.getElementById("countdowntimer").innerHTML=xmlhttp.responseText;

            }
        };
        xmlhttp.open("GET","forajax/load_timer.php",true);
        xmlhttp.send(null);
    }

    </script>