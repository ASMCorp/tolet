<?php
session_start();
if(isset($_POST['username'], $_POST['password'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	require_once('connection.php');
if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }
else{
	$login_sql = "SELECT * FROM `login` WHERE `user_name`= '$username' AND `password` = '$password' ";
	$r = mysqli_query($con, $login_sql);
	if(mysqli_num_rows($r)){
		$sql= "UPDATE `login` SET `login`='1' ";
		$result = mysqli_query($con, $sql);
		$login_sql = "SELECT * FROM `login` WHERE `user_name`= '$username' AND `password` = '$password' ";
		$r = mysqli_query($con, $login_sql);
		
		$row= $r->fetch_array();
		$owner = $row['owner'];
		if($owner == '0'){
			$_SESSION['username'] = $username;
			header("Location: user.php");
			die();
		}
		else{
			$_SESSION['username'] = $username;
			header("Location: owner.php");
			die();
		}
		
	}
	else{
		print("Wrong username/password. Please recheck.");
		
	$add = "index.html";
	print("some input field are empty.");
	echo("<br>");
	echo("<button><a href='$add'>Go Back</a></button>");
	}
	
}
}



?>
