<?php
session_start();
include('db.php');
include('sendmailbasic.php');
  $sql="select * from login_details";
     $res=mysqli_query($con,$sql);
	 if($row=mysqli_fetch_array($res))
	 {
		$email_id=$row['email_id'];
	$subject='welcome to SHREE LAXMI CASHEW';
	$body='Go to this link tochange your password
			https://localhost/cashew/reset.php?id='.$row['password'].'
			';

	
			$message = "link has been mail to you .change your password from there......! ";
			email_std($email_id,$subject,$body);
			echo "<script>alert('$message');</script>";
			header('Refresh:0;url=login.php');
	 }

?>