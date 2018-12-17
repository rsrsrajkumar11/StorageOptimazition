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

					<form role="form" action="signprocess.php"   method="post">
						<div class="form-group">
							<label for="email" autocomplete="off" >First Name:</label>
							<input type="text" class="form-control" name="fname"  style="text-transform: uppercase;" required>
						</div>
						<div class="form-group">
							 <label for="pwd" autocomplete="off" >Last Name:</label>
							 <input type="text" class="form-control" name="lname" required >
						</div>

						<div class="form-group">
							 <label for="pwd" autocomplete="off" >User Id:</label>
							 <input type="text" class="form-control" name="uid" required >
						</div>

						<div class="form-group">
							 <label for="pwd" autocomplete="off" >Password:</label>
							 <input type="text" class="form-control" name="pass"  required >
						</div>

						<div class="form-group">
							 <label for="pwd"  >Contact:</label>
							 <input type="text"  autocomplete="off" class="form-control" name="contact"  required >
						</div>

						<center>
							<button type="submit" name="smt" class="btn btn-primary">Submit</button>
	          			</center>
	               		 <br> 

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