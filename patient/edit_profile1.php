<?php
    include ("../connect.php");
    
    $id=$_POST["id"];
    $name=$_POST["name"];
    $email=$_POST["email"];
    $address=$_POST["address"];
    $age=$_POST["age"];
    $gender=$_POST["gender"];
    
    $query="UPDATE `patient` SET `name` = '$name', `email` = '$email', `address` = '$address', `age` = '$age', `gender` = '$gender' WHERE `patient`.`p_id` = '$id';";

    if(mysqli_query($con, $query))
    {
         header("Location:./my_profile.php");
     }
     else
     {
         mysqli_error($con);
     }
    
?>