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
}
</style>



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
