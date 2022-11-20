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

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
			'<script>
			alert("stop");
			</script>';
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="design.css">
</head>
<body>	
	<div class="container">
		<form method="post" class="box">
			<div class="login-text">Login</div>
			<div class="login-box">
			<input id="text" class="Name" type="text" name="user_name" placeholder="  userName"><br><br>
			<input id="text" class="Password" type="password" name="password" placeholder="  password"><br><br>
		
			<input id="button" class="btn" type="submit" value="Login"><br><br>

			<a href="signup.php" class="clk">Click to Signup</a><br><br>
		</div>
		</form>
	</div>
</body>
</html>