
<?php
    include ("../connect.php");
    
    $name=$_POST["name"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $specialization=$_POST["specialization"];
    $fees=$_POST["fees"];
    
    $query="INSERT INTO `doctor` (`d_id`, `name`, `email`, `password`, `specialization`, `fees`, `created_date`) VALUES (null, '$name', '$email', '$password', '$specialization', '$fees', current_timestamp())";

    if(mysqli_query($con, $query))
    {
         header("Location:./view_doctor.php");
     }
     else
     {
         mysqli_error($con);
     }
    
?>