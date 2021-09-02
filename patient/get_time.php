
<?php

 
// Get the time
$time = $_REQUEST['time'];
$date = $_REQUEST['date'];  

include '../connect.php';
$query = mysqli_query($con, "SELECT * FROM appointments WHERE date='$date'");
$row = mysqli_fetch_array($query);
$start = $row["date"];
  
if ($time == $start) {

// Send in JSON encoded form
$myJSON = json_encode("Already Booked");
echo $myJSON;

}
  else{
      // Send in JSON encoded form
$myJSON = json_encode("Available");
echo $myJSON;
  }
?>