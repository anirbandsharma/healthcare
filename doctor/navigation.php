<?php
include('../connect.php');
$email = $_SESSION['email'];
$sql = mysqli_query($con, "SELECT * FROM doctor WHERE email = '$email'");
$row = mysqli_fetch_array($sql);
$name = $row["name"];
?>

<link rel="stylesheet" href="../css/navigation.css">

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