<?php
session_start();
if (!$_SESSION['email']) {
    header("LOCATION: login.php");
}
$email = $_SESSION['email'];

include ("../connect.php");
$id=$_GET["id"];

$sql = mysqli_query($con, "SELECT * FROM patient WHERE email = '$email'");
$row1 = mysqli_fetch_array($sql);
$id = $row1["p_id"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Dashboard</title>
    <link rel="stylesheet" href="../css/add.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

<?php include ('navigation.php'); ?>
    
        <main>
           <h3 style="margin-bottom: 20px;">My profile</h3>

           
           <?php

$result = mysqli_query($con, "SELECT * FROM patient INNER JOIN p_records ON patient.p_id = p_records.p_id WHERE patient.p_id = $id ");
while ($row = mysqli_fetch_array($result)) {
    $records_notes = $row["notes"];
?>


        <table class="myTable" style="margin-bottom: 10px;">
            <tr>
                <th style="width: 30%;">Patient ID</td>
                <td style="width: 70%;"><?php echo $id; ?></td>
            </tr>
            <tr>
                <th style="width: 30%;">Patient Name</th>
                <td style="width: 70%;"><?php echo $row["name"]; ?></td>
            </tr>
            <tr>
                <th style="width: 30%;">Age</th>
                <td style="width: 70%;"><?php echo $row["age"]; ?></td>
            </tr>
            <tr>
                <th style="width: 30%;">Gender</th>
                <td> style="width: 70%;"<?php echo $row["gender"]; ?></td>
            </tr>
            <tr>
                <th style="width: 30%;">E-mail</th>
                <td style="width: 70%;"><?php echo $row["email"]; ?></td>
            </tr>
            <tr>
                <th style="width: 30%;">Address</th>
                <td style="width: 70%;"><?php echo $row["address"]; ?></td>
            </tr>
            <tr>
                <th style="width: 30%;">Registration Date</th>
                <td style="width: 70%;"><?php echo $row["reg_date"]; ?></td>
            </tr>
        </table>

        <table class="myTable" style="margin-top: 10px;">
            <tr>
                <th style="width: 30%;">Height</td>
                <td style="width: 70%;"><?php echo $row["height"]; ?></td>
            </tr>
            <tr>
                <th style="width: 30%;">Weight</th>
                <td style="width: 70%;"><?php echo $row["weight"]; ?></td>
            </tr>
            <tr>
                <th style="width: 30%;">Blood pressure</th>
                <td><?php echo $row["blood_pressure"]; ?></td>
            </tr>
            <tr>
                <th style="width: 30%;">Blood sugar</th>
                <td><?php echo $row["blood_sugar"]; ?></td>
            </tr>
            <tr>
                <th>Allergies</th>
                <td style="width: 70%;"><?php echo $row["allergies"]; ?></td>
            </tr>
            <tr>
                <th style="width: 30%;">Notes</th>
                <td style="width: 70%;"><?php echo $row["notes"]; ?></td>
            </tr>
            <tr>
                <th style="width: 30%;">Last updated on</th>
                <td style="width: 70%;"><?php echo $row["update_date"]; ?></td>
            </tr>
        </table>

    <?php } ?>


        </main>

    </div>

</body>

</html>