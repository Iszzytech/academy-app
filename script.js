$(document).ready(function() {
  $("form").submit(function (event) {
      event.preventDefault();

     var fullname = document.getElementById("name").value; 
     var dept = document.getElementById("depart").value; 
     var matric = document.getElementById("mat").value; 
     var phone = document.getElementById("phone").value; 
     var gender = document.getElementById("gend").value; 
     var email = document.getElementById("e-mail").value; 
     var password = document.getElementById("passw").value; 
     var cpassword = document.getElementById("cpassw").value; 


     $.post("process.php", {fullname:fullname, dept:dept, matric:matric, phone:phone, gender:gender, email:email, password:password, cpassword:cpassword}, function(data){
       console.log(data);
     })
  })
})