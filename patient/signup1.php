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
        $sql = "SELECT * FROM patient WHERE email = '$email'";
        $sql1 = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($sql1);
        $id = $row["p_id"];

        $query2="INSERT INTO `p_records` (`record_id`, `p_id`, `update_date`) VALUES ( null, '$id', current_timestamp())";

        mysqli_query($con, $query2);

         header("Location:./login.php");
     }
     else
     {
         mysqli_error($con);
     }
    
?>