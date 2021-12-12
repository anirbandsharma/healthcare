<?php
    include ("../connect.php");
    
    $report_id = $_GET["report_id"];
    $diagnosis=$_POST["diagnosis"];
    $tests=$_POST["tests"];
    $notes=$_POST["notes"];
    $medicine=$_POST["medicine"];
    
    $query="UPDATE `report` SET `diagnosis` = '$diagnosis', `tests` = '$tests', `notes` = '$notes',  `medicine` = '$medicine',`report_date` = current_timestamp() WHERE `report_id` = '$report_id' ";

    if(mysqli_query($con, $query))
    {
         header("Location:./view_appointments.php");
     }
     else
     {
         mysqli_error($con);
     }
    
?>