<?php
include_once 'db.php';
include_once 'user.php';
session_start();

$con = new DBConnector();
$pdo = $con-> connectToDB();

//print_r($_POST);

function alert($message){
	echo "<script>alert($message);</script>";
}

if(!empty($_POST)){
	$user = new User();
	$user->setEmail($_POST["email"]);
	$user->setPassword($_POST["password"]);
	$message = $user->login($pdo);
	//echo $message;
	$_SESSION["user_email"] = $_POST["email"];
	unset($_POST);
}

?>