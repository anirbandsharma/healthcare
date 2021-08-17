<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient - Signup</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <div class="container">
        <div class="photo" style="background-image: url('../images/patient.jpg');"></div>
        <div class="login">
            <center>
                <h2>Create account</h2>
            </center>
            <form action="" method="post">
                <div class="input-row">
                    <h4>Name</h4>
                    <input type="text" name="name" placeholder="Enter your name">
                </div>
                <div class="input-row">
                    <h4>Email</h4>
                    <input type="email" name="email" placeholder="Enter your email">
                </div>
                <div class="input-row">
                    <h4>Password</h4>
                    <input type="password" name="password" placeholder="Enter your password">
                </div>
                <div class="input-row">
                    <h4>Address</h4>
                    <input type="text" name="address" placeholder="Enter your address">
                </div>
                <div class="input-row">
                    <h4>Age</h4>
                    <input type="number" name="age" placeholder="Enter your age" min="0">
                </div>
                <h4>Gender</h4>
                <div class="radio-cont">
                    <div class="radio-btn">
                        <label for="male">Male</label>
                        <input type="radio" name="gender" value="male">
                    </div>
                    <div class="radio-btn">
                        <label for="female">Female</label>
                        <input type="radio" name="gender" value="female">
                    </div>
                    <div class="radio-btn">
                        <label for="others">Others</label>
                        <input type="radio" name="gender" value="other">
                    </div>
                </div>
                <div class="input-row">
                    <input type="submit" value="Create account" style="background-color:rgb(43, 87, 138); color:white; font-weight:600;">
                </div>
            </form>
            <p>Already have an account? <a href="./login.php"> Login here </a></p>
        </div>
    </div>
</body>

</html>

<?php
    include ("../connect.php");
    
    $name=$_POST["name"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $address=$_POST["address"];
    $age=$_POST["age"];
    $gender=$_POST["gender"];
    
    $query="INSERT INTO `patient` (`p_id`, `name`, `email`, `password`, `address`, `age`, `gender`, `reg_date`) VALUES (null, '$name', '$email', '$password', '$address', '$age', '$gender', current_timestamp())";

    if(mysqli_query($con, $query))
    {
         header("Location:./login.php");
     }
     else
     {
         mysqli_error($con);
     }
    
?>