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
    <title>Doctor - View appointment requests</title>
    <link rel="stylesheet" href="../css/add.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
</head>

<body>


<?php include('navigation.php'); ?>
    <div class="contents" id="contents">
        <div class="contents__heading">
            <div class="contents__heading__left">
                <h3 id="nav_btn" onclick="nav_button()">
                    < </h3> &nbsp; &nbsp;
                        <h3>View requests</h3>
            </div>
            <div class="contents__heading__right">
                <div class="dropdown">
                    <div class="user">
                        <h3><?php echo $name; ?></h3>
                        <span class="material-icons">
                            arrow_drop_down
                        </span>
                    </div>
                    <div class="dropdown-content">
                        <a href="changepass.php">Change password</a><br>
                        <a href="logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    
        <main>
<table class="table" id="myTable">
    <thead class="thead">
        <tr>
            <td>Request ID</td>
            <td>Patient Name</td>
            <td>Appointment for</td>
            <td>Appointment Date</td>
            <td>Time</td>
            <td>Note</td>
            <td>Action</td>
        </tr>
    </thead>

    <tbody>
        <?php

        $result = mysqli_query($con, "SELECT * FROM appointment_request INNER JOIN patient ON appointment_request.p_id = patient.p_id WHERE appointment_request.department = 'Doctor' AND appointment_request.value = '$name' OR appointment_request.value = 'any' ");
        while ($row2 = mysqli_fetch_array($result)) {
            echo '
        <tr>
            <td>' . $row2["request_id"] . '</td>
            <td>' . $row2["name"] . '</td>
            <td>' . $row2["value"] . '</td>
            <td>' . $row2["date"] . '</td>
            <td>' . $row2["start_time"] . '</td>
            <td>' . $row2["notes"] . '</td>
            <td><button><a href="accept_appointment.php?request_id='. $row2["request_id"] .'&p_id='. $row2["p_id"] .'&assigned_to_id='. $id .'&value='. $name .'&date='. $row2["date"] .'&time='. $row2["start_time"] .'&notes='. $row2["notes"] .'" class="action">ACCEPT</a></button>
                <button><a href="#" class="action">DECLINE</a></button></td>
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