<?php
session_start();

if(!isset($_SESSION['login']) || $_SESSION['login']!=true){
header("location:signup.php");
exit;
}



?>



<?php 

@$link= mysqli_connect("localhost","root","") or die("connection failed!");
@$db= mysqli_select_db($link,"os") or die("database error") ;
if(isset($_POST['rSignup']))
  
    {
$name=$_POST['rName'];

$major=$_POST['rMajor'];
$semester=$_POST['rSemester'];
$room=$_POST['rRoom'];
$agno=$_POST['rAgno'];
$cnic=$_POST['rCnic'];
$amount=$_POST['rAmount'];
$voucher=$_POST['rVoucher'];
$option= $_POST['option'];
$options=$_POST['options'];
$date=$_POST['date'];

$errors="";
$error="";
$msg="";
if(empty($name)  or empty ($major) or empty($semester) or empty($agno) or empty($cnic) or empty($amount) or empty($voucher) or empty($date) or empty($room) or empty($options) or empty($option))
{
    $error.=("All fields are required")."<br>";
}
$qu="select * from hostel where cnic='$cnic'";  
$result=mysqli_query($link,$qu);
if(mysqli_num_rows($result) >=1){
$error.= "That cnic  is taken."."<br>";

}
 if(($error)>0){
  
$errors.="<br>"."<div class='alert alert-danger'>$error</div>";
   
   
}
else{
    $query="insert into hostel (name,major,semester,agno,cnic,amount,voucher,degree,bank,time,room) values('".mysqli_real_escape_string($link, $_POST['rName'])."',
      '".mysqli_real_escape_string($link, $_POST['rMajor'])."','".mysqli_real_escape_string($link, $_POST['rSemester'])."'
      ,'".mysqli_real_escape_string($link, $_POST['rAgno'])."','".mysqli_real_escape_string($link, $_POST['rCnic'])."','".mysqli_real_escape_string($link, $_POST['rAmount'])."'
      ,'".mysqli_real_escape_string($link, $_POST['rVoucher'])."','".mysqli_real_escape_string($link, $_POST['option'])."','".mysqli_real_escape_string($link, $_POST['options'])."'
      ,'".mysqli_real_escape_string($link, $_POST['date'])."','".mysqli_real_escape_string($link, $_POST['rRoom'])."')";
    //  mysqli_query($link,$query);
      if (!mysqli_query($link,$query)){
          echo "Something Wrong<br>";
         
          }else{
              $msg.= "<div class='alert alert-success'>Register successfully.</div>";
           //   mysqli_query($link,$query);
          }
  }
  }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
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
    .shadow-lg{
    box-shadow: 5px   5px 15px rgba(0, 0, 0, 0.3);

}
a {
    padding-left: 9px;
      color: purple rgba(17, 3, 36, 0.3); /* Default color for unvisited links */
    }

    /* Change the hover color */
    a:hover {
      color: red; /* Color when the user hovers over the link */
    }

    /* Change the visited link color */
  

    /* Change the active link color (when clicked) */
    a:active {
      color: orange;
    }
 .nav-link{
    text-decoration:none; 
    text-align:center;
 }
 .title{
    text-align:center;
    color:grey;
    padding-top:  4px;
 }
input{
  text-transform: uppercase;
}
    
    </style>
</head>
<body>
<h2 class="title">Welcome    <?php echo $_SESSION['username']?></h2>
<br>


<div class="container pt-3">
 
<div class="row mt-4 mb-4">

<div class="col-md-6 offset-md-3">
<form action ="" class="shadow-lg p-4" method="POST" id="cnicForm">
<div class="form-group">
<h2 style="font-size:30px; text-align:center; font-weight:bold; align-item:center;padding-left:5px;">Hailey Hall</h2>
  <p style="text-align:center;">Please put your hostel students data carefully</p>
  <h4 style="text-align:center;">.(Use Capital Word Only).</h4>
  <p style="text-align:center;"><i class="fa-solid fa-asterisk text-danger px-2"></i>Indicates required question</p><hr>
