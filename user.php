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
$sql = "select * from user where user_name = '$username'";
$result = mysqli_query($con, $sql);
$row = $result-> fetch_array();
$name = $row['name'];

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow&display=swap" rel="stylesheet">
	<link href="style/styleUser.css" rel="stylesheet" type="text/css">
<title>Dashboard</title>
</head>
	
	<div class="header">
		<h1 align="center">Welcome <?php echo($name);?></h1>
	<h4 align="center">Looking for your desired house to rent. Look no further. Check out the list below and contact the owner. Use the search function if you are looking for something specific.</h4>
	
</div>

	
	<div class="row">
  <div class="leftcolumn">
    <div class="card">
      <form action="user.php" method="post">
	Sort by:
		<select name="sort">
		<option value="rent">Rent</option>
		<option value="date">Date</option>
		<option value="room">Room</option>
		</select>
		<input type="submit" value="Sort">
	</form>
		<p><b>List of houses:</b></p>
	
	<table>
		<tr>
			
			<td><b>Name</b></td>
			<td><b>Room(s)</b></td>
			<td><b>Floor</b></td>
			<td><b>Location</b></td>
			<td><b>Rent</b></td>
			<td><b>Date</b></td>
			<td><b>Details</b></td>
		</tr>
		
	<?php
		
		if(isset($_POST['sort'])){
			$sort = $_POST['sort'];
			
			if($sort == 'rent'){
				$sql = "SELECT * FROM `home` ORDER BY rent ASC";
			}
			else if($sort == 'date'){
				$sql = "SELECT * FROM `home` ORDER BY date ASC";
			}
			else if($sort == 'room'){
				$sql = "SELECT * FROM `home` ORDER BY num_of_room ASC";
			}
			else{
				$sql = "select * from home";
			}
			
		}
		else{
			$sql = "select * from home";
		}
		
		$result = mysqli_query($con,$sql);
		
		while($row= $result->fetch_array()){
			echo("<tr>");
            
            echo "<td>{$row['house_name']}</td>";
            echo "<td>{$row['num_of_room']}</td>";
			echo "<td>{$row['floor']}</td>";
			echo "<td>{$row['location']}</td>";
			echo "<td>{$row['rent']}</td>";
			echo "<td>{$row['date']}</td>";
			echo "<td><a href='view.php?house_id={$row['house_id']}'>Contact</a></td>";
                  
			
			echo("</tr>");
			
		}
		?>
	</table>
		
    </div>
  </div>
	</div>
	
	
	
	<button class="logout"> <a href="logout.php?">Log Out</a> </button>

<body>
</body>
</html>