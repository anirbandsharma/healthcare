<?php
    include ("../connect.php");
    
    $id=$_POST["id"];
    $name=$_POST["name"];
    $email=$_POST["email"];
    $specialization=$_POST["specialization"];
    $fees=$_POST["fees"];
    
    $query="UPDATE `doctor` SET `name` = '$name', `email` = '$email', `specialization` = '$specialization', `fees` = '$fees' WHERE `d_id` = '$id' ";

    if(mysqli_query($con, $query))
    {
         header("Location:./view_doctor.php");
     }
     else
     {
         mysqli_error($con);
     }
    
?>