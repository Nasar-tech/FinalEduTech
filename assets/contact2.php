<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    $name=$_POST['name'];
    $number=$_POST['number'];
    $email=$_POST['email'];
    $message=$_POST['message'];
    echo 'alert(Entry submitted successfully)';
    //connecting to database
    $servername="localhost";
    $username="root";
    $password="";
    $database="contact";
    //creating connection
    
}

?>