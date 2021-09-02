<?php
session_start();
if (!$_SESSION['email']) {
    header("LOCATION: login.php");
}
$email = $_SESSION['email'];

include ("../connect.php");

$sql = mysqli_query($con, "SELECT * FROM patient WHERE email = '$email'");
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
    <title>Patient - View appointment requests</title>
    <link rel="stylesheet" href="../css/add.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
</head>

<body>

<?php include ('navigation.php'); ?>
    
        <main>
          
        <h3 style="margin-bottom: 30px;">Appointment requests</h3>

<table class="table" id="myTable">
    <thead class="thead">
        <tr>
            <td>Request ID</td>
            <td>Department</td>
            <td>Doctor/Facility</td>
            <td>Appointment Date</td>
            <td>Time</td>
            <td>Note</td>
            <td>Action</td>
        </tr>
    </thead>

    <tbody>
        <?php

        $result1 = mysqli_query($con, "SELECT * FROM appointment_request WHERE p_id = '$id' ");
        while ($row1 = mysqli_fetch_array($result1)) {
            echo '
        <tr>
            <td>' . $row1["request_id"] . '</td>
            <td>' . $row1["department"] . '</td>
            <td>' . $row1["value"] . '</td>
            <td>' . $row1["date"] . '</td>
            <td>' . $row1["start_time"] . '</td>
            <td>' . $row1["notes"] . '</td>
            <td><button onclick="./cancel_appointment?request_id=$row1["request_id"]">CANCEL</button></td>
        </tr>
    ';
        }
        ?>
    </tbody>


</table>


<h3 style="margin: 30px 0;">Accepted appointments</h3>

<table class="table" id="myTable2">
    <thead class="thead">
        <tr>
            <td>Appointment ID</td>
            <td>Department</td>
            <td>Assigned to</td>
            <td>Appointment Date</td>
            <td>Note</td>
        </tr>
    </thead>

    <tbody>
        <?php

        $result = mysqli_query($con, "SELECT * FROM appointments INNER JOIN doctor ON appointments.assigned_to_id = doctor.d_id WHERE appointments.p_id = '$id' ");
        while ($row = mysqli_fetch_array($result)) {
            echo '
        <tr>
            <td>' . $row["a_id"] . '</td>
            <td>' . $row["department"] . '</td>
            <td>' . $row["name"] . '</td>
            <td>' . $row["date"] . '</td>
            <td>' . $row["note"] . '</td>
        </tr>
    ';
        }
        ?>
    </tbody>


</table>


        </main>

    </div>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                responsive: true
            });

        });

        $(document).ready(function() {
            $('#myTable2').DataTable({
                responsive: true
            });

        });
    </script>

</body>

</html>