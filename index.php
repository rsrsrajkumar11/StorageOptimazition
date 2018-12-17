<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

 
<body>

<div class="container" style="margin-top:5%;">
	<div class="row">
  		<div class="col-md-4"></div>
  		<div class="col-md-4">
			<div class="panel panel-default">
      			<div class="panel-body">
					<br>
					<h3>Login</h3>
					<br>

					<form role="form"   method="post">
						<div class="form-group">
							<label for="email" autocomplete="off" >User Name:</label>
							<input type="text" class="form-control" name="uid"  style="text-transform: uppercase;" required>
						</div>
						<div class="form-group">
							 <label for="pwd" autocomplete="off" >Password:</label>
							 <input type="password" class="form-control" name="pass" required >
						</div>
						<center>
							<button type="submit" name="smt" class="btn btn-primary">Submit</button>
	          			</center>
	               		 <br>
	               		<?php 
	               		if (isset($_REQUEST['smt'])) {
	               			if(isset($_REQUEST['uid']))
	               			{
	               				$uid=$_REQUEST['uid'];
	               			}else
	               				$uid=$_REQUEST['uid'];

	               			if(isset($_REQUEST['pass']))
	               			{
	               				$pass=$_REQUEST['pass'];
	               			}else
	               				$pass=$_REQUEST['pass'];

	               			include_once 'db.php';
	               			$sql= "select * from users where userid='{$uid}' and password = '{$pass}' ";
	               			$result = $conn->query($sql);
	               			if($result->num_rows == 1){
	               				while($row=$result->fetch_assoc()){
	               					echo $_SESSION['id']=$row['ID'];
	               					$_SESSION['uid']=$row['userid'];
	               					header("location:home.php");

	               				}
	               			}else
	               				echo "<script type='text/javascript'>alert('Password or UserId is wrong.')</script>";

	               		} 

	               		?>
	               		<p style="text-align: right;">For signUp <a href="signup.php">Click here</a></p>                
	        		</form>
				</div>
    		</div>
		</div>
  		<div class="col-md-4"></div>
	</div>
</div>


 <script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
</body>
</html>