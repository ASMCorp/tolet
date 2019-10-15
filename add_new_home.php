<?php
session_start();
$username = $_SESSION['username'];
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
if(isset($_POST['submit'])){
	$filepath1 = "image/".$_FILES["img1"]["name"];
	$filepath2 = "image/".$_FILES["img2"]["name"];
	$filepath3 = "image/".$_FILES["img3"]["name"];
		move_uploaded_file($_FILES["img1"]["tmp_name"], $filepath1);
		move_uploaded_file($_FILES["img2"]["tmp_name"], $filepath2);
		move_uploaded_file($_FILES["img3"]["tmp_name"], $filepath3);
}
else{
	$filepath1= "";
	$filepath2 = "";
	$filepath3 = "";
}
$sql = "INSERT INTO `home`( `owner_username`, `house_name`, `description`, `lift`, `gurd`, `parking`, `floor`, `num_of_room`, `location`, `rent`, `camera`, `family`, `date`, `img1`, `img2`, `img3`) VALUES ( '$username', '$hname', '$desc', '$lift', '$gurd', '$parking', '$floor', '$room', '$location', '$rent', '$camera', '$family', '$date' ,'$filepath1', '$filepath2','$filepath3')" ;

$result = mysqli_query($con, $sql);

header("Location: owner.php");

?>
