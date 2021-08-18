<?php
    include ("../connect.php");
    
    $id=$_POST["id"];
    $height=$_POST["height"];
    $weight=$_POST["weight"];
    $blood_pressure=$_POST["blood_pressure"];
    $blood_sugar=$_POST["blood_sugar"];
    $allergies=$_POST["allergies"];
    $notes=$_POST["notes"];
    
    $query="UPDATE `p_records` SET `height` = '$height', `weight` = '$weight', `blood_pressure` = '$blood_pressure', `blood_sugar` = '$blood_sugar', `allergies` = '$allergies', `notes` = '$notes', `update_date` = current_timestamp() WHERE `p_records`.`p_id` = '$id'";

    if(mysqli_query($con, $query))
    {
         header("Location:./update_record.php");
     }
     else
     {
         mysqli_error($con);
     }
    
?>