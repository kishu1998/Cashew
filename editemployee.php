<?php session_start();
session_start();
if(isset($_SESSION['logged_in']))
{
 include('db.php');
 
	  
	   	$sql="select * from employee_details where emp_id='$_GET[info]'";
$_SESSION['emp_id']=$_GET['info'];
     $res=mysqli_query($con,$sql);
	 $row=mysqli_fetch_array($res);
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

<div class="col-lg-1"></div>
<div class="col-lg-6">

<div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">Edit Employee details</div>
      <div class="panel-body">	<form name="myform" method="POST" action="updateemployee.php" >
<label>First Name<input  name="fname" value="<?php echo ($row['fname'])?>" type="text"class="form-control" required /></label><br>
<label>Last Name<input type="text" class="form-control" name="lname" value="<?php echo ($row['lname'])?>" required /></label><br>
<label>Address<input type="text" class="form-control" name="address"  value="<?php echo ($row['address'])?>" required /></label><br>
<label>Hier For<select class="form-control" name="hier" value="<?php echo ($row['hier'])?>" required ><option >shelling</option><option >grading</option></select>
<label>Mob<input type="number" class="form-control" name="mob" value="<?php echo ($row['mob'])?>" required /></label><div id="msg1"></div><br><br>
<input type="submit" class="btn btn-primary" value="UPDATE"/></form>
</div>
    </div>
	 
	</div>

</div>
</body>
</html>
<?php
}
else header('Refresh:0;url=login.php');
 ?>