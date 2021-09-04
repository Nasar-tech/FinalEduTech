<?php
session_start();
if(!isset($_SESSION['user'])){
    header('location:adminlogin.php');
}


$con=new mysqli("localhost","root","");
if($con){
    echo "connection success";
}else{
    echo "login fail";
}
$db=mysqli_select_db($con,'contact');

$sql="select * from students ORDER BY Date desc";
$query=mysqli_query($con,$sql);


?>


<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>AdminPage</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-10">

          <h1>Admin Page</h1>
        <a href="logout.php" class="btn btn-danger">Logout</a>
        <input type="button" onclick="export_data()" value="Export to Excel" class="btn btn-primary">
      </div>
    </div>
  </div>
   
  <div class="container">
      <div class="row">
          <div class="col-10">
            <div style="margin-left:50%;">
    <b>
    <?php
     echo "User Name : ".$_SESSION['user']
    ?></b><br/>
<hr/>
            </div>
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




          </div>
      </div>
     
  </div>

   





</body>
</html>