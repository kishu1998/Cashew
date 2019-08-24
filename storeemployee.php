<?php 

session_start();
include('db.php');
$query="INSERT INTO employee_details(fname,lname,address,hier,mob) values
				('$_POST[fname]','$_POST[lname]','$_POST[address]','$_POST[hier]','$_POST[mob]')";

	if(mysqli_query($con,$query))
	{
			$message = "employee added successfully";
			
			echo "<script>alert('$message');</script>";
			header('Refresh:0;url=addemployee.php');
	}
	else
	{
			echo "Error in inserting data:".mysqli_error($con);
	}
?>