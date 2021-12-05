<?php
	session_start();
	include "../connect.php";
	$did=$_POST["name"];
	$pid=$_POST["pid"];
	// $date= current_timestamp();
	$msg=$_POST["msg"];
	
	$sql="INSERT into chatting values (null, current_timestamp(),'$did','$pid','$msg','$did','unread')";
	$result=mysqli_query($con,$sql);
	if($result)
	{
		header("location:chat.php?pid=".$pid);	
	}
	else
	{
		echo mysqli_error($con);	
	}
?>