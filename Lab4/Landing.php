<!DOCTYPE html>
<html>
<head>
	<title>Landing Page</title>
	<link rel="stylesheet" type="text/css" href="styles2.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$("form#order").submit(function(event){
				event.preventDefault();
				var food_item = $("input[name='food_item']").val();
				var quantity = $("input[name='quantity']").val();
				var action = "Order";

				$.post("landingcontrol.php", {
					food_item: food_item,
					quantity: quantity,
					action: action
					
				}, function(data, status){
					$("#order_id").html(data);					
				});
			});
			$("form#status").submit(function(event){
				event.preventDefault();
				var order_id = $("input[name='order_id']").val();
				var action = "Status";

				$.post("landingcontrol.php", {
					order_id: order_id,
					action: action
					
				}, function(data, status){
					$("#check_status").html(data);					
				});
			});
			$("form#logout").submit(function(event){
				event.preventDefault();
				var action = $("input[name='logout_action']").val();

				$.post("landingcontrol.php", {
					action: action
					
				}, function(data, status){
					window.location.href = data;
					// $("#check_status").html(data);					
				});
			});
		});
	</script>
</head>
<body>
	<nav>
		<ul>
			<li><img src="Pics/man.jpg"></li>
			<li><div class="name"><p>Grant Beck</p></div></li>

		</ul>
				
		
	</nav>
	<center>
		<div class="profpic">
			<h1>Order Here</h1>
			<!-- <img src="Pics/man.jpg"> -->
			
			<form id="order" action="landingcontrol.php" method="post">
				<input type="text" name="food_item" placeholder="Enter food item">
				<br><br>
				<input type="number" name="quantity" placeholder="Enter number of units" min="0">
				<br><br>
				<button type="submit">Order</button>
				<br><br>
				<p id="order_id"></p>					
			</form>
			<form id="status" action="landingcontrol.php" method="post">
				<h1>Check Order Status</h1>				
				<input type="number" name="order_id" placeholder="Enter Order ID">
				<br><br>
				<button type="submit">Check</button>
				<br><br>
				<p id="check_status"></p>
			</form>	
			<form id="logout" action="landingcontrol.php" method="post">
				<input type="text" name="logout_action" value="logout_action" hidden>
				<button type="submit">Logout</button>
			</form>		
		</div>
	</center>
</body>
</html>