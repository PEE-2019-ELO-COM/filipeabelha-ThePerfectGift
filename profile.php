<?php
include("sessionstart.php");
include("dbconnect.php"); // Connect to database. Result is $con

// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT username, password, email, activation_code, firstname, lastname FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_GET['id']);
$stmt->execute();
$stmt->bind_result($username, $password, $email, $activation_code, $firstname, $lastname);
$stmt->fetch();
$stmt->close();
if ($activation_code == "activated") {
	$activation_code = "confirmed";
} else {
	$activation_code = "unconfirmed";
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?=$firstname?> <?=$lastname?> - The Perfect Gift</title>
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
		<h2><?=$firstname?> <?=$lastname?>'s profile</h2>
			<div>
				<table>
					<tr>
						<td>Name:</td>
						<td><?=$firstname?> <?=$lastname?></td>
					</tr>
					<tr>
						<td>Username:</td>
						<td><?=$username?></td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>
