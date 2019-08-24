<?php
session_start();
include('db.php');
$id=$_SESSION['id'];
$pwd=$_POST['password'];
$pwd=password_hash($pwd,PASSWORD_BCRYPT);

		$query="update login_details set password='$pwd' where password='$id'";
		if(mysqli_query($con,$query))
		{
			$message = "password changed succesfully..! plz log in";
			echo "<script>alert('$message');</script>";
			header('Refresh:0;url=login.php');
		}
		
?>