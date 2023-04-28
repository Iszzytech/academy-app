<?php
include "header2.php";

 
?>

<div class="profile-container">
				<div class="info-box">
					<img id="pro-timeline" src="img/pro-timeline.jpg"/>
					<div class="pro-title">
	            		 <center>  <?php echo"<img src='$profileImage' class='profile-image'>"; ?>
                           
                            <button id="add-ski" onclick="showImage()" class="btn_changedp"><a href="#img"><img class="img_btn" src="img/editimg.png"></a></button>
                               
	            		 <p id="pro-name">
                            Edit Profile Picture
                            </p>
                            <span class="pro-detail"><?php echo "$email"; ?></span> | <span class="pro-detail"><?php echo "$dept"; ?></span><br/><br/>
	            		 </center>
                          
	            	</div>
                </div>
                <!--settings page -->
	            	
    <?php
        echo"
  			<div class='setting-container'  style='height: 100%; width: 100%; padding: 40px 30px;'>
  				<h1 class='heading'>General Account Settings</h1>
  				<center>
  				 
  				<table class='setting_table'>
  					
                    <form action='edit_profile.php?u_id=$uid' method='post'  autocomplete='off' enctype='multipart/form-data'>
  					<tr class='row-1' id='img' onclick='showImage()'>
  						<td class='col-1'>Change Profile Picture</td>
  						<td class='col-2'><input type='file' id='user_image' name='u_image'  hidden='' size='60' /><p id='db_image'>
                  $profileImage
  						</p></td>
  						<td class='col-3' ><a id='edit_txt'>Edit</a><button style='padding: 8px 8px;' class='action-btn save' type='submit' id='save_image' name='update' value='submit' hidden=''>Save Changes</button>
  				<button class='action-btn cancel' onclick='cancelImage()' id='cancel_image' ' hidden=''>Cancel</button></td>
  					</tr>
                    </form>
  				</table>
            <table class='setting_table'>
  				<form action='edit_profile.php?u_id=$uid' method='post'  autocomplete='off' enctype='multipart/form-data'>
                <tr class='row-1' onclick='showPassword()'>
  						<td class='col-1'>Password</td>
  						<td class='col-2'><input type='password' minlength='4' maxlength='32' id='user_password' name='u_password' hidden='' value='' autocomplete='off' autosave='off'><p id='db_pass'>**********</p></td>
  						<td class='col-3'><a id='edit_ptxt'>Edit</a><button style='padding: 8px 8px;' class='action-btn save' type='submit' id='save_pass' name='update_pass' value='submit' hidden=''>Save Changes</button><button class='action-btn cancel' onclick='cancelPassword()' id='cancel_pass' hidden=''>Cancel</button></td>
  					</tr>
                     </form>
                     </table>
                     
                     <table class='setting_table'>
  				<form action='edit_profile.php?u_id=$uid' method='post'  autocomplete='off' enctype='multipart/form-data'>
                <tr class='row-1' onclick='showUser()'> 
   						<td class='col-1'>Email</td>
                       <td class='col-2'><input type='email' minlength='4' maxlength='20' id='user_name' name='u_name' hidden='' value='$email'><p id='db_user'>$email</p></td>
  						<td class='col-3'><a id='edit_user'>Edit</a><button style='padding: 8px 8px;' class='action-btn save' type='submit' id='save_user' name='update_user' value='submit' hidden=''>Save Changes</button><button class='action-btn cancel' onclick='cancelUser()' id='cancel_user' hidden=''>Cancel</button></td>
  					</tr>

                     </form>
                     </table>
  				</center>
                        </div>";
                                   
    ?>
        <!-- php code to update profile image -->
    	<?php
               
       if(isset($_POST['update'])){
             $target_dir = 'userdp/';
                $target_file = $target_dir.basename($_FILES['u_image']['name']);
                $uploadOK = 1;
                
               $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				
            
            
            //check file size
            if ($_FILES['u_image']['size'] > 50000000){
                echo "<script>alert('Sorry, your file is too large')</script>";
                echo "<script>window.open('edit_profile.php?u_id=$uid' , '_self')</script>";
					exit();
                  $uploadOK = 0;
            }
             //Allow certain file format
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
                  echo "<script>alert('No file choosen, Please choose a file.')</script>";
                echo "<script>alert('Sorry, Only JPG, JPEG, PNG, & GIF files are allowed.')</script>";
                echo "<script>window.open('edit_profile.php?u_id=$uid' , '_self')</script>";
					exit();
                $uploadOK = 0;
            }
            
            //Check if $uploadOK is set to 0 by an error
            if($uploadOK == 0){
                echo"<script>alert('Sorry, your file was not uploaded')</script>";
                echo "<script>window.open('edit_profile.php?u_id=$uid' , '_self')</script>";
					exit();
               // if it is all ok
            }
            else{
                if(move_uploaded_file($_FILES['u_image']['tmp_name'], $target_file)){
                    $update = "UPDATE `users` SET `img_url`='$target_file' WHERE `id`='$uid'";
					$run = mysqli_query($con, $update);
					if($run){
					echo "<script>alert('Your file has been uploaded')</script>";
					echo "<script>window.open('edit_profile.php?u_id=$uid' , '_self')</script>";
                     }
                    else {
                        echo "<script>alert('Sorry, there was an error uploading your file')</script>";
                        echo "<script>window.open('edit_profile.php?u_id=$uid' , '_self')</script>";
					exit();
                    }
                }
			  	
            }
        }
			
	?>
    <!-- Update Password -->
    <?php
           if(isset($_POST['update_pass'])){     
                $passWord = $_POST['u_password'];
                $newPassword = md5($passWord);
             $updateP = "UPDATE `users` SET `password`='$newPassword' WHERE `id`='$uid'";
					$runP = mysqli_query($con, $updateP);
					if($runP){
					echo "<script>alert('Your Password has been changed sucessfully')</script>";
					echo "<script>window.open('edit_profile.php?u_id=$uid' , '_self')</script>";
                     }
                    else {
                        echo "<script>alert('Sorry, there was an error updating your password')</script>";
                        echo "<script>window.open('edit_profile.php?u_id=$uid' , '_self')</script>";
					exit();
                    }
           }
                ?>
                   <!-- Update Email -->
         <?php
           if(isset($_POST['update_user'])){     
                $emailNew = $_POST['u_name'];
             $updateN = "UPDATE `users` SET `email`='$emailNew' WHERE `id`='$uid'";
					$runU = mysqli_query($con, $updateN);
					if($runU){
					echo "<script>alert('Your Email has been changed sucessfully')</script>";
					echo "<script>window.open('edit_profile.php?u_id=$uid' , '_self')</script>";
                     }
                    else {
                        echo "<script>alert('Sorry, there was an error updating your username')</script>";
                        echo "<script>window.open('edit_profile.php?u_id=$uid' , '_self')</script>";
					exit();
                    }
           }
                ?>        
    

             <script type="text/javascript">
                 function showImage(){
                    var x = document.getElementById("user_image"); 
                     var y = document.getElementById("save_image"); 
                      var z = document.getElementById("cancel_image");
                     var e = document.getElementById("edit_txt");
                     var d = document.getElementById("db_image");
                      if (x.style.display === "none" && y.style.display === "none" && z.style.display === "none") {
                        x.style.display = "block";
                           y.style.display = "block";
                           z.style.display = "block";
                          e.style.display = "none";
                           d.style.display = "none";
                            }
                     else {
                        x.style.display = "block";
                          y.style.display = "block";
                          z.style.display = "block";
                         e.style.display = "none";
                             d.style.display = "none";
                        }
                     
                 }
                 
                  function cancelImage(){
                    var x = document.getElementById("user_image"); 
                     var y = document.getElementById("save_image"); 
                      var z = document.getElementById("cancel_image");
                     var e = document.getElementById("edit_txt");
                     var d = document.getElementById("db_image");
                      if (x.style.display === "block" && y.style.display === "block" && z.style.display === "block") {
                        x.style.display = "none";
                           y.style.display = "none";
                           z.style.display = "none";
                          e.style.display = "block";
                           d.style.display = "block";
                            }
                     
                 }
                 //cancel btn function
                
                 //Password Toggle
                function showPassword(){
                     var x = document.getElementById("user_password"); 
                     var y = document.getElementById("save_pass"); 
                      var z = document.getElementById("cancel_pass");
                     var e = document.getElementById("edit_ptxt");
                     var d = document.getElementById("db_pass");
                      if (x.style.display === "none" && y.style.display === "none" && z.style.display === "none") {
                        x.style.display = "block";
                           y.style.display = "block";
                           z.style.display = "block";
                          e.style.display = "none";
                           d.style.display = "none";
                            }
                     else {
                        x.style.display = "block";
                          y.style.display = "block";
                          z.style.display = "block";
                         e.style.display = "none";
                             d.style.display = "none";
                        }
                     
                 }
                  function cancelPassword(){
                      var x = document.getElementById("user_password"); 
                     var y = document.getElementById("save_pass"); 
                      var z = document.getElementById("cancel_pass");
                     var e = document.getElementById("edit_ptxt");
                     var d = document.getElementById("db_pass");
                       if (x.style.display === "block" && y.style.display === "block" && z.style.display === "block") {
                        x.style.display = "none";
                           y.style.display = "none";
                           z.style.display = "none";
                          e.style.display = "block";
                           d.style.display = "block";
                            }
                 }
                 
                 //Toggle user
                 
                  function showUser(){
                     var x = document.getElementById("user_name"); 
                     var y = document.getElementById("save_user"); 
                      var z = document.getElementById("cancel_user");
                     var e = document.getElementById("edit_user");
                     var d = document.getElementById("db_user");
                      if (x.style.display === "none" && y.style.display === "none" && z.style.display === "none") {
                        x.style.display = "block";
                           y.style.display = "block";
                           z.style.display = "block";
                          e.style.display = "none";
                           d.style.display = "none";
                            }
                     else {
                        x.style.display = "block";
                          y.style.display = "block";
                          z.style.display = "block";
                         e.style.display = "none";
                             d.style.display = "none";
                        }
                     
                 }

                  function cancelUser()
                  
                  {

                    var x = document.getElementById("user_name"); 
                     var y = document.getElementById("save_user"); 
                      var z = document.getElementById("cancel_user");
                     var e = document.getElementById("edit_user");
                     var d = document.getElementById("db_user");

                     if (x.style.display === "block" && y.style.display === "block" && z.style.display === "block") {
                        
                           x.style.display = "none";
                           y.style.display = "none";
                           z.style.display = "none";
                           e.style.display = "block";
                           d.style.display = "block";
                     }
                  }
  
  				
  			</script>
               
    	                   <!-- profile-container -->
            </div>