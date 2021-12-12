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
    <title>New-Dashboard</title>
    <link rel="stylesheet" href="../css/new-dash.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>
<nav id="nav">
        <div class="nav-content">
            <a href="./dashboard.php">
                <h4>Dashboard</h4>
            </a>
        </div>
        <div class="nav-content">
            <u>
                <p></p>
            </u>
            <a href="./my_profile.php?id=<?php echo $row["d_id"]; ?>"><span class="material-icons">
                    double_arrow
                </span>My profile</a><br>
            <a href="./edit_profile.php?id=<?php echo $row["d_id"]; ?>"><span class="material-icons">
                    double_arrow
                </span>Edit profile</a>
        </div>
        <div class="nav-content">
            <u>
                <p>Appointments</p>
            </u>
            <a href="./view_request.php"><span class="material-icons">
                    double_arrow
                </span>View Appointment requests</a><br>
            <a href="./view_appointments.php"><span class="material-icons">
                    double_arrow
                </span>View appointments</a>
        </div>
        <div class="nav-content">
            <u>
                <p>Patients</p>
            </u>
            <a href="./view_patients.php"><span class="material-icons">
                    double_arrow
                </span>View patients</a><br>
        </div>
        <div class="nav-content">
            <u>
                <p>Enquiries</p>
            </u>
            <a href="./chat.php"><span class="material-icons">
                    double_arrow
                </span>Chat here</a><br>
           
        </div>

    </nav>

    
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
           
        </main>


    </div>

    <script>
        function nav_button() {
            var contents = document.getElementById("contents");
            var btn = document.getElementById("nav_btn");

            if (contents.style.width == "80vw") {
                contents.style.width = "100vw";
                contents.style.borderRadius = "0";
                btn.innerText = ">";
            } else {
                contents.style.width = "80vw";
                contents.style.borderRadius = "2rem 0 0 2rem";
                btn.innerText = "<";
            }
        }
    </script>
</body>

</html>