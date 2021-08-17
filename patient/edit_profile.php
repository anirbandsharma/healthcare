<?php
session_start();
if (!$_SESSION['email']) {
    header("LOCATION: login.php");
}
$email = $_SESSION['email'];

include("../connect.php");
$id = $_GET["id"];

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

    <?php include('navigation.php'); ?>

    <main>
        <h3>Edit profile</h3>

        <form action="edit_profile1.php" method="POST">
            <div class="input-row">
                <h4>ID:</h4>
                <input type="text" name="id" value="<?php echo $id; ?>" readonly>
            </div>
            <div class="input-row">
                <h4>Name:</h4>
                <input type="text" name="name" value="<?php echo $row["name"]; ?>">
            </div>
            <div class="input-row">
                <h4>Email:</h4>
                <input type="email" name="email" value="<?php echo $row["email"]; ?>">
            </div>
            <div class="input-row">
                <h4>Address:</h4>
                <input type="text" name="address" value="<?php echo $row["address"]; ?>">
            </div>
            <div class="input-row">
                <h4>Age:</h4>
                <input type="number" name="age" value="<?php echo $row["age"]; ?>">
            </div>
            <div class="input-row">
                <h4>Gender:</h4>
                <div class="radio-cont">
                    <div class="radio-btn">
                        <label for="male">Male</label>
                        <input type="radio" name="gender" value="male" <?php if($row["gender"]=="male"){echo "checked";} ?>>
                    </div>
                    <div class="radio-btn">
                        <label for="female">Female</label>
                        <input type="radio" name="gender" value="female" <?php if($row["gender"]=="female"){echo "checked";} ?>>
                    </div>
                    <div class="radio-btn">
                        <label for="others">Others</label>
                        <input type="radio" name="gender" value="other" <?php if($row["gender"]=="other"){echo "checked";} ?>>
                    </div>
                </div>
            </div>
            <div class="input-row">
                <h4></h4>
                <input type="submit" value="Update" style="background-color: rgb(23, 125, 172);color:white; font-weight:700; width:30%;">
            </div>
        </form>

    </main>

    </div>

</body>

</html>