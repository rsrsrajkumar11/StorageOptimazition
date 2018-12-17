<?php 
session_start();

$fname="";
$lname="";
$uid="";
$id="";
include_once 'db.php';


if(! isset($_SESSION['id']) and ! isset($_SESSION['uid'])){
	header("location:index.php");
	die();
}else{
	$id = $_SESSION['id'];
	$sql= "select * from users where id = {$id} ";
	$result = $conn->query($sql);
	if($result->num_rows == 1){
		while($row=$result->fetch_assoc()){
			$lname=$row['LastName'];
			$fname=$row['FirstName'];
			$uid=$row['userid'];
		}
	}
}

if(isset($_GET['logout'])){
	if ($_GET['logout']=='1') {
	session_unset();
	session_destroy();
	header("location:index.php");
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome <?php echo "{$fname} {$lname}. "; ?></title>
	<style type="text/css">
		nav{
			background-color: black;
		}
	</style>


	
</head>
<body>
<nav class="navbar default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php">
        <img alt="Brand" src="uploadfiles/logo.png" height="30px;" width="100px;" >
      </a>
      <a href="">Welcome <?php echo "{$fname} {$lname}. "; ?></a>
      
     
    </div>
    <ul >
    	<li style="display: inline;"><a href="#" data-target="#fileupladmodel"  data-toggle="modal" >Upload</a></li>
    	<li style="display: inline;"> <a href="home.php?logout=1"  >Log out</a></li>
    </ul>
  </div>
</nav>

<div class="content">
<table class="table">
	<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">File Name</th>
			<th scope="col">Type</th>
			<th scope="col">Size</th>
			<th scope="col">Download</th>
			<th scope="col">Delete</th>
		</tr>
	</thead>
		<?php 
		$sql = "select * from upload where uid = {$id} ; ";
		$result =$conn->query($sql);
		$i=0;
		if($result->num_rows > 0){
   				while($row=$result->fetch_assoc()){
   					$filename=$row['filename'];
   					$i=$i+1;
   					$ext=substr( $filename,strlen($filename)-strpos(strrev($filename),".") );
   					echo "<tr>
							<td scope='col'>{$i}</thd>
							<td scope='col'>{$row['filename']}</thd>
							<td scope='col'>{$row['filetype']}</td>
							<td scope='col'>{$row['filesize']}</td>
							<td scope='col'><a href='uploadfiles/{$row['mdfive']}.{$ext}' >Download </a></td>
							<td scope='col'><a href=\"delfile.php?fileuid={$row['id']}&filehas={$row['mdfive']}\" >Delete </a></td>
						</tr>";
   					}
   			}else{
   				echo "<tr class='danger'><td colspan='6'>No data Found.<td></tr>";
   			}
		?>
	</table>
<tbody>

</div>



<!-- Modal start -->
<div id="fileupladmodel" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">File Upload</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
	    <form action="uploadfiles.php" method="post" id="frm" enctype="multipart/form-data" >  
	      <div class="modal-body">
	        <input type="file" name="file" >
	        
	      </div>
	      <div class="modal-footer">
	        <button type="submit" name="submit" class="btn btn-default" >Submit File</button>
	      </div>
	    </form>
    </div>
  </div>
</div>
<!-- Modal start -->
 <script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
</body>
</html>

