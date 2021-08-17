<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <div class="container">
        <div class="photo" style="background-image: url('../images/admin.jpg');"></div>
        <div class="login">
            <center><h2>Admin Login</h2></center>
            <form action="login1.php" method="post">
                <div class="input-row">
                   <h4>Username</h4>
                    <input type="text" name="username" placeholder="Enter your username">
                </div>
                <div class="input-row">
                   <h4>Password</h4>
                    <input type="password" name="password" placeholder="Enter your password">
                </div>
                <div class="input-row">
                    <input type="submit" value="Login" style="background-color:rgb(43, 87, 138); color:white; font-weight:600;">
                </div>
            </form>
        </div>
    </div>
</body>

</html>

