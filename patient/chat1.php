<?php
	session_start();
	include "../connect.php";
	$pid=$_POST["name"];
	$did=$_POST["did"];
	// $date= current_timestamp();
	$msg=$_POST["msg"];
	
	$sql="INSERT into chatting values (null, current_timestamp(),'$did','$pid','$msg','$pid','unread')";
	$result=mysqli_query($con,$sql);
	if($result)
	{
		header("location:chat.php?did=".$did);	
	}
	else
	{
		echo mysqli_error($con);	
	}
?>