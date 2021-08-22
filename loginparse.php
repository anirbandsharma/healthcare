<?php

	include ("connect.php");
	session_start();
	
	
	$email=$_POST["email"];
	$password = $_POST['password'];

	//$password = mysqli_real_escape_string($con, $password);
	//$password1 = mysqli_real_escape_string($con, $password);
	//$password = MD5($password);
	
	$q="select * from patient where email='$email' and password='$password'";
	$q_run=mysqli_query($con,$q);
	
	$q1="select * from doctor where email='$email' and password='$password'";
	$q1_run=mysqli_query($con,$q1);

	if(mysqli_num_rows($q1_run)>0){
		echo '<script>alert("Successfully Logged In As Doctor")</script>';
		$_SESSION['email']=$email;
		echo '<script>location.href="doctor/dashboard.php"</script>';
	}	
	else if(mysqli_num_rows($q_run)>0){
		echo '<script>alert("Successfully Logged In")</script>';
		$_SESSION['email']=$email;
		echo '<script>location.href="patient/dashboard.php"</script>';
	}	
	else{
		echo '<script>alert("Invalid Credentials...")</script>';
		echo '<script>location.href="index.html"</script>';
	}







