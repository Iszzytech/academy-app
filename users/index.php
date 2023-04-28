<?php
include "header2.php";

if(isset($_SESSION["answer"]))
  {
    unset($_SESSION["answer"]);
     ?>

     <script type="text/javascript">
       window.location.href = window.location.href;

     </script>
      
    <?php
  }
  
  
?>

<div class="profile-container">
				<div class="info-box">
					<img id="pro-timeline" src="img/pro-timeline.jpg"/>
					<div class="pro-title">
	            		<center> <?php echo"<img src='$profileImage' class='profile-image'>"; ?>
                            
	            		 <p id="pro-name"><?php echo "$name"; ?></p>
	            		 <span class="pro-detail"><?php echo "$email"; ?></span> | <span class="pro-detail"><?php echo "$dept"; ?></span><br/><br/>
	            		 </center>
	            	</div>
                </div>
	            <div class="pro-education student"><br/>
    	        <div class="container-fluid" style="padding: 20px 24px;">

<div class="col-lg-6 col-lg-push-3 resMain" style="padding: 14px 16px;">

<div class="col-sm-3 resC" style="margin-right: 5em;">
<a href="regCourses.php"><button type="button" style="padding: 34px 35px; font-size: 12px; background-color: #0000FF; color: white;" class="btn btn-secondary btn-lg"><span class="icon"><i class="material-icons">book</i></span> <br/>REGISTERED COURSES</button></a>
 </div>
    <div class="col-sm-3">
<a href="old_exam_results.php"><button type="button" style="padding: 34px 60px; font-size: 12px;" class="btn btn-primary btn-lg"><span class="icon"><i class="material-icons">announcement</i></span> <br/>RESULT HISTORY</button></a>
</div>

</div>

</div>  
     
                        
	            	</div>    
	            </div>
 
 
<div class="row" style="margin: 0px; padding:0px;">
         <center> <p><span style="padding: 14px 16px; font-size: 20px; color: #0000FF; text-align: center; font-weight: bold; ">Available Mock Examination</span></p> </center>
            <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
            <div class="panel">
          <div class="table-responsive">
              <table class="table table-striped title1">
                  <tr>
                      <td><b>S.N.</b></td>
                      <td><b>Topic</b></td>
                      <td><b>Marks</b></td>
                      <td><b>Total Mark Attainable</b></td>
                      <td><b>Time limit</b></td>
                      
                      <td></td>
                    </tr>
        <?php
         $count = 1;
        $res = mysqli_query($con,"SELECT * FROM `registered_courses` WHERE `matric_no` = '$matric'");
        while($crow = mysqli_fetch_array($res))
        {   
            $regCourses = $crow['courses'];
            $courseRes = mysqli_query($con,"SELECT * FROM `course_category` WHERE `courses` = '$regCourses'");
            while($nRow = mysqli_fetch_array($courseRes))
            {
                $courses = $nRow['courses'];
                $time = $nRow['exam_time_in_minutes'];
                $mark = $nRow['mark'];
                $attain = $nRow['total_attainable']; 

             ?>
               
               
               
               <?php 
               $newQuery = mysqli_query($con,"SELECT * FROM `exam_results` WHERE `matric_no` = '$matric' && `exam_type` = '$courses'");
               $availableCourse = mysqli_query($con,"SELECT * FROM `questions` WHERE `courses` = '$courses'");
               $rowCount = mysqli_num_rows($newQuery);
               $course_have_a_question = mysqli_num_rows($availableCourse);
               if($course_have_a_question != 0 )
               {
                 if ($rowCount == 0)

                 {
                    ?>
                   <tr>
                       <td><?php echo $count++; ?></td>
                       <td><?php echo $courses; ?></td>
                       <td><?php echo $mark; ?></td>
                       <td><?php echo $attain; ?></td>
                       <td><?php echo $time; ?>&nbsp;min</td>
                       <td><b><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;
                       <span class="title1"><b>
                     <input type="button" class="btn btn-success" value="<?php echo $nRow['courses'] ?>" style="margin-top: 10px; background-color: blue; color: white;" onclick="set_exam_type_session(this.value);">
                    </b></span></b></td>
                  </tr>
                 
                    <?php
                
                }
                else{
                 ?>
                     <tr>
                       <td><?php echo $count++; ?></td>
                       <td><?php echo $courses; ?></td>
                       <td><?php echo $mark; ?></td>
                       <td><?php echo $attain; ?></td>
                       <td><?php echo $time; ?>&nbsp;min</td>
                       <td><b><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;
                       <span class="title1"><b>
                     <input type="button" class="btn btn-success" value="<?php echo $nRow['courses'] ?>" style="margin-top: 10px; background-color: blue; color: white;" onclick="set_exam_type_session(this.value);">
                    </b></span></b></td>
                  </tr>
                 
                 <?php
                }
               }  
            }
        }

        ?>
         </table></div></div>
           </div>
        </div>

      


<?php
include "footer.php";
?>

<script type="text/javascript">
   
    function set_exam_type_session(course_category)
    {
       
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){

            if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                window.location = "dashboard.php";
                
            }

        };
         
        
       xmlhttp.open("GET","forajax/set_exam_type_session.php?course_category="+course_category, true);
        xmlhttp.send(null);
    }
</script>