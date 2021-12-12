<?php
    include ("../connect.php");
    
    $request_id=$_GET["request_id"];
    $p_id=$_GET["p_id"];
    $assigned_to_id=$_GET["assigned_to_id"];
    $value=$_GET["value"];
    $date=$_GET["date"];
    $time=$_GET["time"];
    $notes=$_GET["notes"];
    
    $query="INSERT INTO `appointments` (`a_id`,`request_id`, `p_id`, `assigned_to_id`, `department`, `value`, `date`, `start_time`, `note`) VALUES (null,'$request_id', '$p_id', '$assigned_to_id', 'Doctor', '$value', '$date', '$time', '$notes') ";

    if(mysqli_query($con, $query))
    {   
            $getid1=mysqli_query($con, "SELECT a_id from appointments where request_id=$request_id ");
            while($getid = mysqli_fetch_array($getid1)){
            $a_id = $getid["a_id"];
            }


            $query3 = "INSERT INTO `report` (`report_id`, `a_id`, `p_id`, `d_id`, `value`, `diagnosis`, `tests`, `notes`, `medicine`, `appointment_date`,`appointment_time`, `report_date`) VALUES (null, '$a_id', '$p_id', '$assigned_to_id', '$value', null, null, null, null, '$date', '$time', CURRENT_TIMESTAMP() ) ";

            

            if(mysqli_query($con, $query3)){

            mysqli_query($con, "DELETE FROM appointment_request WHERE request_id = '$request_id'");

            }
            else{
                echo mysqli_error($con);
            }
         header("Location:./view_request.php");
    
    
    }
    else
    {
       echo mysqli_error($con);
    }
?>