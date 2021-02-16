<?php
include_once 'db.php';
include_once 'user.php';

$con = new DBConnector();
$pdo = $con->connectToDB();

if(isset($_POST)){
	$user = new User();
	$user->setEmail($_POST["mail"]);
	$user->setPassword($_POST["curPas"]);
	if($_POST["newPas"] != $_POST["confirmPas"]){
		echo "Ensure your passwords match";
	}else{
		$user->setNewPassword($_POST["newPas"]);
		echo $user->changePassword($pdo);
	}
	unset($_POST);	
}

?>