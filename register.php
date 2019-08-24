<?php
session_start();
include('db.php');

$query1="select * from login_details";
$res=mysqli_query($con,$query1);
if($row=mysqli_fetch_array($res))
{
	$message = "admin registered...!";
			echo "<script>alert('$message');</script>";
			header('Refresh:0;url=login.php');
}
else
{	
?>
<html>
<head></head>

<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
	<link href='bootstrap/css/font.css' rel='stylesheet' type='text/css'/>
	<script src="bootstrap/js/jquery.js"></script>	
	<script src="bootstrap/js/bootstrap.js"></script>

<body>


<div class="col-lg-4"></div>
<div class="col-lg-4">
<br><br><br>
<div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">ADMIN DETAILS</div>
      <div class="panel-body">	<form name="myform" method="POST" action="storeadmin.php" >
<label>User Name<input  name="uname" type="text" class="form-control" required /></label><br><br>
<label>Email<input type="email" class="form-control" name="email" required /></label><br><br>
<label>Password<input type="text" class="form-control" name="password" required /></label><br><br>	
<label>Confirm password<input type="text" class="form-control"  required  /></label>
<br><br>
<center><input type="submit" class="btn btn-lg" value="submit"/></form></center>
</div>
    </div>
	 
	</div>

</div>
</body>
</html>
<?php
}
?>