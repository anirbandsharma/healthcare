<style>
main{
    margin-bottom: 50px;
}
</style>

<?php
include('../connect.php');
$email = $_SESSION['email'];
$sql=mysqli_query($con, "SELECT * FROM patient WHERE email = '$email'");
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
                <a href="./changepass.php">Change password</a><br>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </header>

    <div class="container">

        <nav>
        <div class="nav-content">
                <a href="./dashboard.php"><h4>Dashboard</h4></a>
            </div>
            <div class="nav-content">
                <u>
                    <p></p>
                </u>
                <a href="./my_profile.php"><span class="material-icons">
                    double_arrow
                </span>My profile</a><br>
                <a href="./edit_profile.php?id=<?php echo $row["p_id"]?>"><span class="material-icons">
                    double_arrow
                </span>Edit profile</a>
            </div>
            <div class="nav-content">
                <u>
                    <p>Records</p>
                </u>
                <a href="./update_record.php?id=<?php echo $row["p_id"]?>"><span class="material-icons">
                    double_arrow
                </span>Update medical record</a><br>
                <a href="./view_reports.php"><span class="material-icons">
                    double_arrow
                </span>View reports</a>
            </div>
            <div class="nav-content">
                <u>
                    <p>Appointments</p>
                </u>
                <a href="./make_appointment.php"><span class="material-icons">
                    double_arrow
                </span>Make an appointment</a><br>
                <a href="./view_appointments.php"><span class="material-icons">
                    double_arrow
                </span>View appointments</a>
            </div>
            
        </nav>
