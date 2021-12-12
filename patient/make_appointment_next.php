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
    <div class="contents" id="contents">
        <div class="contents__heading">
            <div class="contents__heading__left">
                <h3 id="nav_btn" onclick="nav_button()">
                    < </h3> &nbsp; &nbsp;
                        <h3>Make appointment</h3>
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

        <form action="make_appointment1.php" method="POST">

            <?php
            // fetching previous input data to be sent to the database
            $id = $_POST["id"];
            $department = $_POST["department"];
            $value = $_POST["value"];
            $date = $_POST["date"];

            // query to check available slots in the selected date
            $time = array();
            $query = mysqli_query($con, "SELECT * FROM appointments WHERE department = '$department' AND value = '$value' AND date = '$date' ");
            while ($r = mysqli_fetch_assoc($query)) {
                $time[] = $r["start_time"];
            }
            ?>

            <!-- previous inputs -->
            <input type="text" name="id" value="<?php echo $id; ?>" readonly hidden>
            <input type="text" name="department" value="<?php echo $department; ?>" hidden>
            <input type="text" name="value" value="<?php echo $value; ?>" hidden>
            <input type="date" name="date" value="<?php echo $date; ?>" hidden>

            <div class="input-row">
                <h4>Select a time slot:</h4>
            </div>

            <!-- all the slots (timings)  -->
            <div class="input-radio">

                <div class="rad" style="<?php if (in_array('9', $time)) {
                                            echo "background-color: red";
                                        } ?>">
                    <input type="radio" name="time" value="9" <?php if (in_array('9', $time)) {
                                                                    echo "disabled";
                                                                } ?>>
                    <label for="9">9:00-10:00</label>
                </div>

                <div class="rad" style="<?php if (in_array('10', $time)) {
                                            echo "background-color: red";
                                        } ?>">
                    <input type="radio" name="time" value="10" <?php if (in_array('10', $time)) {
                                                                    echo "disabled";
                                                                } ?>>
                    <label for="10">10:00-11:00</label>
                </div>

                <div class="rad" style="<?php if (in_array('11', $time)) {
                                            echo "background-color: red";
                                        } ?>">
                    <input type="radio" name="time" value="11" <?php if (in_array('11', $time)) {
                                                                    echo "disabled";
                                                                } ?>>
                    <label for="11">11:00-12:00</label>
                </div>

                <div class="rad" style="<?php if (in_array('12', $time)) {
                                            echo "background-color: red";
                                        } ?>">
                    <input type="radio" name="time" value="12" <?php if (in_array('12', $time)) {
                                                                    echo "disabled";
                                                                } ?>>
                    <label for="12">12:00-13:00</label>
                </div>

                <div class="rad" style="<?php if (in_array('13', $time)) {
                                            echo "background-color: red";
                                        } ?>">
                    <input type="radio" name="time" value="13" <?php if (in_array('13', $time)) {
                                                                    echo "disabled";
                                                                } ?>>
                    <label for="13">13:00-14:00</label>
                </div>

                <div class="rad" style="<?php if (in_array('15', $time)) {
                                            echo "background-color: red";
                                        } ?>">
                    <input type="radio" name="time" value="15" <?php if (in_array('15', $time)) {
                                                                    echo "disabled";
                                                                } ?>>
                    <label for="15">15:00-16:00</label>
                </div>

                <div class="rad" style="<?php if (in_array('16', $time)) {
                                            echo "background-color: red";
                                        } ?>">
                    <input type="radio" name="time" value="16" <?php if (in_array('16', $time)) {
                                                                    echo "disabled";
                                                                } ?>>
                    <label for="16">16:00-17:00</label>
                </div>

            </div>

            <div class="input-row">
                <h4>Notes (optional):</h4>
                <textarea name="notes" id="notes" cols="30" rows="5"></textarea>
            </div>

            <div class="input-row">
                <h4></h4>
                <input type="button" onclick="history.back();" value="Back" style="background-color: rgb(23, 125, 172);color:white; font-weight:700; width:30%;">
                <input type="submit" value="Request appointment" style="background-color: rgb(23, 125, 172);color:white; font-weight:700; width:30%;">
            </div>
        </form>

    </main>


</body>

</html>