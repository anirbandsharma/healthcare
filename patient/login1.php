<?php

include ("../connect.php");
session_start();


$email=$_POST["email"];
$password=$_POST["password"];

$result=mysqli_query($con,"select * from patient where email = '$email'");
$row=mysqli_fetch_array($result);
if($row['password']==$password)
{
    $_SESSION['email']=$email;
     header("Location:./dashboard.php");
 }
 else
 {
     header("location:login.php?err=1");
 }

?>