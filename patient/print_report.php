<script>
    window.print();
</script>

<?php
session_start();
if (!$_SESSION['email']) {
    header("LOCATION: login.php");
}
$email = $_SESSION['email'];

include("../connect.php");

$sql = mysqli_query($con, "SELECT * FROM patient WHERE email = '$email'");
$row = mysqli_fetch_array($sql);

$id = $row["p_id"];
$name = $row["name"];
$rid = $_GET["rid"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print report</title>
</head>

<body>
    <?php
    $result2 = mysqli_query($con, "SELECT * FROM (patient INNER JOIN report ON patient.p_id = report.p_id) WHERE patient.p_id = $id AND report.report_id = $rid");
    while ($row2 = mysqli_fetch_array($result2)) {
    ?>
        <h4>Diagnosis:</h4> &emsp;
        <p><?php echo $row2["diagnosis"]; ?></p>
        <br>
        <h4>Prescription:</h4> &emsp;
        <p><?php echo $row2["prescription"]; ?></p>
        <br>
        <h4>Notes:</h4> &emsp;
        <p><?php echo $row2["notes"]; ?></p>
    <?php }; ?>
</body>

</html>