<?php
include_once 'db.php';
include_once 'user.php';

//Database handle pdo
$con = new DBConnector();

$pdo = $con->connectToDB();


if(isset($_POST)){
	$original_file_name = $_FILES["profile"]["name"];
	if($original_file_name == ""){
		echo "Ensure you select a photo";
	}else{
		$file_tmp_location = $_FILES["profile"]["tmp_name"];
		$file_path = "Pics/";
		if (move_uploaded_file($file_tmp_location, $file_path.$original_file_name))
		{
			$newPath = $file_path.$original_file_name;
			$user = new User();
			$user->setEmail($_POST['email']);
			$user ->setPassword($_POST['password']);
			$user->setName($_POST['name']);
			$user->setCity($_POST['city']);
			$user->setProfilePhoto($newPath);
			echo $user->register($pdo);	

		}
	}

	unset($_POST);

}

?>