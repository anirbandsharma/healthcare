<?php
session_start();
if (!$_SESSION['email']) {
    header("LOCATION: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient - Dashboard</title>
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
            <div class="counters">
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
            </div>
        </main>

    </div>

</body>

</html>