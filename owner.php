<?php
session_start();
require_once 'connection.php';
$username = $_SESSION['username'];
$sql = "select * from login where user_name = '$username' ";
$result = mysqli_query($con, $sql);
$row = $result-> fetch_array();
$login = $row['login'];
if($login == '0'){
	header("Location: index.html");
}
$sql = "select * from owner where user_name = '$username'";
$result = mysqli_query($con, $sql);
$row = $result-> fetch_array();
$name = $row['name'];
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow&display=swap" rel="stylesheet">
	<link href="style/styleOwner.css" rel="stylesheet" type="text/css">
<title>Dashboard</title>
</head>

<body>
	<div class="header">
  	<h1 align="center">Welcome <?php echo($name); ?></h1>
	<h4 align="center">This is your dashboard. Here you can add your house and users will be able to see and seek to rent it. To add a house, fillup the form given below and press save.</h4>
	
</div>
		<div class="row">
  <div class="leftcolumn">
    <div class="card">
      <p><b>List of houses:</b></p>
	
	<table>
		<tr>
			<td><b>ID</b></td>
			<td><b>Name</b></td>
			<td><b>Description</b></td>
			<td><b>Floor</b></td>
			<td><b>Location</b></td>
			<td><b>Rent</b></td>
			<td><b>Date</b></td>
			<td><b>Edit/Update</b></td>
		</tr>
		
	<?php
		$sql = "select * from home where owner_username = '$username'";
		$result = mysqli_query($con,$sql);
		
		while($row= $result->fetch_array()){
			echo("<tr>");
            echo "<td>{$row['house_id']}</td>";
            echo "<td>{$row['house_name']}</td>";
            echo "<td>{$row['description']}</td>";
			echo "<td>{$row['floor']}</td>";
			echo "<td>{$row['location']}</td>";
			echo "<td>{$row['rent']}</td>";
			echo "<td>{$row['date']}</td>";
			echo "<td><a  href='edit_home.php?house_id={$row['house_id']}'>EDIT</a></td>";
                  
			
			echo("</tr>");
			
		}
		$sql = "delect from home where date = '0000-00-00'";
$row = mysqli_query($con, $sql);
		?>
	</table>

    </div>
	 
   
  </div>
  <div class="rightcolumn">
    <div class="card">
		<p><b>Add a house:</b></p>
      <form action="add_new_home.php" method="post" enctype="multipart/form-data">
		House Name
		<br>
		<input type="text" name="hname" required>
		<br>
		Description
		<br>
		<input type="text" name="desc" required>
		<br>
		Floor
		<br>
		<input type="int" name="floor" required>
		<br>
		Number of Room(s)
		<br>
		<input type="int" name="room" required>
		<br>
		Location
		<br>
		<input type="text" name="location" required>
		<br>
		Rent
		<br>
		<input type="text" name="rent" required>
		<br>
		Date
		<br>
		<input type="date" name="date" required>
		<br>
		Input 3 Images:
		<br>
		<input type="file" name="img1" id="img1" required>
		<br>
		<input type="file" name="img2" id="img2" required>
		<br>
		<input type="file" name="img3" id="img3" required>
		<br>
		Extra Features
		<br>
		<input type="checkbox" name="lift" value="1">Lift 
		<input type="checkbox" name="gurd" value="1">Guard 
		<input type="checkbox" name="parking" value="1">Parking 
		<input type="checkbox" name="camera" value="1">CC Camera 
		<input type="checkbox" name="family" value="1">Family 		
		<br>
		<input type="submit" name="submit" id="submit" value="Save">
	</form>
    </div>
  </div>
</div>
	
	
	
	
	<button class="logout"> <a href="logout.php?">Log Out</a> </button>
</body>
	
</html>




