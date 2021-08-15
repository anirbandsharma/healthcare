<?php

include ("../connect.php");
session_start();


$username=$_POST["username"];
$password=$_POST["password"];

$result=mysqli_query($con,"select * from admin where username = '$username'");
$row=mysqli_fetch_array($result);
if($row['password']==$password)
{
    $_SESSION['username']=$username;
     header("Location:dashboard.php");
 }
 else
 {
     header("location:login.php?err=1");
 }

?>