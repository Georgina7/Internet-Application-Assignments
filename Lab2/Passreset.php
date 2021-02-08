<!DOCTYPE html>
<html>
<head>
	<title>Password Reset</title>
	<link rel="stylesheet" type="text/css" href="styles2.css">
</head>
<body>
	<center>
		<div class="pasreset">
			<h2>Password Reset</h2>
			<form action="passresetcontrol.php" method="post">
				<fieldset>
					<input type="Email" name="mail" placeholder="Enter Email Address">
					<br><br>
					<input type="password" name="curPas" placeholder="Enter Current Password">
					<br><br>
					<input type="password" id="newPass" name="newPas" placeholder="Enter New Password">
					<br><br>
					<input type="password" id="confirmPass" name="confirmPas" placeholder="Confirm New Password">
					<br><br>
					<script type="text/javascript">
						function validate(){
							var pass = document.getElementById("newPass").value;
							var confirmpass = document.getElementById("confirmPass").value;
							if(pass != confirmpass){
								alert("Ensure passwords match");
								return false;
							}
							return true;
						}

					</script>
					<button type="submit" onclick="return validate()">Submit</button>					
				</fieldset>
			</form>
			<button onclick="window.location.href = 'Login.php'">Back</button>
		</div>
	</center>

</body>
</html>

