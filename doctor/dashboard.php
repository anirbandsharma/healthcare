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
    <title>Doctor - Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

<?php include ('navigation.php'); ?>
    
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