<?php
require_once 'connection.php';
if(isset($_GET['house_id'])){
	$house_id = $_GET['house_id'];
}
else{
	
	header("Location: user.php");
	
}
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
	$sql = "select * from home where house_id = '$house_id'";
				$result = mysqli_query($con,$sql);
				$row= $result->fetch_array();
				$img1 = $row['img1'];
$sql = "select * from home where house_id = '$house_id'";
				$result = mysqli_query($con,$sql);
				$row= $result->fetch_array();
				$img2 = $row['img2'];
$sql = "select * from home where house_id = '$house_id'";
				$result = mysqli_query($con,$sql);
				$row= $result->fetch_array();
				$img3 = $row['img3'];



?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow&display=swap" rel="stylesheet">
	<link href="style/style.css" rel="stylesheet" type="text/css">
<title><?php echo($h_name);?></title>
</head>

<body>
	<h1 align="center">
	<img src="<?php echo("$img1");?>" height=200 width=300 alt="">
	<img src="<?php echo("$img2");?>" height=200 width=300 alt="">
	<img src="<?php echo("$img3");?>" height=200 width=300 alt="">
	</h1>
	
	<h1 align="center"> <?php echo($h_name)?></h1>
	<b>House ID:</b>
	<br>
	<?php echo($house_id);?>
	<br>
	<b>Owner:</b>
	<br>
	<?php $sql = "select owner_username from home where house_id = '$house_id'";
				$result = mysqli_query($con,$sql);
				$row= $result->fetch_array();
				$owner_username = $row['owner_username'];
	$sql = "select name from owner where user_name = '$owner_username'";
	$result = mysqli_query($con, $sql);
	$row= $result->fetch_array();
	$name = $row['name'];
	echo($name);
	?>
	<br>
	<b>Description:</b>
	<br>
	<?php
	echo($desc)?>
	<br>
	<b>Floor:</b>
	<br>
	<?php echo($floor)	?>
	<br>
	<b>Number of rooms:</b>
	<br>
	<?php echo($room)?>
	<br>
	<b>Rent:</b>
	<br>
	<?php echo($rent)?>
	<br>
	<b>Extra Features:</b>
	<?php 
		$sql = "select * from home where house_id = '$house_id'";
				$result = mysqli_query($con,$sql);
				$row= $result->fetch_array();
				$gurd = $row['gurd'];
				$lift = $row['lift'];
				$parking = $row['parking'];
				$camera = $row['camera'];
				$family = $row['family'];
	
	
	?>
	
	<ul>
		
		<?php if($gurd == '1'){echo("<li>Security Guard</li>");}?>
		<?php if($lift == '1'){echo("<li>Lift</li>");}?>
		<?php if($parking == '1'){echo("<li>Parking</li>");}?>
		<?php if($camera == '1'){echo("<li>CC Camera</li>");}?>
		<?php if($family == '1'){echo("<li>Family Only</li>");}?>
	</ul>
	
	<br>
	Contact:
	<br>
	<?php
	$sql = "select * from owner where user_name = '$owner_username'";
	$result = mysqli_query($con,$sql);
				$row= $result->fetch_array();
				$contact = $row['phone'];
				echo($contact);
	?>
	<br>
	<br>
	<button> <a href="user.php">Go Back</a> </button>
</body>
</html>