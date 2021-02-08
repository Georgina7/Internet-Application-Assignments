<?php
include_once 'db.php';
include_once 'user.php';
session_start();

$con = new DBConnector();
$pdo = $con->connectToDB();

if(!empty($_POST))
{
	$user = new User();
	$user->logout($pdo);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Landing Page</title>
	<link rel="stylesheet" type="text/css" href="styles2.css">
</head>
<body>
	<center>
		<div class="profpic">
			<h1>Grant Beck</h1>
			<img src="Pics/man.jpg">
			<br><br>
			<form action="Landing.php" method="post">
				<input type="text" name="logout" hidden>
				<button type="submit">Logout</button>
			</form>			
		</div>
	</center>
</body>
</html>