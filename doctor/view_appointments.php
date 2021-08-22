<?php
session_start();
if (!$_SESSION['email']) {
    header("LOCATION: login.php");
}
$email = $_SESSION['email'];

include ("../connect.php");

$sql = mysqli_query($con, "SELECT * FROM doctor WHERE email = '$email'");
$row = mysqli_fetch_array($sql);

$id = $row["d_id"];
$name = $row["name"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor - View appointments</title>
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
          
        <h3 style="margin-bottom: 30px;">View appointment requests</h3>

<table class="table" id="myTable">
    <thead class="thead">
        <tr>
            <td>Appointment ID</td>
            <td>Patient Name</td>
            <td>Appointment Date</td>
            <td>Note</td>
        </tr>
    </thead>

    <tbody>
        <?php

        $result = mysqli_query($con, "SELECT * FROM appointments INNER JOIN patient ON appointments.p_id = patient.p_id WHERE appointments.assigned_to_id = '$id' ");
        while ($row = mysqli_fetch_array($result)) {
            echo '
        <tr>
            <td>' . $row["a_id"] . '</td>
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
    </script>

</body>

</html>