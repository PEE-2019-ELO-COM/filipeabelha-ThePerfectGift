<?php
include("sessionstart.php");
include("dbconnect.php"); // Connect to database. Result is $con

// We don't have the password or e-mail info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT password, email, activation_code FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email, $activation_code);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Users - The Perfect Gift</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

a, a:visited, a:hover, a:focus, a:active { text-decoration: none; color: black; }
</style>
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
			<h2>Users</h2>
			<div align="center">
				<p>Look who is connected too!</p>
<br></br>
				<table>
<tr>
<th> Name </th>
<th> Username </th>
</tr>

<?php
$stmt = $con->prepare('SELECT * FROM accounts ORDER BY firstname ASC, lastname ASC');
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
	echo '<tr>';
	echo '<td>';
	echo '<a href="profile.php?id='.$row['id'].'">';
	echo $row['firstname'].' '.$row['lastname'];
	echo '</a></td><td>'.$row['username'].'</td>';
	echo '</tr>';
}
?>
				</table>
			</div>
		</div>
	</body>
</html>
