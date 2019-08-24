<?php

    session_start();
    include('db.php');
	$rate1= $_POST["rate1"];
	$rate2= $_POST["rate2"];
		$date1=date('Y/m/d');
		$date1=date("Y-m-d",strtotime($date1));
	$query3="select date from work_details";
	$r=mysqli_query($con,$query3);
	$flag=0;
	while($row=mysqli_fetch_array($r))
	{
		if($row['date']==$date1)
		$flag=1;
	}
	if($flag==0)
	{
		$query1="select * from employee_details";
		$row=mysqli_query($con,$query1);
		$j=0;
		while($res=mysqli_fetch_array($row))
		{
		$id[$j]=$res['emp_id'];
		
		if($res['hier']=='shelling')
			$rt[$j]=$rate1;
		else
			$rt[$j]=$rate2;

		$j=$j+1;
		}

	$v=$_SESSION['totaldata'];
	
	for($i=0;$i<$v;$i++)
	{
	
		$contents = $_POST["contents".$i];
		
		$rate=$rt[$i];
		
		$emp_id=$id[$i];
		$date=date('Y/m/d');
		$date=date("Y-m-d",strtotime($date));
		$query="insert into work_details values ('".$contents."','".$rate."','".$emp_id."','".$date."')";
	
		mysqli_query($con,$query);
	}
echo "<script>alert('todays work detail has been inserted successfully');</script>";
			header('Refresh:0;url=todaysentrydetails.php');
	}
		else
		{
			echo "<script>alert('todays work detail has been already inserted');</script>";
			header('Refresh:0;url=todaysentrydetails.php');
		}
 mysqli_close($con);
?>