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

<?php include('navigation.php'); ?>
    <div class="contents" id="contents">
        <div class="contents__heading">
            <div class="contents__heading__left">
                <h3 id="nav_btn" onclick="nav_button()">
                    < </h3> &nbsp; &nbsp;
                        <h3>View appointments</h3>
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
            <td>Appointment ID</td>
            <td>Patient Name</td>
            <td>Appointment Date</td>
            <td>Time</td>
            <td>Note</td>
            <td>Action</td>
        </tr>
    </thead>

    <tbody>
        <?php
        $result = mysqli_query($con, "SELECT * FROM appointments INNER JOIN patient ON appointments.p_id = patient.p_id WHERE appointments.assigned_to_id = '$id'");
        while ($row = mysqli_fetch_array($result)) {
            ?>
        <tr>
            <td><?php echo $row["a_id"]; ?></td>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["date"]; ?></td>
            <td><?php echo $row["start_time"]; ?></td>
            <td><?php echo $row["note"]; ?></td>
            <td><button><a href="./update_report.php?a_id=<?php echo $row["a_id"]; ?>">Update report</a></buttton></td>
        </tr>

    <?php ;} ?>

    </tbody>


</table>

        </main>

    </div>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                responsive: true,
                "order": [[ 3, "desc" ]]
            });

        });
    </script>

</body>

</html>