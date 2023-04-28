<?php
include "header.php";


include "../DB_Connection/connection.php";

if(isset($_SESSION["end_time"]))
  {
    unset($_SESSION["end_time"]);
     ?>

     <script type="text/javascript">
       window.location.href = window.location.href;

     </script>
      
    <?php
  }
  

?>

<div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

            <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
            <?php
                $correct = 0;
                $wrong = 0;
                $overall_score = 0;
                

                if(isset($_SESSION['answer'] ))
                {
                  for($i=1; $i <= sizeof($_SESSION["answer"]); $i++){
                      $answer = "";
                      $res =  mysqli_query($con, "SELECT * FROM `questions` WHERE `courses`='$_SESSION[course_category]' && `question_no` = '$i'");
                      $res2 = mysqli_query($con,"SELECT * FROM `course_category` WHERE `courses`='$_SESSION[course_category]'");

                      while($row2 = mysqli_fetch_array($res2))
                      {
                        $mark = $row2['mark'];
                        $attainableScore = $row2['total_attainable'];
                      }
                      while($row=mysqli_fetch_array($res))
                      {
                        $answer = $row['answer'];
                      }

                    if(isset($_SESSION["answer"][$i]))
                    {
                          if($answer == $_SESSION["answer"][$i])
                          {
                            $correct = $correct + 1;
                            $overall_score = $correct * $mark;

                          }
                          else{
                            $wrong = $wrong + 1;
                          }
                    }
                    else{

                      $wrong = $wrong + 1;

                    }
                  }
                }
                else{
                  $res2 = mysqli_query($con, "SELECT * FROM `course_category` WHERE `courses`='$_SESSION[course_category]'");
                  while($row2 = mysqli_fetch_array($res2))
                      {
                        $attainableScore = $row2['total_attainable'];
                      }
                }

                $count = 0;
                $result = mysqli_query($con, "SELECT * FROM `questions` WHERE `courses`='$_SESSION[course_category]'");
                $count = mysqli_num_rows($result);
                $wrong = $count - $correct;
            ?>
            <!--NEW -->
            <br>
           <div class="panel">
<center><h1 class="title" style="color:#660033">Result</h1></center><br />
<table class="table table-striped title1" style="font-size:20px;font-weight:1000;">
  <tr style="color:#66CCFF">
    <td>Total Questions</td><td><?php echo $count; ?></td>
  </tr>
  <tr style="color:#99cc32">
    <td>Right Answer&nbsp;<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></td><td><?php echo $correct; ?></td>
  </tr> 
	<tr style="color:red">
    <td>Wrong Answer&nbsp;<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> </td><td><?php echo $wrong; ?></td>
  </tr>
	  <tr style="color:#66CCFF">
      <td>Score&nbsp;<span class="glyphicon glyphicon-star" aria-hidden="true"></span></td><td><?php echo $overall_score; ?></td>
    </tr>
  <tr style="color:#990000">
    <td>Total Attainable Score&nbsp;<span class="glyphicon glyphicon-stats" aria-hidden="true"></span></td><td><?php echo $attainableScore; ?></td>
  </tr>
    </table>
  </div>
  <center><a href="dashboard2.php"><button class="btn btn-success" style="padding: 14px 16px; font-size: 20px;">Check Correction</button></a></center>
<!-- END -->
            
           </div>

           
        </div>




  <?php
  if(isset($_SESSION["exam_start"]))
  {
    $date = date("Y-m-d");
    mysqli_query($con, "INSERT INTO `exam_results`(`matric_no`, `exam_type`, `total_question`, `correct_answer`, `wrong_answer`,`score`,`total_obtainable`,`exam_time` ) VALUES('$matric', '$_SESSION[course_category]', '$count', '$correct', '$wrong','$overall_score', '$attainableScore', '$date' )");


  }

  if(isset($_SESSION["exam_start"]))
  {
    unset($_SESSION["exam_start"]);
     ?>

     <script type="text/javascript">
       window.location.href = window.location.href;

     </script>
      
    <?php
  }
  
  ?>




<?php 
include "footer.php";
?>

