<?php
session_start();
if (!$_SESSION['email']) {
    header("LOCATION: login.php");
}
$email = $_SESSION['email'];

include("../connect.php");

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
    <title>Doctor - View patients</title>
    <link rel="stylesheet" href="../css/add.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

    <?php include('navigation.php'); ?>

    <main>

        <h3 style="margin-bottom: 30px;">View patients</h3>

            <?php
            $p_id = $_GET["p_id"];

            $result = mysqli_query($con, "SELECT * FROM patient INNER JOIN p_records ON patient.p_id = p_records.p_id WHERE patient.p_id = $p_id ");
            while ($row = mysqli_fetch_array($result)) {
                $records_notes = $row["notes"];
            ?>

<div class="patient-info">

             <table class="myTable" style="margin-right: 5px;">
                    <tr>
                        <th>Patient ID</td>
                        <td><?php echo $p_id; ?></td>
                    </tr>
                    <tr>
                        <th>Patient Name</th>
                        <td><?php echo $row["name"]; ?></td>
                    </tr>
                    <tr>
                        <th>Age</th>
                        <td><?php echo $row["age"]; ?></td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td><?php echo $row["gender"]; ?></td>
                    </tr>
                    <tr>
                        <th>E-mail</th>
                        <td><?php echo $row["email"]; ?></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td><?php echo $row["address"]; ?></td>
                    </tr>
                    <tr>
                        <th>Registration Date</th>
                        <td><?php echo $row["reg_date"]; ?></td>
                    </tr>
        </table>

        <table class="myTable" style="margin-left: 5px;">
                    <tr>
                        <th>Height</td>
                        <td><?php echo $row["height"]; ?></td>
                    </tr>
                    <tr>
                        <th>Weight</th>
                        <td><?php echo $row["weight"]; ?></td>
                    </tr>
                    <tr>
                        <th>Blood pressure</th>
                        <td><?php echo $row["blood_pressure"]; ?></td>
                    </tr>
                    <tr>
                        <th>Blood sugar</th>
                        <td><?php echo $row["blood_sugar"]; ?></td>
                    </tr>
                    <tr>
                        <th>Allergies</th>
                        <td><?php echo $row["allergies"]; ?></td>
                    </tr>
                    <tr>
                        <th>Notes</th>
                        <td><?php echo $row["notes"]; ?></td>
                    </tr>
                    <tr>
                        <th>Last updated on</th>
                        <td><?php echo $row["update_date"]; ?></td>
                    </tr>
        </table>

        <?php } ?>

</div>

<table class="myTable" style="margin: 10px 0;">

        <tr>
            <th>Report ID</th>
            <th>Appointment date</th>
            <th>Report Date</th>
            <th>Doctor name</th>
            <th>Diagnosis</th>
            <th>Prescription</th>
            <th>Notes</th>
        </tr>

        <?php
$result2 = mysqli_query($con, "SELECT * FROM ((patient INNER JOIN report ON patient.p_id = report.p_id) INNER JOIN doctor ON report.d_id = doctor.d_id) WHERE patient.p_id = $p_id");
while ($row2 = mysqli_fetch_array($result2)) {
?>

        <tr>
            <td><?php echo $row2["report_id"]; ?></td>
            <td><?php echo $row2["appointment_date"]; ?></td>
            <td><?php echo $row2["report_date"]; ?></td>
            <td><?php echo $row2["name"]; ?></td>
            <td><?php echo $row2["diagnosis"]; ?></td>
            <td><?php echo $row2["prescription"]; ?></td>
            <td><?php echo $row2["notes"]; ?></td>
        </tr>

        <?php } ?>

</table>

    </main>

    </div>

</body>

</html>