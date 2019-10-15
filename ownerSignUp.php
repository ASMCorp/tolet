<?php
if(isset( $_POST['name'], $_POST['phone'], $_POST['username'], $_POST['password']  )){
	
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$username = $_POST['username'];
		$password = $_POST['password'];
}
else{
	print("Some input Fields are empty.");
}

require_once 'connection.php';
if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }
else{
	$login_table = "INSERT INTO `login`(`user_name`, `password`, `owner`, `login`) VALUES ('$username', '$password','1', '0')";
	$r = mysqli_query($con, $login_table);
	
	$owner_table = "INSERT INTO `owner`(`user_name`, `name`, `phone`) VALUES ('$username', '$name', '$phone')";
	$r = mysqli_query( $con, $owner_table );
}
header("Location: index.html");
?>