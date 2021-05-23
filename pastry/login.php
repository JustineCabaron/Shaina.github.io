<?php
session_start();

	include("connection.php");
	include("functions.php");

	if ($_SERVER['REQUEST_METHOD'] == "POST") 
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) 
		{
			//read from database
			$query = "Select * from users where user_name = '$user_name' limit 1";

			$result = mysqli_query($con, $query);

			if ($result) 
			{
				if ($result && mysqli_num_rows($result) > 0) 
				{
					$user_data = mysqli_fetch_assoc($result);
					
					if ($user_data['password'] === $password) 
					{
						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: homepage.php");
						die;
					}
				}
			}
			echo "Incorrect Username or Password!";
		} 
		else
		{
			echo "Incorrect Username or Password!";
		}

	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
	<script language="javascript" type="text/javascript">
	window.history.forward();
	</script>
</head>
<body>
	<style type="text/css">
		body
		{
			background-image: url(img/sample.jpeg);
		}

		#text {
			height: 25px;
			border-radius: 5px;
			padding: 4px;
			border: solid thin #aaa;
			width: 100%;
		}

		#button {
			padding: 10px;
			width: 100px;
			color: white;
			background-color: lightblue;
			border: none;
		}

		#box {
			background-color: lightgreen;
			margin-top: 130px;
			margin-left: 500px;
			width: 300px;
			padding: 20px;
			text-align: center;

		}

		img 
		{
			height: 50px;
			float: center;
		}
	</style>

	<div id="box">
		<form method="POST">
			<img src="img/face1.png">
			<br>
			<div style="font-size: 20px; margin: 10px; color: black;">Log In</div>
			Username:<input id="text" type="text" name="user_name"><br><br>
			Password:<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" name="login"><br><br>
		</form>
		<br><br>
		<div class="back">
			<a href="intro.php">Go back to Introduction Page</a>
		</div>
	</div>
</body>
</html>