<?php
session_start();
if (!$_SESSION['email']) {
    header("LOCATION: login.php");
}
$email = $_SESSION['email'];

include("../connect.php");
$id = $_GET["id"];

$sql = mysqli_query($con, "SELECT * FROM patient INNER JOIN p_records ON patient.p_id=p_records.p_id WHERE patient.p_id = '$id'");
$row = mysqli_fetch_array($sql);

$height = $row["height"];
$weight = $row["weight"];
$blood_pressure = $row["blood_pressure"];
$blood_sugar = $row["blood_sugar"];
$allergies = $row["allergies"];
$notes = $row["notes"];
$update = $row["update_date"]
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row["name"]; ?> - Records</title>
    <link rel="stylesheet" href="../css/add.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

    <?php include('navigation.php'); ?>

    <main>
        <h3>Update medical record</h3>

        <form action="update_record1.php" method="POST">
            <div class="input-row">
                <h4>ID:</h4>
                <input type="text" name="id" value="<?php echo $id; ?>" readonly>
            </div>
            <div class="input-row">
                <h4>Name:</h4>
                <p><?php echo $row["name"]; ?></p>
            </div>
            <div class="input-row">
                <h4>Last updated on:</h4>
                <p><?php echo $update; ?></p>
            </div>
            <div class="input-row">
                <h4>Height:</h4>
                <input type="text" name="height" value="<?php echo $height; ?>">
            </div>
            <div class="input-row">
                <h4>Weight:</h4>
                <input type="text" name="weight" value="<?php echo $weight; ?>">
            </div>
            <div class="input-row">
                <h4>Blood Pressure:</h4>
                <input type="text" name="blood_pressure" value="<?php echo $blood_pressure; ?>">
            </div>
            <div class="input-row">
                <h4>Blood Sugar:</h4>
                <input type="text" name="blood_sugar" value="<?php echo $blood_sugar; ?>">
            </div>
            <div class="input-row">
                <h4>Allergies (if any):</h4>
                <input type="text" name="allergies" value="<?php echo $allergies; ?>">
            </div>
            <div class="input-row">
                <h4>Notes (optional):</h4>
                <textarea name="notes" id="notes" cols="30" rows="5"><?php echo $notes; ?></textarea>
            </div>
            <div class="input-row">
                <h4></h4>
                <input type="submit" value="Update" style="background-color: rgb(23, 125, 172);color:white; font-weight:700; width:30%;">
            </div>
        </form>

    </main>

    </div>

</body>

</html>