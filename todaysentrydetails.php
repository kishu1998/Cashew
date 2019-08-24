<?php
 
  session_start();
  if(isset($_SESSION['logged_in']))
{
 include('db.php');
  $sql="select * from work_details";
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
				
				<form  >
				<?php echo date('d/m/Y'); ?>
					<table class="table table-striped"> 	
									<th>Employee ID</th>
									<th>Cashew shelled/graded</th>
									<th>cashew rate</th>
									<th>salary of day</th>
									<th></th>
								
					    <?php
					
								$date1=date('Y/m/d');
		$date1=date("Y-m-d",strtotime($date1));
								$i=0;
								$j=0;
                                while($row=mysqli_fetch_array($res))
                                  {
									if($row['date']==$date1)
									{ echo  "<tr>";
                                      echo "<td>".$row['emp_id']."</td>";
                                   $i=$i+$row['cashew_shelled'];
									  echo "<td>".$row['cashew_shelled']."</td>";
									  echo "<td>".$row['shelling_rate']."</td>";
									  $j=$j+$row['shelling_rate']*$row['cashew_shelled'];
									echo "<td>".$row['shelling_rate']*$row['cashew_shelled'].".00</td>";
                                      echo '<td>'."<a href='editentry.php?info=".$row['emp_id']."'>EDIT</a>".'</td>';

									}
                              
									
                                  }
								  echo "<tr>";
								  echo "<td>TOTAL</td>";
								  echo "<td><input type='text' value='".$i."' disabled/></td>";
								  echo "<td></td>";
								  echo "<td><input type='text' value='".$j.".00' disabled/></td>";
								  echo "</tr>";
						?>
					</table>
					
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
 
 