<i class="fa-solid fa-user"></i><label for="name" class=" input font-weight-bold pl-2" pattern="[A-Z ]+">Student Name<i class="fa-solid fa-asterisk text-danger px-2"></i></label>
<input type="text" class="form-control" placeholder="Name" name="rName" id="rName">
<div id="inputmsg" class="errorss"></div>
</div>
<fieldset>
  <legend style="font-weight:bold;  font-size:18px;"><i class="fa-duotone fa-solid fa-book pr-2"></i>Degree<i class="fa-solid fa-asterisk text-danger px-2"></i></legend>
  <label><input type="checkbox" id="option1" name="option" value="BS" onclick="handleCheckboxClick(this, 'degree')"> BS</label>
  <label><input type="checkbox" id="option2" name="option" value="MS"onclick="handleCheckboxClick(this, 'degree')"> MS</label>
  <label><input type="checkbox" id="option3" name="option" value="PHD" onclick="handleCheckboxClick(this, 'degree')"> PHD</label>
  <label><input type="checkbox" id="option4" name="option" value="active"onclick="handleCheckboxClick(this, 'degree')"> Other</label>
  <input type="text" id="degreeInput" class="form-control bg-white " name="option" placeholder="Enter your degree" disabled required>
  <div id="degreeError" class="error" style="color:red;"> Please select only one option.</div>
</fieldset>

<br>

<div class="form-group">
<i class="fa-duotone fa-solid fa-book"></i>
<label for="major" class=" font-weight-bold pl-2">Major<i class="fa-solid fa-asterisk text-danger px-2"></i></label>
<input type="text" class="form-control" placeholder="Your Answer" name="rMajor" >

</div>
<div class="form-group">
<i class="fa-solid fa-user"></i><label for="major" class=" font-weight-bold pl-2">Semester<i class="fa-solid fa-asterisk text-danger px-2"></i></span></label>
<input type="text" class="form-control" placeholder="Your Answer" name="rSemester" required>

</div>
<div class="form-group">
<i class="fa-solid fa-shop"></i><label for="major" class=" font-weight-bold pl-2">Room No.<i class="fa-solid fa-asterisk text-danger px-2"></i></span></label>
<input type="text" class="form-control" placeholder="Your Answer" name="rRoom" required>

</div>
<div class="form-group" >
<i class="fa-solid fa-tag"></i><label for="major" class=" font-weight-bold pl-2">Regd.NO.(2021-AG-1122)<i class="fa-solid fa-asterisk text-danger px-2"></i></span></label>
<input type="text" id="inputWithDashes" class="form-control" placeholder="Your Answer" name="rAgno"  maxlength="12"  required >
<div id="inputErrors" class="errors"></div>

</div>
<div class="form-group">
<i class="fa-solid fa-user"></i><label for="major" class=" font-weight-bold pl-2">CNIC No (WITHOUT DASHES)<i class="fa-solid fa-asterisk text-danger px-2"></i></span></label>
<input type="text" class="form-control" placeholder="Your Answer" name="rCnic"  maxlength="13" 
pattern="\d{13}"  required >

<div id="cnicError" class="error"></div>

</div><div class="form-group">
<i class="fa-solid fa-money-check-dollar"></i><label for="major" class=" font-weight-bold pl-2">Paid Amount<i class="fa-solid fa-asterisk text-danger px-2"></i></span></label>
<input type="text" class="form-control" placeholder="Your Answer" name="rAmount" required>

</div>

<div class="row">
    <div class="col-md-6">
    <div class="form-group">
<i class="fa-solid fa-money-check-dollar"></i><label for="major" class=" font-weight-bold pl-2">Paid Date<i class="fa-solid fa-asterisk text-danger px-2"></i></span></label>


        <input type="date" id="date" name="date" required>
</div>
</div>


<div class="col-md-6">
<div class="form-group">
<i class="fa-solid fa-money-bill"></i><label for="major" class=" font-weight-bold pl-2">Voucher No<i class="fa-solid fa-asterisk text-danger px-2"></i></span></label>
<input type="text" class="form-control w-35"  placeholder="Your Answer" id="rVoucher"  name="rVoucher" required>
<div id="errorMsg" class="errorr"></div>
</div>
</div>
</div>
<fieldset>
<fieldset>
  <legend style="font-weight:bold; font-size:18px;"><i class="fa-brands fa-fort-awesome pr-2"></i>Bank<i class="fa-solid fa-asterisk text-danger px-2"></i></legend>
  <label><input type="checkbox" id="option11"name="options" value="HBL"onclick="handleCheckboxClick(this, 'bank')"> HBL</label>
  <label><input type="checkbox" id="option12" name="options" value="UBL"onclick="handleCheckboxClick(this, 'bank')"> UBL</label>
  <label><input type="checkbox" id="option13" name="options" value="MCB"onclick="handleCheckboxClick(this, 'bank')"> MCB</label>
  <label><input type="checkbox" id="option14" name="options"onclick="handleCheckboxClick(this, 'bank')"> Other</label>
  <input type="text" id="bankInput" name="options" class="form-control bg-white" placeholder="Enter your bank" disabled>
  <div id="bankError" class="error " style="color:red;"> Please select only one option.</div>
