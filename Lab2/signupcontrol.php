<?php
include_once 'db.php';
include_once 'user.php';

//Database handle pdo
$con = new DBConnector();

$pdo = $con->connectToDB();

//

if(!empty($_POST)){
	$user = new User();
	$user->setEmail($_POST['email']);
	$user ->setPassword($_POST['password']);
	$user->setName($_POST['name']);
	$user->setCity($_POST['city']);

	$original_file_name = $_FILES["profile"]["name"];
	$file_tmp_location = $_FILES["profile"]["tmp_name"];
	$file_path = "Pics/";
	if (move_uploaded_file($file_tmp_location, $file_path.$original_file_name))
	{
		$newPath = $file_path.$original_file_name;
		$user->setProfilePhoto($newPath);	

	}

	unset($_POST);

}

?>