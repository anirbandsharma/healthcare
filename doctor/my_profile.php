<?php
session_start();
if (!$_SESSION['email']) {
    header("LOCATION: login.php");
}
$email = $_SESSION['email'];

include ("../connect.php");
$id=$_GET["id"];

$sql = mysqli_query($con, "SELECT * FROM doctor WHERE d_id = '$id'");
$row = mysqli_fetch_array($sql);

$name = $row["name"];
$email = $row["email"];
$specialization = $row["specialization"];
$fees = $row["fees"];

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
                    <input type="text" name="id" value="<?php echo $id; ?>" disabled>
                </div>
                <div class="input-row">
                    <h4>Name:</h4>
                    <input type="text" name="name" value="<?php echo $name; ?>" disabled>
                </div>
                <div class="input-row">
                    <h4>Email:</h4>
                    <input type="email" name="email" value="<?php echo $email; ?>" disabled>
                </div>
                <div class="input-row">
                    <h4>Specialization:</h4>
                    <input type="text" name="specialization" value="<?php echo $specialization; ?>" disabled>
                </div>
                <div class="input-row">
                    <h4>Fees:</h4>
                    <input type="number" name="fees" value="<?php echo $fees; ?>" disabled>
                </div>
                <div class="input-row">
                    <h4>Registration Date:</h4>
                    <input type="date/time" value="<?php echo $row["created_date"]; ?>" disabled>
                </div>
            

        </main>

    </div>

</body>

</html>