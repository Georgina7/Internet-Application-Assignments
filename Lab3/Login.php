<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$("form").submit(function(event){
				event.preventDefault();
				var email = $("input[name='email']").val();
				var password = $("input[name='password']").val();
				$.post("logincontrol.php", {
					email: email,
					password: password},
					function(data, status){
						$("#Alert").html(data);
				});
				
			});
		});
	</script>
</head>
<body>
			
		<center>
			<div class="login">
				<div class="prompt">
					<h2>Welcome to Happy Designs</h2>
					<p>Start your journey with us today<br> and enjoy a refreshing take<br> on latest designs in<br> the market</p>
					<a href="Signup.php">Sign Up</a>
				</div>
				<div class="logindets">
					<form action = "logincontrol.php" method = "post">
						<fieldset>
							<h2>Login</h2>
							<input type="Email" name="email" placeholder="Email" required>
							<br><br>
							<input type="password" name="password" placeholder="Password" required>
							<br><br>
							<button type ="submit">Login</button>
							<p id="Alert"></p>
							<p><a href="Passreset.php">Click here</a> for password reset<p>
						</fieldset>
					</form>
				</div>
				
			</div>
			
		</center>

</body>
</html>

