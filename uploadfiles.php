<?php
session_start();

$targetPat="";
$sourcePath="";
$size="";
$type="";
$mdfive="";
$shaone="";
$filename="";
$ext="";
$sql="";
$id= $_SESSION['id'];
include_once 'db.php';
//error_reporting(0);

if(!empty($_FILES)) {
	if(is_uploaded_file($_FILES['file']['tmp_name'])) {
		$sourcePath=$_FILES['file']['tmp_name'];
		$type=$_FILES['file']['type'];
		$size=$_FILES['file']['size'];
		$filename=$_FILES['file']['name'];
		$ext=substr( $filename,strlen($filename)-strpos(strrev($filename),".") );
		//$mdfive=explode(' ', exec("md5sum {$sourcePath}")) ;
		//$mdfive=$mdfive[0];
		$mdfive= md5_file($sourcePath);
		$targetPath = "uploadfiles/".$mdfive.".".$ext;
		
		$sql= "select * from upload where mdfive = '{$mdfive}' ";
		$result = $conn->query($sql);
		if(!($result->num_rows > 0) ){
			$shaone= sha1_file($sourcePath);
			//$shaone=explode(' ', exec("sha1sum {$sourcePath}")) ;
			//$shaone=$shaone[0] ;
			$sql= "INSERT INTO upload( uid, filename, filetype, filesize, mdfive, msha1) VALUES ( {$id},'{$filename}','{$type}','{$size}','{$mdfive}','{$shaone}' );";

			if(move_uploaded_file($sourcePath,$targetPath))
			{
				if($conn->query($sql) )
					echo "uploaded";
				else
					echo "error in insertion : ".$conn->error;
				$conn->close();	
			}else{
				echo "error in upload querry not updated.";
			}
		}
		else{
			
			$sql= "select * from upload where mdfive = '{$mdfive}' and uid = {$id} ";
			$result=$conn->query($sql);
			if($result->num_rows > 0){
				echo "<h1>same file already exist with same user </h1>";
				die();
			}

			$sql= "select * from upload where mdfive = '{$mdfive}' limit 1";
			$result=$conn->query($sql);
			if($result->num_rows > 0){
				while($row=$result->fetch_assoc()){
					$filename=$row['filename'];
					$type=$row['filetype'];
					$size=$row['filesize'];
					$mdfive=$row['mdfive'];
					$shaone=$row['msha1'];
				}

			$sql= "INSERT INTO upload( uid, filename, filetype, filesize, mdfive, msha1) VALUES ( {$id},'{$filename}','{$type}','{$size}','{$mdfive}','{$shaone}' );";
			if($conn->query($sql) ){
				echo "updated successfully redundant data ";
			}
			else
				echo "error in update redundant data";


			}

		}
	}
}

?>