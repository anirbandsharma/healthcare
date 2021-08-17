<?php
    include ("../connect.php");
    
    $name=$_POST["name"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $address=$_POST["address"];
    $age=$_POST["age"];
    $gender=$_POST["gender"];
    
    $query="INSERT INTO `patient` (`p_id`, `name`, `email`, `password`, `address`, `age`, `gender`, `reg_date`) VALUES (null, '$name', '$email', '$password', '$address', '$age', '$gender', current_timestamp())";

    if(mysqli_query($con, $query))
    {
         header("Location:./login.php");
     }
     else
     {
         mysqli_error($con);
     }
    
?>