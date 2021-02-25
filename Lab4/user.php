<?php
include_once 'Account.php';

class User implements Account{
	protected $name;
	protected $email;
	protected $password;
	protected $newPassword;
	protected $city;
	protected $profile_photo;


	function __construct(){}

	public function getName(){
		return $this->name;
	}

	public function setName($new_name){
		$this->name = $new_name;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($new_email){
		$this->email = $new_email;
	}

	public function getPassword(){
		return $this->password;
	}

	public function setPassword($new_password){
		$this->password = $new_password;
	}

	public function getNewPassword(){
		return $this->newPassword;
	}

	public function setNewPassword($new_password){
		$this->newPassword = $new_password;
	}

	public function getCity(){
		return $this->city;
	}

	public function setCity($new_city){
		$this->city = $new_city;
	}

	public function getProfilePhoto(){
		return $this->profile_photo;
	}

	public function setProfilePhoto($new_profile_photo){
		$this->profile_photo = $new_profile_photo;
	}

	public function register($pdo){
		$passwordHash = password_hash($this->getPassword(), PASSWORD_DEFAULT);
		try{
			$sql = 'SELECT Email FROM user WHERE Email = ?';
			$stmt = $pdo->prepare($sql);		
			$stmt->execute([$this->getEmail()]);
			$row = $stmt->fetch();
			if($row != null){
				return "This email is already in use";
			}else{
				$sql = 'INSERT INTO user (Full_Name, Email, Password, City, Profile_Photo_Path) VALUES (?,?,?,?,?)';
				$stmt = $pdo->prepare($sql);
				$stmt->execute([$this->getName(), $this->getEmail(), $passwordHash, $this->getCity(), $this->getProfilePhoto()]);
				return "<script>alert('Registration was Successful');window.location.href = 'Login.php'</script>";
			}
			
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}

	public function login($pdo){
		try{
			$sql = 'SELECT Password FROM user WHERE Email = ?';
			$stmt = $pdo->prepare($sql);		
			$stmt->execute([$this->getEmail()]);
			$row = $stmt->fetch();
			if($row == null){
				//echo "<script>alert('This account does not exist');window.location.href = 'Login.php'</script>";
				return "This account does not exist";
			}
			if(password_verify($this->getPassword(), $row['Password'])){
				return "<script>window.location.href = 'Landing.php'</script>";
				//header("Location:Landing.php");
			}
			//echo "<script>alert('Your username or password is incorrect');window.location.href = 'Login.php'</script>";
			return "Your username or password is incorrect";
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}

	public function changePassword($pdo){
		try{
			$sql = 'SELECT Password FROM user WHERE Email = ?';
			$stmt = $pdo->prepare($sql);		
			$stmt->execute([$this->getEmail()]);
			$row = $stmt->fetch();
			if($row == null){
				return "This account does not exist";
			}
			$passwordHash = password_hash($this->getNewPassword(), PASSWORD_DEFAULT);
			if(password_verify($this->getPassword(), $row['Password'])){
				$stmt = $pdo->prepare('UPDATE User SET Password = ? WHERE Email = ?');
				$stmt -> execute([$passwordHash, $this->getEmail()]);
				return "<script>alert('Password Update Successful');window.location.href = 'Login.php'</script>";
			}else
			{
				return "Your username or password is incorrect";
			}

		}catch(PDOException $e){
			return $e->getMessage();
		}

	}

	public function logout($pdo){
		unset($_SESSION);
		$pdo = null;
		return "Login.php";
		// header("Location:Login.php");
	}
}

?>