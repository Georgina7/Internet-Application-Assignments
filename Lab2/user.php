<?php
interface Account{
	public function register($pdo);
	public function login($pdo);
	public function changePassword($pdo);
	public function logout($pdo);
}

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

			$sql = 'INSERT INTO user (Full_Name, Email, Password, City, Profile_Photo_Path) VALUES (?,?,?,?,?)';
			$stmt = $pdo->prepare($sql);
			$stmt->execute([$this->getName(), $this->getEmail(), $passwordHash, $this->getCity(), $this->getProfilePhoto()]);
			echo "<script>alert('Registration was Successful');window.location.href = 'Login.php'</script>";
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function login($pdo){
		try{
			$sql = 'SELECT Password FROM user WHERE Email = ?';
			$stmt = $pdo->prepare($sql);		
			$stmt->execute([$this->getEmail()]);
			$row = $stmt->fetch();
			if($row == null){
				echo "<script>alert('This account does not exist');window.location.href = 'Login.php'</script>";
			}
			if(password_verify($this->getPassword(), $row['Password'])){
				header("Location:Landing.php");
			}
			echo "<script>alert('Your username or password is incorrect');window.location.href = 'Login.php'</script>";
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
				echo "<script>alert('This account does not exist')</script>";
			}
			$passwordHash = password_hash($this->getNewPassword(), PASSWORD_DEFAULT);
			if(password_verify($this->getPassword(), $row['Password'])){
				$stmt = $pdo->prepare('UPDATE User SET Password = ? WHERE Email = ?');
				$stmt -> execute([$passwordHash, $this->getEmail()]);
				echo "<script>alert('Password Update Successful');window.location.href = 'Login.php'</script>";
			}else
			{
				echo "<script>alert('Your username or password is incorrect');window.location.href = 'Passreset.php'</script>";
			}

		}catch(PDOException $e){
			return $e->getMessage();
		}

	}

	public function logout($pdo){
		unset($_SESSION);
		$pdo = null;
		header("Location:Login.php");
	}
}

?>