<?php
include "header.php";
include "../DB_Connection/connection.php";


?>

<div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

            <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">

            <center><h1 style="margin-top: 12px;">Old Exam Results</h1></center>

            <?php

$count = 0;
$res=mysqli_query($con,"SELECT * FROM `registered_courses` WHERE `matric_no` = '$matric'");
$count = mysqli_num_rows($res);

if($count == 0)
{
  ?>
  <center><h2>No Results Found!</h2></center>
  <?php
} 
else 
{

  ?>

  <div class="scrollable">
       <table class="table table-striped table-bordered table-sm " cellspacing="0" width="100%">
              <thead>
                  <tr>
                      <th scope="col">#</th>
                      <th scope="col">Matric Number</th>
                      <th scope="col">Course Name</th>
                      
                  </tr>
              </thead>
          <tbody>


  <?php
$count = 1;
while($row = mysqli_fetch_array($res))
{
 
  ?>
      <tr>
          <th scope="row"><?php echo $count++; ?></th>
          <td><?php echo $row['matric_no']; ?></td>
          <td><?php echo $row['courses']; ?></td>

      </tr>
<?php
}

  

}

?>
          </tbody>
      </table>
  </div> <!-- end-->

           </div>

        </div>



<?php
include "footer.php";
?>

