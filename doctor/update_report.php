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
    <title>Doctor - Reports</title>
    <link rel="stylesheet" href="../css/add.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

<?php include('navigation.php'); ?>
    <div class="contents" id="contents">
        <div class="contents__heading">
            <div class="contents__heading__left">
                <h3 id="nav_btn" onclick="nav_button()">
                    < </h3> &nbsp; &nbsp;
                        <h3>Update reports</h3>
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

        <?php
        $a_id = $_GET["a_id"];

        $result2 = mysqli_query($con, "SELECT * FROM ((appointments INNER JOIN patient ON appointments.p_id = patient.p_id) INNER JOIN report ON appointments.date = report.appointment_date) WHERE appointments.a_id=$a_id ");
        while ($row2 = mysqli_fetch_array($result2)) {
        $report_id = $row2["report_id"];
        $p_id = $row2["p_id"]; 
        ?>

        <form action="update_report1.php?report_id=<?php echo $report_id; ?>" method="POST" style="margin-bottom: 50px;">
            <div class="input-row">
                    <h4>Patient ID:</h4>
                    <input type="text" name="p_id" value="<?php echo $p_id ?>" disabled>
                </div>
                <div class="input-row">
                    <h4>Patient Name:</h4>
                    <input type="text" name="p_name" value="<?php echo $row2["name"]; ?>" disabled>
                </div>
                <div class="input-row">
                    <h4>Diagnosis:</h4>
                    <input type="text" name="diagnosis" value="<?php echo $row2["diagnosis"]; ?>">
                </div>
                <div class="input-row">
                    <h4>tests:</h4>
                    <textarea name="tests" cols="30" rows="5"><?php echo $row2["tests"]; ?></textarea>
                </div>
                <div class="input-row">
                    <h4>Notes:</h4>
                    <textarea name="notes" cols="30" rows="5"><?php echo $row2["notes"]; ?></textarea>
                </div>
                <div class="input-row">
                    <h4>Medicine:</h4>
                    <textarea name="medicine" cols="30" rows="5"><?php echo $row2["medicine"]; ?></textarea>
                </div>
               
                <div class="input-row">
                    <h4></h4>
                    <input type="submit" value="Update" style="background-color: rgb(23, 125, 172);color:white; font-weight:700; width:30%;">
                </div>
            </form>
        
<?php } ?>

        </main>

    </div>

</body>

</html>

