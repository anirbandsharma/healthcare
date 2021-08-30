
<?php 
include('../connect.php');
$email = $_SESSION['email'];
$sql=mysqli_query($con, "SELECT * FROM technician WHERE email = '$email'");
$row=mysqli_fetch_array($sql);
$name=$row["name"];
?>

<link rel="stylesheet" href="../css/nav.css">

<header>
    <h3>HEALTHCARE</h3>
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
</header>

<div class="container">

    <nav>
        <div class="nav-content">
            <a href="./dashboard.php">
                <h4>Dashboard</h4>
            </a>
        </div>
        <div class="nav-content">
            <u>
                <p></p>
            </u>
            <a href="./my_profile.php?id=<?php echo $row["t_id"]; ?>"><span class="material-icons">
                    double_arrow
                </span>My profile</a><br>
            <a href="./edit_profile.php?id=<?php echo $row["t_id"]; ?>"><span class="material-icons">
                    double_arrow
                </span>Edit profile</a>
        </div>
        <div class="nav-content active">
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
        <!-- <div class="nav-content">
            <u>
                <p>Patients</p>
            </u>
            <a href="./view_patients.php"><span class="material-icons">
                    double_arrow
                </span>View patients</a><br>
        </div> -->

    </nav>