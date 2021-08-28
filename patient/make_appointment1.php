<?php
    include ("../connect.php");
    
    $id=$_POST["id"];
    $department=$_POST["department"];
    $value = $_POST["value"];
    $date = $_POST["date"];
    $notes=$_POST["notes"];
    
    $query="INSERT INTO `appointment_request` (`request_id`, `p_id`, `department`, `value`, `date`, `notes`) VALUES (null, '$id', '$department', '$value', '$date', '$notes')";

    if(mysqli_query($con, $query))
    {
         header("Location:./make_appointment.php");
     }
     else
     {
         mysqli_error($con);
     }
    
?>