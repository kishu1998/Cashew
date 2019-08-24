
<?php
session_start();
include('db.php');
$_SESSION['id']=$_GET['id'];
$id=$_SESSION['id'];
$query1="select * from login_details where password='$id'";
$res=mysqli_query($con,$query1);
if($row=mysqli_fetch_array($res))
{
			
?>


<html>
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
	<link href='bootstrap/css/font.css' rel='stylesheet' type='text/css'/>
	<script src="bootstrap/js/jquery.js"></script>	
	<script src="bootstrap/js/bootstrap.js"></script>
<body  >
	<div class="col-lg-4" ></div>
	<div class="col-lg-4">
		<br><br><br><br> 
		<div class="modal-content"  style="padding:35px 50px;">
		<form method="POST" action="resetstore.php">
     
     <div class="form-group ">
	 <label>Password</label>
       <input type="text" class="form-control" placeholder="Username " name="password" required>
       
     </div>
     <div class="form-group">
	 <label>confirm password</label>
       <input type="password" class="form-control" placeholder="Password"  required/>
       
     </div>
      
        <button type="submit" class="btn" >submit</button>
	</div>
	</div>
	</form>
	</html> 
	<?php
		
}
else
{			$message = "link expired";
			echo "<script>alert('$message');</script>";
			
}
	?>