 <?php

$fName=$_POST['fName'];
$lName=$_POST['lName'];
$email=$_POST['email'];
$phone=$_POST['phone'];



if(!empty($_POST['courses'])) {
    $course = $_POST['courses'];
}
$gender=$_POST['gender'];



$conn=new mysqli('localhost','root','','contact');
if($conn->connect_error){
    die('Connection Failed :'. $conn->connect_error);
    
}else{
    $stmt=$conn->prepare("insert into test (fName,lName,email,phone,course,gender) values(?,?,?,?,?,?)");

    $stmt->bind_param("sssiss",$fName,$lName,$email,$phone,$course,$gender);

    $stmt->execute();

    $message="Thanks for your interest we will reach out you in shortly";
    echo "<script type='text/javascript'>alert('$message');</script>";


    echo "<script>window.location.replace('index.php');</script>";
    echo "<a href='index.html'>Go to Home</a>";


    echo "Executed Successfully";
}

?>

