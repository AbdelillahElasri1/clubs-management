<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<link rel="stylesheet" href="design.css">
</head>
<body>
	<div class="container">
		<form method="post" class="box">
			<div class="login-text">Signup</div>

			<input id="text" class="Name" type="text" name="user_name" placeholder="  userName"><br><br>
			<input id="text" class="Password" type="password" name="password" placeholder="  password"><br><br>

			<input id="button" class="btn" type="submit" value="Signup"><br><br>

			<a href="login.php" class="clk">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>