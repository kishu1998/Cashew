<?php
session_start(); 
include('db.php');

	
   $pwd=$_POST["password"];
   $uname=$_POST["uname"];
  $query="select * from login_details where user_name='$uname'";
		$res=mysqli_query($con,$query);
		if($row=mysqli_fetch_array($res))
		{
			 

			if(password_verify($pwd,$row['password']))
			{
				$_SESSION['logged_in']=true;
				header('Refresh:0;url=home.php');
			} 
		
			else
			{
				$message = "invalid password ";
				echo "<script>alert('$message');</script>";
				header('Refresh:0;url=login.php');
			}
		}
		else
		{
				$message = "invalid username ";
				echo "<script>alert('$message');</script>";
				header('Refresh:0;url=login.php');
		}
	 
?>