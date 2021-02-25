<!DOCTYPE html>
<html>
<head>
	<title>Signup Page</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$("form#data").submit(function(event){
				event.preventDefault();
				var formdata = new FormData($(this)[0]);
				$.ajax({
					  type: 'POST',
					  url: "signupcontrol.php",
					  data: formdata,
					  processData: false, // jQuery does not process the sent data
					  contentType: false, // jQuery don't set the Content-Type request header
					  success: function(res){
					 		$("#Alert").html(res);
				  }
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
					<a href="Login.php">Login</a>
				</div>
				<div class="signupdets">
					<form id="data" action="signupcontrol.php" method="post" enctype = "multipart/form-data">
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
							<input type="file" name="profile" id="pp" class="file">
							<div id="file-upload-filename" style="display: inline-block;"></div>
							<script type="text/javascript">
								var input = document.getElementById( 'pp' );
								var infoArea = document.getElementById( 'file-upload-filename' );

								input.addEventListener( 'change', showFileName );

								function showFileName( event ) {
								  
								  // the change event gives us the input it occurred in 
								  var input = event.srcElement;
								  
								  // the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
								  var fileName = input.files[0].name;
								  
								  // use fileName however fits your app best, i.e. add it into a div
								  infoArea.textContent = fileName;
								}
							</script>
							</div>
							<br>
							<button type="submit" onclick="return validate()" >Sign Up</button>
							<p id="Alert"></p>
						</fieldset>
					</form>
				</div>
				
			</div>
			
		</center>
	

</body>
</html>

