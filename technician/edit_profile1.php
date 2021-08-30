<?php
    include ("../connect.php");
    
    $id=$_POST["id"];
    $name=$_POST["name"];
    $email=$_POST["email"];
    
    $query="UPDATE `technician` SET `name` = '$name', `email` = '$email' WHERE `t_id` = '$id' ";

    if(mysqli_query($con, $query))
    {
         header("Location:./dashboard.php");
     }
     else
     {
         mysqli_error($con);
     }
    
?>