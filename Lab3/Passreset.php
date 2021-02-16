<!DOCTYPE html>
<html>
<head>
	<title>Password Reset</title>
	<link rel="stylesheet" type="text/css" href="styles2.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$("form").submit(function(event){
				event.preventDefault();
				var mail = $("input[name='mail']").val();
				var curPas = $("input[name='curPas']").val();
				var newPas = $("input[name='newPas']").val();
				var confirmPas = $("input[name='confirmPas']").val();
				$.post("passresetcontrol.php", {
					mail: mail,
					curPas: curPas,
					newPas: newPas,
					confirmPas: confirmPas
				}, 
				function(data, status){
					$("#Alert").html(data);

				});
			});
		});
	</script>
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
					<button type="submit" >Submit</button>
					<p id="Alert"></p>					
				</fieldset>
			</form>
			<button onclick="window.location.href = 'Login.php'">Back</button>
		</div>
	</center>

</body>
</html>

