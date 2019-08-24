<?php
include('db.php');
	include('sendmailbasic.php');
$pwd=$_POST['password'];
$pwd=password_hash($pwd,PASSWORD_BCRYPT);
$query="INSERT INTO login_details values ('$_POST[uname]','$pwd','$_POST[email]')";

	$email_id=$_POST['email'];
	$subject='welcome to SHREE LAXMI CASHEW';
	$body='YOUR REGISTERATION FOR ADMIN SUCCESSFUL';

	if(mysqli_query($con,$query))
	{
			$message = "admin register successfully......! plz log in";
			email_std($email_id,$subject,$body);
			echo "<script>alert('$message');</script>";
			header('Refresh:0;url=login.php');
	}
	else
	{
			echo "Error in inserting data:".mysqli_error($con);
	}
?>