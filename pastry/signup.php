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
			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) 
			values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		} 
		else
		{
			echo "Please enter some valid information!";
		}

	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
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
			<div style="font-size: 20px; margin: 10px; color: white;">Sign Up</div>
			Username:<input id="text" type="text" name="user_name"><br><br>
			Password:<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" name="signup"><br><br>

			<a href="login.php">Click to Log in</a>
		</form>
		<br><br>
		<div class="back">
			<a href="intro.php">Go back to Introduction Page</a>
		</div>
	</div>
</body>
</html>