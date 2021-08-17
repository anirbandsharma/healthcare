<?php
session_start();
if (!$_SESSION['email']) {
    header("LOCATION: login.php");
}
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor - Dashboard</title>
    <link rel="stylesheet" href="../css/add.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

<?php include ('navigation.php'); ?>
    
        <main>
           <h3>Change password</h3>

           
           <form name="chngpwd" action="./changepass1.php" method="POST" onSubmit="return valid();">
                <div class="input-row">
                    <h4>Old password:</h4>
                    <input type="password" name="opwd" id="opwd" placeholder="Enter old password...">
                </div>
                <div class="input-row">
                    <h4>New password:</h4>
                    <input type="text" name="npwd" id="npwd" placeholder="Enter new password...">
                </div>
                <div class="input-row">
                    <h4>Confirm password:</h4>
                    <input type="text" name="cpwd" id="cpwd" placeholder="Confirm new password...">
                </div>
                <div class="input-row">
                    <h4></h4>
                    <input type="submit" value="Update password" style="background-color: rgb(23, 125, 172);color:white; font-weight:700; width:30%;">
                </div>
            </form>
                
            

        </main>

    </div>

    <script >
function valid()
{
if(document.chngpwd.opwd.value=="")
{
alert("Old Password Field is Empty !!");
document.chngpwd.opwd.focus();
return false;
}
else if(document.chngpwd.npwd.value=="")
{
alert("New Password Field is Empty !!");
document.chngpwd.npwd.focus();
return false;
}
else if(document.chngpwd.cpwd.value=="")
{
alert("Confirm Password Field is Empty !!");
document.chngpwd.cpwd.focus();
return false;
}
else if(document.chngpwd.npwd.value!= document.chngpwd.cpwd.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.chngpwd.cpwd.focus();
return false;
}
return true;
}
</script>

<?php
if( $_GET['pwd'] == 'changed') {
   echo '<script>  alert("Password successfully changed!");   </script>';
}
else if( $_GET['pwd'] == 'nochanged') {
   echo '<script>  alert("Old password is incorrect. Try again!");   </script>';
}else{

}
?>

</body>

</html>