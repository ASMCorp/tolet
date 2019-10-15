<?php
session_start();
$house_id = $_SESSION['house_id'];
require_once('connection.php');
if(isset( $_POST['hname'], $_POST['desc'], $_POST['floor'], $_POST['room'], $_POST['location'], $_POST['rent'], $_POST['date'] )){

	$hname = $_POST['hname'];
	$desc = $_POST['desc'];
	$floor = $_POST['floor'];
	$room = $_POST['room'];
	$location = $_POST['location'];
	$rent = $_POST['rent'];
	$date = $_POST['date'];
	
}
else{
	$hname = "N/A";
	$desc = "N/A";
	$floor = "0";
	$room = "0";
	$location = "N/A";
	$rent = "0";
	$date = "00-00-0000";
}

if(isset($_POST['lift']  )){
	
	
	$lift = $_POST['lift'];
}

else{
	
	$lift = "0";
	
}
if(isset($_POST['gurd']  )){
	
	
	$gurd = $_POST['gurd'];
}
else{
	
	$gurd = "0" ;
	
}
if(isset(  $_POST['parking']  )){
	
	
	$parking = $_POST['parking'];
}
else{
	
	$parking = "0";
	
}
if(isset( $_POST['camera'] )){
	
	
	$camera = $_POST['camera'];
}
else{
	
	$camera = "0";
	
}
if(isset( $_POST['family']  )){
	
	$family = $_POST['family'];
}
else{
	
	$family = "0";
}

$sql = "UPDATE `home` SET 
`house_name`='$hname',
`description`= '$desc',
`lift`='$lift',
`gurd`= '$gurd',
`parking`= '$parking',
`floor`= '$floor',
`num_of_room`= '$room',
`location`= '$location',
`rent`= '$rent',
`camera`= '$camera',
`family`= '$family' ,
`date`= '$date'
WHERE `house_id` = '$house_id'" ;

$result = mysqli_query($con, $sql);
$sql = "delect from home where date = '0000-00-00'";
$row = mysqli_query($con, $sql);
header("Location: owner.php");

?>