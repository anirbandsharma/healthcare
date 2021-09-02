<?php
    include ("../connect.php");
    
    $request_id=$_GET["request_id"];
    $p_id=$_GET["p_id"];
    $assigned_to_id=$_GET["assigned_to_id"];
    $value=$_GET["value"];
    $date=$_GET["date"];
    $time=$_GET["time"];
    $notes=$_GET["notes"];
    
    $query="INSERT INTO `appointments` (`a_id`, `p_id`, `assigned_to_id`, `department`, `value`, `date`, `start_time`, `note`) VALUES (null, '$p_id', '$assigned_to_id', 'Technician', '$value', '$date', '$time', '$notes') ";

    if(mysqli_query($con, $query))
    {   
        $query2="DELETE FROM appointment_request WHERE request_id = '$request_id'";

        if(mysqli_query($con, $query2))
        {
            $query3 = "INSERT INTO `report` (`report_id`, `p_id`, `d_id`, `value`, `diagnosis`, `prescription`, `notes`, `appointment_date`, `report_date`) VALUES (null, '$p_id', '$assigned_to_id', '$value', NULL, NULL, NULL, '$date', current_timestamp())";

            mysqli_query($con, $query3);

         header("Location:./view_request.php");
     }
    
    }
    else
    {
        mysqli_error($con);
    }
?>