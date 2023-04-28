<?php
session_start();
$con = mysqli_connect("localhost","root","");
mysqli_select_db($con, "aqueel_db");


$res = mysqli_query($con, "SELECT * FROM `questions` WHERE `courses` = '$_SESSION[course_category]'");
$totalQuestion = mysqli_num_rows($res);
while ($row = mysqli_fetch_array($res))
{
        $courseName = $row['courses'];

}

//declaring variables
$question_no="";
$question ="";
$opt1="";
$opt2="";
$opt3="";
$opt4="";
$answer="";
$count=0;
$ans="";

$quesno = $_GET["questionno"];
if(isset($_SESSION["answer"][$quesno]))
{
  $ans = $_SESSION["answer"][$quesno];
}

$res1 = mysqli_query($con, "SELECT * FROM `questions` WHERE `courses` = '$_SESSION[course_category]' && `question_no` ='$_GET[questionno]'");
$count = mysqli_num_rows($res1);

if($count == 0)
{
  echo "over";
}
else{

  while($row = mysqli_fetch_array($res1))
  {
    $question_no = $row['question_no'];
    $question = $row['question'];
    $opt1 = $row['opt1'];
    $opt2 = $row['opt2'];
    $opt3 = $row['opt3'];
    $opt4 = $row['opt4'];
    $questionAns = $row['answer'];

  }
  ?>

      <div class="modal-dialog">
      <div class="modal-content">
            <div class="modal-header">
              <div style="float:left;">
               <span style="padding-left:30px; font-size: 20px; font-weight: bolder; color:#006DF0;">
               <?php echo $courseName; ?>
                </span>
             </div>
            </div>
      <div class="modal-header">
            <h3><span class="label label-warning" id="qid"><?php echo $question_no; ?></span> <?php echo $question; ?></h3>
        </div>
      <!-- BODY -->
        <div class="modal-body">
        <div class="col-xs-3 col-xs-offset-5">
               <div id="loadbar" style="display: none;">
                  <div class="blockG" id="rotateG_01"></div>
                  <div class="blockG" id="rotateG_02"></div>
                  <div class="blockG" id="rotateG_03"></div>
                  <div class="blockG" id="rotateG_04"></div>
                  <div class="blockG" id="rotateG_05"></div>
                  <div class="blockG" id="rotateG_06"></div>
                  <div class="blockG" id="rotateG_07"></div>
                  <div class="blockG" id="rotateG_08"></div>
              </div>
          </div>

          <div  class="quiz" id="quiz">
           <label class="element-animation1 btn btn-lg btn-primary btn-block">
           <span class="btn-label">
           <i class="glyphicon glyphicon-chevron-right"></i></span>
           <input type="radio" name="r1" id="r1" value="<?php echo $opt1; ?>" onclick="radioclick(this.value, <?php echo $question_no; ?>)"
            <?php
            if($ans == $opt1)
            {
              echo "checked";
            }
            ?>>
           
            <?php
          if(strpos($opt1,'images/') !== false)
          {
              ?>
              <img src="../admin/<?php echo $opt1 ?>" alt="options" height="30" width="30">
              <?php
          }
          else{
            echo $opt1;
          }
         ?>
          <?php
              if($ans == $opt1){
                echo'<i class="glyphicon glyphicon-ok-circle"></i>';
              }
              else if($opt1 == $questionAns)
              {
                echo'<i id="correct" style="color: green; display: none;" class="glyphicon glyphicon-ok-circle"></i>';
              }
              else{
                echo'<i id="wrong" style="color:red; display: none;" class="glyphicon glyphicon-ok-circle"></i>';
              }
            ?>
          </label>
<!-- QUESTION 1 -->
<label class="element-animation2 btn btn-lg btn-primary btn-block">
             <span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span>
              <input type="radio" name="r1" id="r1" value="<?php echo $opt2; ?>" onclick="radioclick(this.value, <?php echo $question_no; ?>)"
            <?php
            if($ans == $opt2)
            {
              echo "checked";
            }
            ?>>
             <?php
              if(strpos($opt2,'images/') != false)
              {
                  ?>
                  <img src="../admin/<?php echo $opt2; ?>" alt="options" height="30" width="30">
                  <?php
              }
              else{
                echo $opt2;
              }
            ?>
             <?php
              if($ans == $opt2){
                echo'<i class="glyphicon glyphicon-ok-circle"></i>';
              }
              else if($opt2 == $questionAns)
              {
                echo'<i id="correct" style="color: green; display: none;" class="glyphicon glyphicon-ok-circle"></i>';
              }
              else{
                echo'<i id="wrong" style="color:red; display: none;" class="glyphicon glyphicon-ok-circle"></i>';
              }
            ?>
            </label>
           <label class="element-animation3 btn btn-lg btn-primary btn-block"><span class="btn-label">
             <i class="glyphicon glyphicon-chevron-right"></i></span>
             <input type="radio" name="r1" id="r1" value="<?php echo $opt3; ?>" onclick="radioclick(this.value, <?php echo $question_no; ?>)"
            <?php
            if($ans == $opt3)
            {
              echo "checked";
            }
            ?>>
            
             <?php
              if(strpos($opt3,'images/') != false)
              {
                  ?>
                  <img src="../admin/<?php echo $opt3; ?>" alt="options" height="30" width="30">
                  <?php
              }
              else{
                echo $opt3;
              }
            ?>

            <?php
              if($ans == $opt3){
                echo'<i class="glyphicon glyphicon-ok-circle"></i>';
              }
              else if($opt3 == $questionAns)
              {
                echo'<i id="correct" style="color: green; display: none;" class="glyphicon glyphicon-ok-circle"></i>';
              }
              else{
                echo'<i id="wrong" style="color:red; display: none;" class="glyphicon glyphicon-ok-circle"></i>';
              }
            ?>
            </label>
           <label class="element-animation4 btn btn-lg btn-primary btn-block"><span class="btn-label">
             <i class="glyphicon glyphicon-chevron-right"></i>
            </span> 
         
          <input type="radio" name="r1" id="r1" value="<?php echo $opt4; ?>" onclick="radioclick(this.value, <?php echo $question_no; ?>)"
            <?php
            if($ans == $opt4)
            {
              echo "checked";
            }
            ?>> 
            
             <?php
              if(strpos($opt4,'images/') != false)
              {
                  ?>
                  <img src="../admin/<?php echo $opt4; ?>" alt="options" height="30" width="30">
                  <?php
              }
              else{
                echo $opt4;
              }
            ?>

          <?php
              if($ans == $opt4){
                echo'<i class="glyphicon glyphicon-ok-circle"></i>';
              }
              else if($opt4 == $questionAns)
              {
                echo'<i id="correct" style="color: green; display: none;" class="glyphicon glyphicon-ok-circle"></i>';
              }
              else{
                echo'<i id="wrong" style="color:red; display: none;" class="glyphicon glyphicon-ok-circle"></i>';
              }
            ?>
           
               
        </label>

          </div>
        </div>
      </div>
      </div>
  <br>

  <table style="margin-left: 20px; display: none;">
    <!-- FIRST OPTION -->
    <tr>
      <td>
        <input type="radio" name="r1" id="r1" value="<?php echo $opt1; ?>" onclick="radioclick(this.value, <?php echo $question_no; ?>)"
        <?php
        if($ans == $opt1)
        {
          echo "checked";
        }
        ?>>
         </td>
         <td style="padding-left: 10px;">
         <?php
          if(strpos($opt1,'images/') !== false)
          {
              ?>
              <img src="../admin/<?php echo $opt1 ?>" alt="options" height="30" width="30">
              <?php
          }
          else{
            echo $opt1;
          }
         ?>
          </td>

         </td>
      
      </td>
    </tr>

<!--SECOND OPTION -->
    <tr>
          <td>
            <input type="radio" name="r1" id="r1" value="<?php echo $opt2; ?>" onclick="radioclick(this.value, <?php echo $question_no; ?>)"
            <?php
            if($ans == $opt2)
            {
              echo "checked";
            }
            ?>>
            </td>
            <td style="padding-left: 10px;">
            <?php
              if(strpos($opt2,'images/') != false)
              {
                  ?>
                  <img src="../admin/<?php echo $opt2; ?>" alt="options" height="30" width="30">
                  <?php
              }
              else{
                echo $opt2;
              }
            ?>
              </td>

            </td>
          
          </td>
        </tr>

        <!--THIRD OPTION -->
    <tr>
          <td>
            <input type="radio" name="r1" id="r1" value="<?php echo $opt3; ?>" onclick="radioclick(this.value, <?php echo $question_no; ?>)"
            <?php
            if($ans == $opt3)
            {
              echo "checked";
            }
            ?>>
            </td>
            <td style="padding-left: 10px;">
            <?php
              if(strpos($opt3,'images/') != false)
              {
                  ?>
                  <img src="../admin/<?php echo $opt3; ?>" alt="options" height="30" width="30">
                  <?php
              }
              else{
                echo $opt3;
              }
            ?>
              </td>

            </td>
          
          </td>
        </tr>

         <!--FOURTH OPTION -->
    <tr>
          <td>
            <input type="radio" name="r1" id="r1" value="<?php echo $opt4; ?>" onclick="radioclick(this.value, <?php echo $question_no; ?>)"
            <?php
            if($ans == $opt4)
            {
              echo "checked";
            }
            ?>> 
            </td>
            <td style="padding-left: 10px;">
            <?php
              if(strpos($opt4,'images/') != false)
              {
                  ?>
                  <img src="../admin/<?php echo $opt4; ?>" alt="options" height="30" width="30">
                  <?php
              }
              else{
                echo $opt4;
              }
            ?>
              </td>

            </td>
          
          </td>
        </tr>

  </table>

  <?php
}

?>