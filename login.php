<html>
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
	<link href='bootstrap/css/font.css' rel='stylesheet' type='text/css'/>
	<script src="bootstrap/js/jquery.js"></script>	
	<script src="bootstrap/js/bootstrap.js"></script>
	<body  style="background-color:silver">
<?php

 session_start();
 include('db.php');
  $sql="select * from login_details";
     $res=mysqli_query($con,$sql);
	 if($row=mysqli_fetch_array($res))
	 {
		
	?>
	
	<div class="col-lg-4" ></div>
	<div class="col-lg-4">
		<br><br><br><br> 
		<div class="modal-content"  style="padding:35px 50px;">
		<form method="POST" action="logproc.php">
     <h1 style="font-family:Jokerman;color:silver;">ADMIN</h1>
     <div class="form-group ">
	 <label><span class="glyphicon glyphicon-user"></span>username</label>
       <input type="text" class="form-control" placeholder="Username " name="uname" required>
       
     </div>
     <div class="form-group">
	 <label><span class="glyphicon glyphicon-eye-open"></span>password</label>
       <input type="password" class="form-control" placeholder="Password" name="password" required/>
       
     </div>
      
      <a class="link" href="sendmail.php">Lost your password?</a>
     <button type="submit" class="btn" ><span class="glyphicon glyphicon-lock"></span>Log in</button>
	</div>
	</div>
	</form>
	</body>
	
	
	
	
	
	<?php }

else
{
	echo"<p style='font-size:32px;'>admin not yet registered........!</p>";
	echo "<a href='register.php'><button class='btn btn-lg' >register admin</button></a>";
}
	?>
</html>