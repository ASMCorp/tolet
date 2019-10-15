<?php
session_start();
require_once "connection.php";
$username =$_SESSION['username'];
	
$sql = "update login set login = '0' where user_name = '$username'";
$res = mysqli_query($con, $sql);

$sql = "select * from login where user_name = '$username'";
				$result = mysqli_query($con,$sql);
				$row= $result->fetch_array();
				$owner = $row['owner'];
if($owner == '0'){
	header("Location: user.php");
}
else{
	header("Location: owner.php");
}

?>