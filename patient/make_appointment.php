<?php
session_start();
if (!$_SESSION['email']) {
    header("LOCATION: login.php");
}
$email = $_SESSION['email'];

include("../connect.php");

$sql = mysqli_query($con, "SELECT * FROM patient where email='$email' ");
$row = mysqli_fetch_array($sql);

$id = $row["p_id"];
$name = $row["name"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row["name"]; ?> - Request appointment</title>
    <link rel="stylesheet" href="../css/add.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

    <?php include('navigation.php'); ?>

    <main>
        <h3>Make an appointment</h3>

        <form action="make_appointment_next.php" method="POST">
            <div class="input-row">
                <h4>ID:</h4>
                <input type="text" name="id" value="<?php echo $id; ?>" readonly>
            </div>
            <div class="input-row">
                <h4>Name:</h4>
                <p><?php echo $name; ?></p>
            </div>
            <div class="input-row">
                <h4>Department:</h4>
                <select name="department" onchange="checkOptions(this)">
                    <option value="" selected disabled>Selcect department</option>
                    <option value="Doctor">Doctor</option>
                    <option value="Technician">Technician</option>
                </select>
            </div>

            <div class="input-row" id='otherInput' style="display: none" >
                <h4>Doctor</h4>
                <select name="value">
                    <option value="any" default>Any doctor</option>

                    <?php
                    $getdoc = mysqli_query($con,"SELECT * FROM doctor");
                    while ($list =  mysqli_fetch_array($getdoc)){
                       $d_name = $list["name"];
                    ?>
                    <option value="<?php echo $d_name ; ?>"><?php echo $d_name ; ?></option>

                    <?php } ?>
                </select>
            </div>

            <div class="input-row" id='otherInput2' style="display: none" >
                <h4>Facility</h4>
                <select name="value">
                    <option value="" selected disabled>Select a facility</option>
                    <option value="ECG">ECG</option>
                    <option value="X-ray">X-ray</option>
                </select>
            </div>

            <div class="input-row">
                <h4>Date:</h4>
                <input type="date" name="date">
            </div>

            <!--<div class="input-row">
                <h4>Time:</h4>
                <select name="time" onchange="GetDetail">
                    <option value="" selected disabled>Select a time slot</option>
                    <option value="9">9:00-10:00</option>
                    <option value="10">10:00-11:00</option>
                    <option value="11">11:00-12:00</option>
                    <option value="12">12:00-1:00</option>
                    <option value="14">2:00-3:00</option>
                    <option value="15">3:00-4:00</option>
                    <option value="16">4:00-5:00</option>
                </select>
            </div> -->
            
            <div class="input-row">
                <h4></h4>
                <input type="submit" value="Next" style="background-color: rgb(23, 125, 172);color:white; font-weight:700; width:30%;">
            </div>
        </form>

    </main>

    </div>

    <script>
    var otherInput;
function checkOptions(select) {
  otherInput = document.getElementById('otherInput');
  otherInput2 = document.getElementById('otherInput2');
  if (select.options[select.selectedIndex].value == "Doctor") {
    otherInput.style.display = 'flex';
    
  }
  else {
    otherInput.style.display = 'none';
  }

if (select.options[select.selectedIndex].value == "Technician") {
    otherInput2.style.display = 'flex';
    
  }
  else {
    otherInput2.style.display = 'none';
  }
}
</script>

<!-- get details -->
<!-- <script>
    function GetDetail(str) {
        if (str.length == 0) {
            document.getElementById("available").innerHTML="Available";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {

                if (this.readyState == 4 &&
                    this.status == 200) {

                    var myObj = JSON.parse(this.responseText);

                    document.getElementById("available").innerHTML = myObj;
                }
            };

            xmlhttp.open("GET", "get_time.php?date=" + str,"&date=" + date, true);

            xmlhttp.send();
        }
    }

</script> -->


</body>

</html>