<?php
session_start();
$id=$_SESSION['id'];
$fid="";
$mdfive="";
include_once 'db.php';

if (isset($_REQUEST['fileuid']) && isset($_REQUEST['filehas'])) {
	$fid=$_REQUEST['fileuid'];
	$mdfive=$_REQUEST['filehas'];
	$sql = "select * from upload where mdfive= '{$mdfive}'  ";
	$result=$conn->query($sql);
	if($result->num_rows ==0) die();
	
	if($result->num_rows == 1)
	{
		$sql = "delete from upload where uid = {$id} and mdfive= '{$mdfive}' and id={$fid} ";
		if($conn->query($sql)){
			echo "file deleted successfully";
		}else{
			echo "some proble during file delition";
		}

		$row=$result->fetch_assoc();
		$ext=substr($row['filename'],strlen($row['filename'])-strpos(strrev($row['filename']),".") );
		$sds="rm /opt/lampp/htdocs/cloud/uploadfiles/{$mdfive}.{$ext}";
		$sds=exec($sds);

	}else if($result->num_rows > 1){
		$sql = "delete from upload where uid = {$id} and mdfive= '{$mdfive}' and id={$fid} ";
		if($conn->query($sql)){
			echo "dublicate file deleted successfully";
		}else{
			echo "some proble during file delition";
		}
	}
}
?>