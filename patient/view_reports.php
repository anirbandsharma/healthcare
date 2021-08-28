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

        <h3 style="margin-bottom: 30px;">View reports</h3>

            <div class="box" style="margin-bottom: 50px;">
                <div class="headings">
                    <h4 style="width: 10%;">Report ID</h4>
                    <h4 style="width: 30%;">Doctor name</h4>
                    <h4 style="width: 25%;">Appointment date</h4>
                    <h4 style="width: 25%;">Report date</h4>
                    <h4 style="width: 10%;">Details</h4>
                </div>

                <?php
                $result2 = mysqli_query($con, "SELECT * FROM ((patient INNER JOIN report ON patient.p_id = report.p_id) INNER JOIN doctor ON report.d_id = doctor.d_id) WHERE patient.p_id = $id");
                while ($row2 = mysqli_fetch_array($result2)) {
                ?>

<script>
function myFunction1<?php echo $row2["report_id"]; ?>() {
  var moreText = document.getElementById("detail <?php echo $row2["report_id"]; ?>");
  var btnText = document.getElementById("myBtn <?php echo $row2["report_id"]; ?>");

  if ( btnText.innerHTML == "Details") {
    btnText.innerHTML = "Close"; 
    moreText.classList.remove("close");
    moreText.classList.add("open");
    // moreText.style.display = "block";
  } else {
    btnText.innerHTML = "Details"; 
    moreText.classList.remove("open");
    moreText.classList.add("close");
    // moreText.style.display = "none";
  }
}
</script>

                    <div class="entries">
                        <p style="width: 10%;"><?php echo $row2["report_id"]; ?></p>
                        <p style="width: 30%;"><?php echo $row2["name"]; ?></p>
                        <p style="width: 25%;"><?php echo $row2["appointment_date"]; ?></p>
                        <p style="width: 25%;"><?php echo $row2["report_date"]; ?></p>
                        <p style="width: 10%;"><button onclick="myFunction1<?php echo $row2["report_id"]; ?>()" id="myBtn <?php echo $row2["report_id"]; ?>">Details</button></p>
                    </div>

                    <div class="more-details close" id="detail <?php echo $row2["report_id"]; ?>">
                        <div class="d-row">
                            <h4>Diagnosis:</h4> &emsp;
                            <p><?php echo $row2["diagnosis"]; ?></p>
                        </div>
                        <div class="d-row">
                            <h4>Prescription:</h4> &emsp;
                            <p><?php echo $row2["prescription"]; ?></p>
                        </div>
                        <div class="d-row">
                            <h4>Notes:</h4> &emsp;
                            <p><?php echo $row2["notes"]; ?></p>
                        </div>
                    </div>

                <?php } ?>
            </div>


    </main>

    </div>

</body>

</html>