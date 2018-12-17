<?php
session_start();

if (isset($_REQUEST['fname'])) {
	$fname=$_REQUEST['fname'];
}else
	$fname="";

if (isset($_REQUEST['lname'])) {
	$lname=$_REQUEST['lname'];
}else
	$lname="";

if (isset($_REQUEST['uid'])) {
	$uid=$_REQUEST['uid'];
}else
	$uid="";

if (isset($_REQUEST['pass'])) {
	$pass=$_REQUEST['pass'];
}else
	$pass="";

if (isset($_REQUEST['contact'])) {
	$contact=$_REQUEST['contact'];
}else
	$contact="";

include_once("db.php");
$sql = "insert into users ( `LastName`, `FirstName`, `contact`, `userid`, `password`) values (  '{$lname}' , '{$fname}' , '{$contact}' , '{$uid}' , '{$pass}' )";

if(mysqli_query($conn,$sql)){
	echo "<h1>User created successfully.</h1>";
}else{
	echo "<h1>Error in creating user.</h1>";
}


?>