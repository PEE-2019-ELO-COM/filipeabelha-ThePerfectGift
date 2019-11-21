<?php
include("sessionstart.php");

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home - The Perfect Gift</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>The Perfect Gift</h1>
				<a href="home.php"><i class="fas fa-home"></i>Home</a>
				<a href="users.php"><i class="fas fa-users"></i>Users</a>
				<a href="myprofile.php"><i class="fas fa-user-circle"></i>My Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Home</h2>
			<p>Welcome back, <?=$_SESSION['name']?>!</p>
		</div>
	</body>
</html>
