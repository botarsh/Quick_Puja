<?php
?>
<!doctype html>
<html>
	<head>
		<title>Confirm Order</title>
		<link rel="stylesheet" href="styleP.css">
	</head>
	<body>
	<div class="container">
		<div class="buy_model" id="buy-model" style="display:block;">
			<div class="order">
				<div class="confirm-title">Confirm Order</div>
				<form action="email.php?prodName=<?php echo $_GET['prodName']; ?>&prodprice=<?php echo $_GET['prodprice'];?>" method="post">
					<input class="data" type="text" name="prod-name" value="<?php echo $_GET['prodName']; ?>" disabled>
					<input class="data" type="varchar" name="price" value="<?php echo $_GET['prodprice'];?>" disabled>
					<input class="data" type="text" name="name" placeholder="Enter Your Name">
					<input class="data" name="mobno" placeholder="Enter Mobile Number">
					<input class="data" name="email" type="email" placeholder="Enter Email">
					<textarea class="data" name="add" rows="2" placeholder="Enter Address"></textarea>
					<input class="data mybtn" type="submit" value="Confirm Order">
				</form>
			</div>
        </div>
	</div>
	</body>
</html>
