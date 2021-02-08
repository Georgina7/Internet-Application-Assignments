<?php
include_once 'db.php';
include_once 'user.php';

$con = new DBConnector();
$pdo = $con->connectToDB();

if(!empty($_POST)){
	$user = new User();
	$user->setEmail($_POST["mail"]);
	$user->setPassword($_POST["curPas"]);
	$user->setNewPassword($_POST["newPas"]);
	$user->changePassword($pdo);
	unset($_POST);	
}

?>