<?php
include_once 'db.php';
include_once 'user.php';
session_start();

$con = new DBConnector();
$pdo = $con->connectToDB();

//print_r($_POST);
if($_POST["action"] == "Order"){
	echo "This service is currently unavailable";
}

if($_POST["action"] == "Status"){
	echo "This service is currently unavailable";
}

if($_POST["action"] == "logout_action"){
	$user = new User();
	echo $user->logout($pdo);
}

?>
