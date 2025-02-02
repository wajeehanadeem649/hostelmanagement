<?php 
@$link= mysqli_connect("localhost","root","") or die("connection failed!");
@$db= mysqli_select_db($link,"os") or die("database error") ;

if(isset($_POST["signup"])){
   
    $name=$_POST['name'];
    $email=$_POST['email'];
    $error="";
    $errors="";
    $msg="";
    if(empty($name) or empty($email) )
{
    $error.=("All fields are required")."<br>";
}
$query="select * from request where email='$email'";  
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result) >=1){
$error.= "That email address is taken."."<br>";

}

if(($error)>0){
  
    $errors.="<br>"."<div class='alert alert-danger'>$error</div>";
      
       
    }
   
else{
$sql="insert into request (name,email) values('".mysqli_real_escape_string($link, $_POST['name'])."','".mysqli_real_escape_string($link, $_POST['email'])."')";
if (!mysqli_query($link,$sql)){
    echo "Something Wrong<br>";
   
    }
    
    
    else{
        $msg.="<div class='alert alert-success mt-5'>Register successfully.</div>";
       
    }



}
}



?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
        <!--bootstrap css-->
        <link rel="stylesheet" href="css/bootstrap.min.css">

<!-- fontawesome-->
    <link rel="stylesheet" href="fontjs/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


     <!--google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<!--custom css-->
<style>
    .container{
        display: flex;
        align-items:center;
        flex-direction:column;
        margin-top: 90px;
        margin-left: 80px ;
    }
    .shadow-lg{
    box-shadow: 5px   5px 15px rgba(0, 0, 0, 0.3);

}
    </style>
</head>
<body>
<div class="mt-5 mb-3 text-center " style="font-size:30px; font-weight:bold;">
    <i class="fa-solid fa-stethoscope"></i>
        <span>Hostel Management</span>
    </div>
    <p class="text-center " style="font-size:20px;"> <i class="fa-solid fa-user-secret text-danger mr-2"></i> Warden SignUp
    </p>
<div class="container-fluid ">
     
<div class="row justify-content-center">
<div class="col-sm-6 col-md-4">
     <form action="" class="shadow-lg p-4 mt-5" method="Post">
        
         <div class="form-group ">
             <label>Full Name</label>
<input type="text" class="form-control" name="name" placeholder="Full Name" >
</div>      
<div class="form-group ">
 <label>Email</label>
<input type="email" class="form-control" name="email" placeholder="Email">
</div>      
<div class="form-btn">
    <input type="submit" class="btn btn-outline-primary btn-block  mt-4  font-weight-bold shadow-sm " value="signup" name="signup" placeholder="Signup"></div>
    <?php  
 echo $errors; 
 echo $msg; ?>
</div>


</form></div>
<script src="js/bootstrap.min.js"></script>
<scrip src="fontjs/all.min.js"></script>
</body>
</html>