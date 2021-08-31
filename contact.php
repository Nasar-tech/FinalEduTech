<?php

$name=$_POST['name'];
$number=$_POST['number'];
$email=$_POST['email'];
$message=$_POST['message'];

$conn=new mysqli('localhost','root','','contact');
if($conn->connect_error){
    die('Connection Failed :'. $conn->connect_error);
    
    echo 'fail';
}else{
    $stmt=$conn->prepare("insert into students (Name,Number,Email,Message) values(?,?,?,?)");
    $stmt->bind_param("siss",$name,$number,$email,$message);
    $stmt->execute();
    echo "Registration Successful..";
    $stmt->close();
    $conn->close();
    echo "alert('Thanks for youre response')";
}

?>