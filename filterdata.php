<?php






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter</title>
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
    input{
  text-transform: uppercase;
}
    </style>
</head>
<body>
 <div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
<div class="card mt-5">
    <div class="card-header">
        <div class="card-title ">
          <h2 class="display-6 text-center">  Fetch Data from <span style="color:grey;">HELAY HALL</span></h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-7 ">
<form method="POST">
              
        <div class="input-group mb-3">
  <input type="text" class="form-control" name="search" required value="<?php  if(isset($_POST['search'])){echo $_POST['search'];}?>" placeholder="Search Data">
  <button type="submit" class="btn btn-primary">Search</button>
</div>
</form>
</div>
</div>

            <table class="table table-bordered bg-warning text-center" >
  <thead>
    <tr class="bg-dark" style="color:white;">
      <th scope="col">Name</th>
      <th scope="col">Major</th>
      <th scope="col">Semester</th>
      <th scope="col">Ag#</th>
      <th scope="col">CNIC</th>
      <th scope="col">Paid Amount</th>
      <th scope="col">Voucher</th>
      <th scope="col">Degree</th>
      <th scope="col">Bank</th>
      <th scope="col">Time</th>
      <th scope="col">Room # </th>
     
   
    </tr>
  </thead>
  <tbody>
  
    <?php
    @$link= mysqli_connect("localhost","root","") or die("connection failed!");
    @$db= mysqli_select_db($link,"os") or die("database error") ;
    if(isset($_POST['search']))
    {
        $values=$_POST['search'];
        $query="select * from hostel where concat(name,room,bank,major,cnic,semester,agno,amount,voucher,degree,time) like '%$values%' ";
        $run=mysqli_query($link,$query);
        if(mysqli_num_rows($run)>0){
            foreach($run as $row){
                ?>
                <tr>
                     <td> <?php echo $row['name'];?></td>
      <td> <?php echo $row['major'];?></td>
      <td> <?php echo $row['semester'];?></td>
      <td> <?php echo $row['agno'];?></td>
      <td> <?php echo $row['cnic'];?></td>
      <td> <?php echo $row['amount'];?></td>
      <td> <?php echo $row['voucher'];?></td>
      <td> <?php echo $row['degree'];?></td>
      <td> <?php echo $row['bank'];?></td>
      <td> <?php echo $row['time'];?></td>
      <td> <?php echo $row['room'];?></td>
   
    </tr>
                <?php
            }
        }else{?>
            <tr ><td colspan="11">No Record</td></tr>
            <?php
        }

    }
   
    
    ?>
    
 
 

    
  </tbody>
</table>
        </div>
    </div>
</div>
        </div>

    </div>
 </div>

    
    <script src="js/bootstrap.min.js"></script>

<scrip src="fontjs/all.min.js"></script>

<script>
                       /*capital only*/
                       document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll("input[type='text']").forEach(input => {
        input.addEventListener("input", function () {
            this.value = this.value.toUpperCase();
        });
    });
});
</script>
</body>
</html>