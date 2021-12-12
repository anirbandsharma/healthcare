<?php
session_start();
if (!$_SESSION['email']) {
    header("LOCATION: login.php");
    include('../connect.php');

    $email = $_SESSION['email'];
    $sql = mysqli_query($con, "SELECT * FROM doctor WHERE email = '$email'");
    $row = mysqli_fetch_array($sql);
    $name = $row["name"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor - Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
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
                        <h3>Dashboard</h3>
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
        <!-- <div class="counters">
            <div class="counter-card">
                <span class="material-icons">
                    medication
                </span>
                <div class="text">
                    <h4>Total Doctors:</h4>
                    <p>10</p>
                </div>
            </div>
            <div class="counter-card">
                <span class="material-icons">
                    medication
                </span>
                <div class="text">
                    <h4>Total Doctors:</h4>
                    <p>10</p>
                </div>
            </div>
            <div class="counter-card">
                <span class="material-icons">
                    medication
                </span>
                <div class="text">
                    <h4>Total Doctors:</h4>
                    <p>10</p>
                </div>
            </div>
        </div> -->

        <?php
        // query to check available slots in the selected date
        date_default_timezone_set("Asia/Calcutta");
        $d =  isset($_GET['date']) ? $_GET['date'] : date("Y-m-d");
        $prev_d = date('Y-m-d', strtotime($d . ' -1 day'));
        $next_d = date('Y-m-d', strtotime($d . ' +1 day'));
        $time = array();
        $query = mysqli_query($con, "SELECT * FROM appointments INNER JOIN patient ON appointments.p_id = patient.p_id WHERE appointments.department = 'Doctor' AND appointments.value = '$name' AND appointments.date = '$d' ");
        while ($r = mysqli_fetch_array($query)) {
            $p_name = $r["name"];
            $time[] = $r["start_time"];
        }
        ?>
        <center>
            <h2 style="margin: 20px;"><u>Today's schedule</u></h2>
            <div class="events">
                <div class="heading">
                    <span class="material-icons" onclick="location.href='?date=<?= $prev_d; ?>';">
                        arrow_back_ios
                    </span>
                    <h4><?php echo $d; ?></h4>
                    <span class="material-icons" onclick="location.href='?date=<?= $next_d; ?>';">
                        arrow_forward_ios
                    </span>
                </div>
                <div class="event-contents">
                    <div class="time">
                        <h4>9:00-10:00</h4>
                    </div>
                    <div class="content">
                        <p><?php if (in_array('9', $time)) {
                                echo $p_name;
                            }else{echo '<p style="color: gray;">'."No appointment scheduled.</p>";} ?></p>
                    </div>
                </div>
                <div class="event-contents">
                    <div class="time">
                        <h4>10:00-11:00</h4>
                    </div>
                    <div class="content">
                        <p><?php if (in_array('10', $time)) {
                                echo $p_name;
                            }else{echo '<p style="color: gray;">'."No appointment scheduled.</p>";} ?></p>
                    </div>
                </div>
                <div class="event-contents">
                    <div class="time">
                        <h4>11:00-12:00</h4>
                    </div>
                    <div class="content">
                        <p><?php if (in_array('11', $time)) {
                                echo $p_name;
                            }else{echo '<p style="color: gray;">'."No appointment scheduled.</p>";} ?></p>
                    </div>
                </div>
                <div class="event-contents">
                    <div class="time">
                        <h4>12:00-13:00</h4>
                    </div>
                    <div class="content">
                        <p><?php if (in_array('12', $time)) {
                                echo $p_name;
                            }else{echo '<p style="color: gray;">'."No appointment scheduled.</p>";} ?></p>
                    </div>
                </div>
                <div class="event-contents">
                    <div class="time">
                        <h4>13:00-14:00</h4>
                    </div>
                    <div class="content">
                        <p><?php if (in_array('13', $time)) {
                                echo $p_name;
                            }else{echo '<p style="color: gray;">'."No appointment scheduled.</p>";} ?></p>
                    </div>
                </div>
                <div class="event-contents">
                    <div class="time">
                        <h4>15:00-16:00</h4>
                    </div>
                    <div class="content">
                        <p><?php if (in_array('15', $time)) {
                                echo $p_name;
                            }else{echo '<p style="color: gray;">'."No appointment scheduled.</p>";} ?></p>
                    </div>
                </div>
                <div class="event-contents">
                    <div class="time">
                        <h4>16:00-17:00</h4>
                    </div>
                    <div class="content">
                        <p><?php if (in_array('16', $time)) {
                                echo $p_name;
                            }else{echo '<p style="color: gray;">'."No appointment scheduled.</p>";} ?></p>
                    </div>
                </div>
            </div>
        </center>

    </main>
    </div>

</body>

</html>