</fieldset>



<button type="submit" class="btn btn-primary  mt-3 btn-block shadow-sm  font-weight-bold" name="rSignup">Submit</button>
<em style="font-size:10px;"> Note - By clicking Submit, you agree to our Terms, Data Policy and Cookie Policy</em>


<div > <?php   
if (isset($errors)>0){
  echo $errors;}
  if(isset($msg)){
    echo $msg;
  }
?>
 <div class=" text-center"><p>If you want to logout!<a href="signin.php">Logout here</a></p></div>
</div></div>
</form>

</div>
</div>

</div>



<!--*jquery js-->
<script src="jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js" integrity="sha512-nnzkI2u2Dy6HMnzMIkh7CPd1KX445z38XIu4jG1jGw7x5tSL3VBjE44dY4ihMU1ijAQV930SPM12cCFrB18sVw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>



        document.getElementById("cnicForm").addEventListener("submit", function (event) {
            const cnicInput = document.getElementById("rCnic");
            const cnicError = document.getElementById("cnicError");

            // Clear previous error
            cnicError.textContent = "";

            // Validate CNIC
            if (!/^\d{13}$/.test(cnicInput.value)) {
                event.preventDefault(); // Stop form submission
                cnicError.textContent = "Please enter a valid 13-digit CNIC without dashes.";
            }
        });


                      //ag no

        const inputField = document.getElementById("inputWithDashes");

// Add dashes dynamically as the user types
inputField.addEventListener("input", function (event) {
    let value = event.target.value.replace(/-/g, ""); // Remove existing dashes
    if (value.length > 4) value = value.slice(0, 4) + "-" + value.slice(4);
    if (value.length > 7) value = value.slice(0, 7) + "-" + value.slice(7);
    event.target.value = value;
});

                               //int

const rVoucher = document.getElementById("rVoucher");

// Allow only numbers in the input
rVoucher.addEventListener("input", function (event) {
    const value = event.target.value;
    event.target.value = value.replace(/[^0-9]/g, ""); // Remove non-numeric characters
   
});
document.getElementById("cnicForm").addEventListener("submit", function (event) {
            const errorMsg = document.getElementById("errorMsg");
            errorMsg.textContent = ""; // Clear previous errors

            if (!/^\d+$/.test(numberInput.value)) {
                event.preventDefault(); // Stop form submission
                errorMsg.textContent = "Input must contain digits only.";
            }
        });

                                 //char

        const rName = document.getElementById("rName");

        // Allow only alphabetic characters
        rName.addEventListener("input", function (event) {
            const value = event.target.value;
            event.target.value = value.replace(/[^a-zA-Z]/g, ""); // Remove non-letter characters
        });

        // Validate input on form submission
        document.getElementById("cnicForm").addEventListener("submit", function (event) {
            const errorMsg = document.getElementById("inputmsg");
            inputmsg.textContent = ""; // Clear previous errors

            if (!/^[a-zA-Z]+$/.test(lettersInput.value)) {
                event.preventDefault(); // Stop form submission
                inputmsg.textContent = "Input must contain letters only.";
            }
        });


    



                         //checkbox

    //
    function handleCheckboxClick(clickedCheckbox, group) {
   
   let checkboxes = document.querySelectorAll(`input[name="${clickedCheckbox.name}"]`);
   const inputField = document.getElementById(group === 'degree' ? "degreeInput" : "bankInput");
   const errorElement = document.getElementById(group === 'degree' ? "degreeError" : "bankError");
   checkboxes.forEach((checkbox) => {
       if (checkbox !== clickedCheckbox) {
           checkbox.checked = false;
       }
   });
    //

    // Show input field if "Other" is selected
    if (clickedCheckbox.id.includes("option4") || clickedCheckbox.id.includes("option14")) {
        inputField.disabled = false;
    } else {
        inputField.value = "";
        inputField.disabled = true;
    }

    // Ensure only one checkbox is selected
    const selectedCount = Array.from(checkboxes).filter(cb => cb.checked).length;
    if (selectedCount < 1) {
        errorElement.style.display = "block";
        clickedCheckbox.checked = false;
        inputField.disabled = true;
        inputField.value = "";
    } else {
        errorElement.style.display = "none";
    }
}
                       //capital only
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll("input[type='text']").forEach(input => {
        input.addEventListener("input", function () {
            this.value = this.value.toUpperCase();
        });
    });
});
    </script>

<script src="js/bootstrap.min.js"></script>

<scrip src="fontjs/all.min.js"></script>
</body>
</html>


