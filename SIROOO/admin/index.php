<?php
	$con = mysqli_connect("localhost","root","","newstore") or die(mysqli_error($con));
	if(!isset($_SESSION['email'])){
		session_start();
	}
	if(isset($_SESSION['email'])){
		header('location:add1.php');
	}
?>
<!doctype html>
<html>
	<head>
		<title>Admin Login</title>
		<style>
			body{
				margin:0;
				width:100%;
				height:100%;
				background:#272883;
			}
			.super-container{
			}
			.login{
				position:absolute;
				top:50%;
				left:50%;
				transform:translate(-50%,-50%);
			}
			@media screen and (max-width:575px){
				.login{
					max-width:90%;
					width:100%;
				}
				form{
					padding-right:26px;
				}
			}
			
			.form-group{
				margin-bottom: 20px;
				width: 100%;
						
			}
			.form-group label{
				color: #fff;
			}
			.form-control{
				color: #fff;
				font-size: 14px;
				font-weight: bold;
				border: 1px solid #ccc;
				margin-top: 5px;
				padding: 10px 12px;
				max-width: 100%;width: 100%;
				background: none;
				box-shadow: none;
			}
			.form-control::placeholder{
				color: #fff;font-weight: bold;opacity: 1;
			}

			input[type="file"]:hover{
				cursor: pointer;
			}
			input[type="submit"]{
				cursor: pointer;
				padding: 5px 20px;color: #fff;
				font-size: 14px;font-weight: bold;
				background: none;border:1px solid #ccc;
			}
			input[type="submit"]:hover{
				color: #272883;background: #fff;
				border:1px solid #272883;box-shadow: 0px 1px 5px #fff;
				transition: 1s ease;
			}
		</style>
	</head>
	<body>
		<div class="super-container">
			<div class="login">
				<form method="POST" action="logscript.php">
					<div class="form-group">
						<label for="prodname">UserName</label>
						<input type="varchar" class="form-control" name="usr" placeholder="Enter Your UserName" required="required"><br>
					</div>
					 <div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="pass" placeholder="Enter Your Password" required="required"><br>
					</div>
					<div class="form-group">
						<input type="submit" value="Login" name="submit">
					</div>
				</form>
			</div>
		</div>
	</body>
</html>