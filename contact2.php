<?php

$name=$_POST['name'];
$number=$_POST['number'];
$email=$_POST['email'];
$message=$_POST['message'];

$conn=new mysqli('localhost','root','','contact');
if($conn->connect_error){
    die('Connection Failed :'. $conn->connect_error);
    
}else{
    $stmt=$conn->prepare("insert into students (Name,Number,Email,Message) values(?,?,?,?)");
    $stmt->bind_param("siss",$name,$number,$email,$message);
    $stmt->execute();
    $message="Thanks for your interest we will reach out you in shortly";
    echo "<script type='text/javascript'>alert('$message');</script>";
  
    echo "<script>window.location.replace('index.php');</script>";
    echo "<a href='index.html'>Go to Home</a>";


    $stmt->close();
    $conn->close();
    
    
}

?>