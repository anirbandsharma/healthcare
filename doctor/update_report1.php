<?php
    include ("../connect.php");
    
    $report_id = $_GET["report_id"];
    $diagnosis=$_POST["diagnosis"];
    $prescription=$_POST["prescription"];
    $notes=$_POST["notes"];
    
    $query="UPDATE `report` SET `diagnosis` = '$diagnosis', `prescription` = '$prescription', `notes` = '$notes', `report_date` = current_timestamp() WHERE `report_id` = '$report_id' ";

    if(mysqli_query($con, $query))
    {
         header("Location:./view_appointments.php");
     }
     else
     {
         mysqli_error($con);
     }
    
?>