<style>
    *{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
body{
    overflow: hidden;
    height: 100vh;
}
a{
    text-decoration: none;
    color: black;
}
header{
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    height: 30px;
    padding: 30px;
    background-color: rgb(13, 14, 17);
    color: white;
}
.dropdown {
    position: relative;
    display: inline-block;
  }
header .user{
    display: flex; 
    align-items:center; 
    cursor:pointer;
}
header .dropdown-content{
    display: none;
    position: absolute;
    right: 0;
    width: 200px;
    height: fit-content;
    padding: 20px;
    line-height: 40px;
    background-color: white;
    border-radius: 0.5rem;
    box-shadow: 1px 5px 5px rgba(48, 48, 48, 0.747);
    z-index: 1;
}
header .dropdown:hover .dropdown-content{
    display: block;
}

.container{
    display: flex;
    height: 100%;
}
nav{
    flex: 1;
    background-color:rgb(13, 14, 17);
    width: 100%;
    color: white;
    padding: 0 50px;
}
.nav-content{
    margin: 20px 0;
}
.nav-content a{
    display: flex;
    align-items: center;
    text-decoration: none;
    color: white;
    font-size: 16px;
}
.nav-content p{
    padding: 10px 0;
}

main{
    flex: 5;
    width: 100%;
    padding: 30px;
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
                <a href="./my_profile.php?id=<?php echo $row["p_id"]?>"><span class="material-icons">
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
                <!-- <a href=""><span class="material-icons">
                    double_arrow
                </span>View appointments</a> -->
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
