<?php
  
  session_start();
   if(isset($_SESSION['logged_in']))
{
 include('db.php');
  $sql="select * from employee_details";
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
		  <div class="panel-heading">Work Details </div>
			<div class="panel-body">
				<?php echo date("d/m/Y"); ?>
				<form name="myform" method="POST" action="storeworkentry.php" >
				<label>shelling rate  <input name="rate1" type="number" class="form-control"/></label>
				<label>grading rate  <input name="rate2" type="number" class="form-control"/></label>
					<table class="table table-striped"> 	
									<th>Employee ID</th>
									<th>Employee Name</th>
									<th>Working category</th>
									<th>cashew_shelled/grading in kg</th>
								<th></th>
					    <?php
					
								 $i=0;
								
                                while($row=mysqli_fetch_array($res))
                                  {
									
                                      echo  "<tr>";
                                      echo "<td>".$row['emp_id']."</td>";
                                      echo "<td>".$row['fname'].' '.$row['lname']."</td>";
									  echo "<td>".$row['hier']."</td>";
									  echo "<td><input  type='number' class='form-control' name='contents".$i."'/></td>";
									
                                    


                                      echo "</tr>";$i=$i+1;
									
                                  }
								  $_SESSION['totaldata']=$i;
						
                            ?>
					</table>
					<center><button class="btn" type="submit">submit</button></center>  
					</form>
				</div>
		   </div>
</div>
</body>
</html>
<?php
}
else header('Refresh:0;url=login.php');
 ?>