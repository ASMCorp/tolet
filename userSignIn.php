<?php
//require_once "connection.php";

if(isset($_POST['name'], $_POST['age'], $_POST['gender'],$_POST['phone'], $_POST['profession'],  $_POST['marital_status'], $_POST['username'], $_POST['password'], $_POST['institution'], $_POST['kid'])){
    	
		$name = $_POST['name'];
		$age = $_POST['age'];
		$gender = $_POST['gender'];
		$phone = $_POST['phone'];
		$profession = $_POST['profession'];
		$marital_status = $_POST['marital_status'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$institution = $_POST['institution'];
		$kid = $_POST['kid'];
 } 
		
else{
	print("some input field are empty");
}
	
require_once 'connection.php';
if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }
else{
	
	$login_table = "INSERT INTO `login`(`user_name`, `password`, `owner`, `login`) VALUES ('$username', '$password','0', '0')";
	$r = mysqli_query($con, $login_table);
	$user_table ="INSERT INTO `user`(`user_name`, `name`, `phone`, `profession`, `institution`, `age`, `gender`, `marital_status`, `kids`) VALUES ('$username','$name','$phone','$profession','$institution','$age','$gender','$marital_status','$kid')";
	$r = mysqli_query($con, $user_table);
	
}
	
header("Location: index.html");
	
	
?>