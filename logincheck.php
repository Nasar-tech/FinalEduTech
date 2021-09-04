<?php
session_start();


$con=new mysqli("localhost","root","");
if($con){
    echo "connection success";
}else{
    echo "login fail";
}
$db=mysqli_select_db($con,'contact');
if(isset($_POST['submit'])){
    $username=$_POST['user'];
    $password=$_POST['pass'];

    $sql="select * from admin where email='$username' and password='$password' ";

    $query=mysqli_query($con,$sql);
    
    $row=mysqli_num_rows($query);
        if($row==1){
            echo "login successful";
            $_SESSION['user']=$username;
            header('location:adminmainpage.php');
        }else{
            header('location:adminlogin.php');
            echo "login fail";
        }
    
        
    
}

?>