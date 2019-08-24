<?php

    session_start();
	  
    include('db.php');
	header('Refresh:0;url=todaysentrydetails.php');
		$date1=date('Y/m/d');
		$date1=date("Y-m-d",strtotime($date1));
		$query1="select * from employee_details";
		$row=mysqli_query($con,$query1);
		$j=0;
		while($res=mysqli_fetch_array($row))
		{
		$id[$j]=$res['emp_id'];
		$j=$j+1;
		}

	$v=$_SESSION['k'];
			echo $_POST['kis'];
	for($i=0;$i<$v;$i++)
	{
		$emp=$id[$i];
		$contents=$_POST["contents".$i];
		
		$date=date('Y/m/d');
		$date=date("Y-m-d",strtotime($date));
		$query="update work_details set cashew_shelled='".$contents."' where emp_id='".$emp."'and date='".$date."'";
	echo $query;
		//mysqli_query($con,$query);
	}
/*echo "<script>alert('todays work detail has been updated');</script>";*/
			
	
		
 mysqli_close($con);
?>