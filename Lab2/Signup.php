<!DOCTYPE html>
<html>
<head>
	<title>Signup Page</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
			
		<center>
			<div class="login">
				<div class="prompt">
					<h2>Welcome to Happy Designs</h2>
					<p>Start your journey with us today<br> and enjoy a refreshing take<br> on latest designs in<br> the market</p>
					<a href="Login.php">Login</a>
				</div>
				<div class="signupdets">
					<form action="signupcontrol.php" method="post" enctype = "multipart/form-data">
						<fieldset>
							<h2>Sign Up</h2>
							<input type="text" name="name" placeholder="Full Name" required>
							<br><br>
							<input type="Email" name="email" placeholder="Email" required>
							<br><br>
							<input type="text" name="city" placeholder="City Of Residence" required>
							<br><br>							
							<input id ="pass" type="password" name="password" placeholder="Password" minlength="8" required>
							<br><br>
							<input id ="confirmpass" type="password" name="confirmpassword" placeholder="Confirm Password" minlength="8" required>
							<script type="text/javascript">
								function validate(){
									var pass = document.getElementById("pass").value;
									var confirmpass = document.getElementById("confirmpass").value;
									if(pass != confirmpass){
										alert("Ensure passwords match");
										return false;
									}
									return true;
								}

							</script>
							<br><br>
							<div class="file-input">
							<label for="pp">Select Profile Photo</label>
							<input type="file" name="profile" id="pp" class="file" required>
							</div>
							<br><br>
							<button type="submit" onclick="return validate()">Sign Up</button>
						</fieldset>
					</form>
				</div>
				
			</div>
			
		</center>
	

</body>
</html>

