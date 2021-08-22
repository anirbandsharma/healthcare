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

        <form action="make_appointment1.php" method="POST">
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
                <select name="department" id="">
                    <option value="" default>Selcect department</option>
                    <option value="Doctor">Doctor</option>
                    <option value="Technician">Technician</option>
                </select>
            </div>
            <div class="input-row">
                <h4>Date:</h4>
                <input type="date" name="date">
            </div>
            <div class="input-row">
                <h4>Notes (optional):</h4>
                <textarea name="notes" id="notes" cols="30" rows="5"></textarea>
            </div>
            <div class="input-row">
                <h4></h4>
                <input type="submit" value="Request appointment" style="background-color: rgb(23, 125, 172);color:white; font-weight:700; width:30%;">
            </div>
        </form>

    </main>

    </div>

</body>

</html>