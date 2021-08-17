<?php
	include "../connect.php";
	session_start();
	$email=$_SESSION['email'];

	$oldp=$_POST["opwd"];
	$newp=$_POST["npwd"];
	$result=mysqli_query($con,"Select password from patient where email='$email'");
	$row=mysqli_fetch_array($result);
	$op=$row["password"];
	if($oldp==$op)
	{
		$rec=mysqli_query($con,"Update patient set password='$newp' where email='$email'");
		if($rec)
		{
			header("location:changepass.php?pwd=changed");	
		}
		else
		{
			echo $mysqli_error($con);	
		}
	}
	else
	{
		header("location:changepass.php?pwd=nochanged");	
	}
?>