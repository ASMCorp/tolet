<?php
session_start();
require_once "connection.php";
if(isset($_GET["house_id"])){
	$house_id = $_GET['house_id'];
}
else{
	$house_id ="no id";
	echo("$house_id found");
	header("Location: owner.php");
}
$_SESSION['house_id'] = $house_id;
$sql = "select house_name from home where house_id = '$house_id'";
				$result = mysqli_query($con,$sql);
				$row= $result->fetch_array();
				$h_name = $row['house_name'];
				
$sql = "select description from home where house_id = '$house_id'";
				$result = mysqli_query($con,$sql);
				$row= $result->fetch_array();
				$desc = $row['description'];
				

$sql = "select floor from home where house_id = '$house_id'";
				$result = mysqli_query($con,$sql);
				$row= $result->fetch_array();
				$floor = $row['floor'];
				
$sql = "select num_of_room from home where house_id = '$house_id'";
				$result = mysqli_query($con,$sql);
				$row= $result->fetch_array();
				$room = $row['num_of_room'];
				

$sql = "select location from home where house_id = '$house_id'";
				$result = mysqli_query($con,$sql);
				$row= $result->fetch_array();
				$loc = $row['location'];
				

$sql = "select rent from home where house_id = '$house_id'";
				$result = mysqli_query($con,$sql);
				$row= $result->fetch_array();
				$rent = $row['rent'];
				

$sql = "select date from home where house_id = '$house_id'";
				$result = mysqli_query($con,$sql);
				$row= $result->fetch_array();
				$date = $row['date'];
				

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow&display=swap" rel="stylesheet">
	<link href="style/styleOwner.css" rel="stylesheet" type="text/css">
<title>Untitled Document</title>
</head>
<form action="update_home.php" method="post">
		House Name
		<br>
		<input type="text" name="hname" value="<?php
											   echo($h_name);
											   ?>" required>
		<br>
		Description
		<br>
		<input type="text" name="desc"  value="<?php
											   echo($desc);
											   ?>" required>
		<br>
		Floor
		<br>
		<input type="int" name="floor" value="<?php
											   echo($floor);
											   ?>" required>
		<br>
		Number of Room(s)
		<br>
		<input type="int" name="room" value="<?php
											   echo($room);
											   ?>" required>
		<br>
		Location
		<br>
		<input type="text" name="location" 
			   value="<?php
											   echo($loc);
											   ?>"required>
		<br>
		Rent
		<br>
		<input type="text" name="rent" 
			   value="<?php
											   echo($rent);
											   ?>" required>
		<br>
		Date
		<br>
		<input type="date" name="date" value="<?php
											   echo($date);
											   ?>" required>
		<br>
		Extra Features
		<br>
		<input type="checkbox" name="lift" value="1">Lift 
		<input type="checkbox" name="gurd" value="1">Guard 
		<input type="checkbox" name="parking" value="1">Parking 
		<input type="checkbox" name="camera" value="1">CC Camera 
		<input type="checkbox" name="family" value="1">Family 		
		<br>
		<input type="submit" value="Save">
	</form>
<body>
</body>
</html>