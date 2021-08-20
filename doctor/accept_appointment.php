<?php
    include ("../connect.php");
    
    $request_id=$_GET["request_id"];
    $p_id=$_GET["p_id"];
    $assigned_to_id=$_GET["assigned_to_id"];
    $date=$_GET["date"];
    $notes=$_GET["notes"];
    
    $query="INSERT INTO `appointments` (`a_id`, `p_id`, `assigned_to_id`, `date`, `note`) VALUES (null, '$p_id', '$assigned_to_id', '$date', '$notes') ";

    if(mysqli_query($con, $query))
    {   
        $query2="DELETE FROM appointment_request WHERE request_id = '$request_id'";
        mysqli_query($con, $query2);

         header("Location:./view_request.php");
     }
     else
     {
         mysqli_error($con);
     }
    
?>