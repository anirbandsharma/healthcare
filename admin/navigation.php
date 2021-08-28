
<link rel="stylesheet" href="../css/nav.css">

<header>
        <h3>HEALTHCARE</h3>
        <div class="dropdown">
            <div class="user">
                <h3><?php echo $username; ?></h3>
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
                    <p>Doctor</p>
                </u>
                <a href="./add_doctor.php"><span class="material-icons">
                    double_arrow
                </span>Add doctor</a><br>
                <a href="./view_doctor.php"><span class="material-icons">
                    double_arrow
                </span>View doctors</a>
            </div>
            <div class="nav-content">
                <u>
                    <p>Patient</p>
                </u>
                <a href=""><span class="material-icons">
                    double_arrow
                </span>Add patient</a><br>
                <a href=""><span class="material-icons">
                    double_arrow
                </span>View patient</a>
            </div>
            <div class="nav-content">
                <u>
                    <p>Other</p>
                </u>
                <a href=""><span class="material-icons">
                    double_arrow
                </span>View all appointments</a>
            </div>
        </nav>
