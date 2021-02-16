<?php
include_once 'db.php';
include_once 'user.php';
session_start();

$con = new DBConnector();
$pdo = $con->connectToDB();

// print_r($_POST);
if(isset($_POST["Status"])){
	echo "statoooooo";
}

if(isset($_POST["Order"])){
	echo "Ordereeeee";
}

// if(!empty($_POST))
// {
// 	$user = new User();
// 	$user->logout($pdo);
// }

?>
