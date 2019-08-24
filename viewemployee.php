<?php
  session_start();
   if(isset($_SESSION['logged_in']))
{
 include('db.php');
 
   if(isset($_POST["search"]))
   {
	  
	   	$sql="select * from employee_details where emp_id='$_POST[search]'";
   }
	 else $sql="select * from employee_details";
     $res=mysqli_query($con,$sql);
?>
<html>
<head></head>

<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
	<link href='bootstrap/css/font.css' rel='stylesheet' type='text/css'/>
	<script src="bootstrap/js/jquery.js"></script>	
	<script src="bootstrap/js/bootstrap.js"></script>
	<style>
	
	.title {
	float:left;
    font-size: x-large;
    color: #d7d4e8;
    font-family: -webkit-pictograph;
    margin-left: 350px;
}
	</style>

<body>
<?php include('dasboard.php'); ?>

<div class="col-lg-9">
 <div class="panel panel-default">
		  <div class="panel-heading">List of employee</div>
			<div class="panel-body">
				<form action="viewemployee.php" method="POST">
					<label>Employee ID<input type="number" name="search" /></label>
					<button type="submit" class="btn">Search</button>
				</form>
					<table class="table table-striped"> 	
									<th>Employee ID</th>
									<th>Employee Name</th>
									<th>Working category</th>
									<th>mob</th>
								<th></th>
					    <?php
								
                                while($row=mysqli_fetch_array($res))
                                  {

                                      echo  "<tr>";
                                      echo "<td>".$row['emp_id']."</td>";

                                      echo "<td>".$row['fname'].' '.$row['lname']."</td>";
									 echo "<td>".$row['hier']."</td>";
									 echo "<td>".$row['mob']."</td>";
                                      echo '<td>'."<a href='editemployee.php?info=".$row['emp_id']."'>EDIT</a>".'</td>';


                                      echo "</tr>";
                                  }
							
							
                            ?>
					</table>
				</div>
		   </div>
</div>
</body>
</html>
<?php
}
else header('Refresh:0;url=login.php');
 ?>