<?php
session_start();
if (!$_SESSION['email']) {
    header("LOCATION: login.php");
}
$email = $_SESSION['email'];

include ("../connect.php");
$id=$_GET["id"];

$sql = mysqli_query($con, "SELECT * FROM patient WHERE p_id = '$id'");
$row = mysqli_fetch_array($sql);

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
           <h3>My profile</h3>

           
            <div class="input-row">
                    <h4>ID:</h4>
                    <input type="text" value="<?php echo $id; ?>" disabled>
                </div>
                <div class="input-row">
                    <h4>Name:</h4>
                    <input type="text" value="<?php echo $row["name"]; ?>" disabled>
                </div>
                <div class="input-row">
                    <h4>Email:</h4>
                    <input type="email" value="<?php echo $row["email"]; ?>" disabled>
                </div>
                <div class="input-row">
                    <h4>Address:</h4>
                    <input type="text" value="<?php echo $row["address"]; ?>" disabled>
                </div>
                <div class="input-row">
                    <h4>Age:</h4>
                    <input type="number" value="<?php echo $row["age"]; ?>" disabled>
                </div>
                <div class="input-row">
                    <h4>Gender:</h4>
                    <input type="text" value="<?php echo $row["gender"]; ?>" disabled>
                </div>
                <div class="input-row">
                    <h4>Registration Date:</h4>
                    <input type="date/time" value="<?php echo $row["reg_date"]; ?>" disabled>
                </div>

        </main>

    </div>

</body>

</html>