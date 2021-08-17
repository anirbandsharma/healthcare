<?php
session_start();
if (!$_SESSION['username']) {
    header("LOCATION: login.php");
}
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Dashboard</title>
    <link rel="stylesheet" href="../css/add.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

<?php include ('navigation.php'); ?>
    
        <main>
           <h3>Add doctor</h3>

            <form action="add_doctor1.php" method="POST">
                <div class="input-row">
                    <h4>Name:</h4>
                    <input type="text" name="name" placeholder="Enter the name...">
                </div>
                <div class="input-row">
                    <h4>Email:</h4>
                    <input type="email" name="email" placeholder="Enter the email...">
                </div>
                <div class="input-row">
                    <h4>Password:</h4>
                    <input type="text" name="password" placeholder="Enter the password...">
                </div>
                <div class="input-row">
                    <h4>Specialization:</h4>
                    <input type="text" name="specialization" placeholder="Enter the specialization...">
                </div>
                <div class="input-row">
                    <h4>Fees:</h4>
                    <input type="number" name="fees" placeholder="Enter the fees...">
                </div>
                <div class="input-row">
                    <h4></h4>
                    <input type="submit" value="Add doctor" style="background-color: rgb(23, 125, 172);color:white; font-weight:700; width:30%;">
                </div>
            </form>

        </main>

    </div>

</body>

</html>

