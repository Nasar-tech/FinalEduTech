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
    $message="nasar";
    echo "<script type='text/javascript'>alert('$message');</script>";
    echo " - 0  Message : Registration Successful.";
    echo("<meta http-equiv='refresh' content='3'>");

    $stmt->close();
    $conn->close();
   
}

?>