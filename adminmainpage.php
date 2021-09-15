


<!--************************************************* from Registered users  -->
<?php

session_start();
if(!isset($_SESSION['user'])){
    header('location:adminlogin.php');
}




$con=new mysqli("localhost","root","");
if($con){
    // echo "connection success";
}else{
    echo "login fail";
}
$db=mysqli_select_db($con,'contact');

$sql="select * from test";
$query1=mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link
      rel="shortcut icon"
      href="./assets/img/highqlabs2.jpeg"
      type="image/x-icon"
      sizes="32X32"
    /> 
    <link rel="icon" href="./assets/img/highqlabs2.jpeg" sizes="32X32">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>AdminPage</title>
</head>
<body>


<br>
<br>
<br>
<br>
<br>
<br>
<div class="container">
  <div class="col-10">
  <h1>Admin Page</h1>
        <a href="index.php" class="btn btn-primary">Home</a>
        
        <a href="logout.php" class="btn btn-danger">Logout</a>
        <br>
        <br>
        <br>
        <br>
        <br>
  <h2>From Register Course Page</h2>
<input type="button" onclick="export_data2()" value="Export to Excel" class="btn btn-warning"><br><br>
<table class="table" border="1px" id="data2">
        <thead>
          <tr>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Gender</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Course</th>
          </tr>
        </thead>
<?php
    while($row1=mysqli_fetch_assoc($query1)){
       
        ?>
       
        <tbody>
        <tr>
        
            <td><?php echo $row1['fName']; ?></td>
            <td><?php echo $row1['lName']; ?></td>
            <td><?php echo $row1['gender']; ?></td>
            <td><?php echo $row1['phone']; ?></td>
            <td><?php echo $row1['email']; ?></td>
            <td><?php echo $row1['course']; ?></td>
            
        
        </tr>
  <?php
    }
?>

  </tbody>
</table>

  </div>

</div>







<!-- *******************************************************For Contact us People  -->

<?php



$con=new mysqli("localhost","root","");
if($con){
    // echo "connection success";
}else{
    echo "login fail";
}
$db=mysqli_select_db($con,'contact');

$sql="select * from students ORDER BY Date desc";
$query=mysqli_query($con,$sql);


?>



 <!-- ======= Header ======= -->
 <header id="header" class="header fixed-top" style="background-color:white;">
      <div
        class="
          container-fluid container-xl
          d-flex
          align-items-center
          justify-content-between
        "
      >
        <a href="index.html" class="logo d-flex align-items-center">
          <img src="assets/img/highqlabs2.jpeg" alt="logo" class="highqlogo" />
        </a>

        <nav id="navbar" class="navbar">
          <ul>
            <!-- <li><a class="nav-link scrollto active" href="#header">Home</a></li> -->
          
            
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->
      </div>
    </header>
    <!-- End Header -->
    <br>
    <br>
    <br>
    <br>
    <br>
<br>

<hr>
<hr>
<br>
<!-- Admin Form Details -->   
  <div class="container">
      <div class="row">
          <div class="col-10">
            <div style="margin-left:50%;">       
            </div>
            <h2>From Contact us Page visitors</h2>
            <input type="button" onclick="export_data()" value="Export to Excel" class="btn btn-warning">
            <br>
            <br>
          <table class="table" border="1px" id="data">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Mobile</th>
            <th scope="col">Email</th>
            <th scope="col">Message</th>
            <th scope="col">Date and Time</th>
          </tr>
        </thead>
<?php
    while($row=mysqli_fetch_assoc($query)){
        $count=1;
        ?>
       
        <tbody>
        <tr>
        
            <td><?php echo $row['Name']; ?></td>
            <td><?php echo $row['Number']; ?></td>
            <td><?php echo $row['Email']; ?></td>
            <td><?php echo $row['Message']; ?></td>
            <td><?php echo $row['Date']; ?></td>
        
        </tr>
  <?php
    }
?>

  </tbody>
</table>



<br>
<br>




<br>




















<!-- Export to excel file -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.1/xlsx.full.min.js">
</script>
<script>
  function export_data(){
    let data=document.getElementById('data');
    var fp=XLSX.utils.table_to_book(data,{sheet:'sheet1'});
    XLSX.write(fp,{
      bookType:'xlsx',
      type:'base64'
    });
   XLSX.writeFile(fp,'studentsData.xlsx'); 
  }
</script>

<!-- registered users exporting -->
<script>
  function export_data2(){
    let data=document.getElementById('data2');
    var fp=XLSX.utils.table_to_book(data,{sheet:'sheet1'});
    XLSX.write(fp,{
      bookType:'xlsx',
      type:'base64'
    });
   XLSX.writeFile(fp,'registeredStudents.xlsx'); 
  }
</script>




          </div>
      </div>
     
  </div>

   



 

</body>
</html>