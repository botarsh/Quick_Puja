<?php
	$con = mysqli_connect("localhost","root","","newstore") or die(mysqli_error($con));
	if(!isset($_SESSION['email'])){
		session_start();
	}
	if(!isset($_SESSION['email'])){
		header('location:index.php');
	}
?>
<!doctype html>
<html>
	<head>
		<title>Admin Panel</title>
		<link rel="stylesheet" href="../css/adminstyle.css">
		<link rel="stylesheet" href="../css/icons.css">
	</head>
	<body>
		<div class="supar_container">
			<div class="admin-header">
				<div class="ad-title">Admin Panel</div>
				<div class="headsec">
					<button class="head-drop-links" onclick="show('header-links')">
						<i class="material-icons" id="head-down-icon">&#xe313;</i>
					</button>
				</div>
			</div>
			<div class="ad-main">
				<div class="ad-sidebar">
					<div class="ad-handle">
						<div class="ad-handle-title">Admin Handle</div>
						<div class="ad-task"><a href="changepass.php">Change Password</a></div>
						<div class="ad-task"><a href="add1.php">Add New Item</a></div>
						<div class="ad-task"><a href="logout.php">Logout</a></div>
					</div>
				</div>
				<div class="ad-side-content">
					<div class="container">
						<div class="form" id="form">
						  <form method="post" action="settings_script.php" align="center" enctype="multipart/form-data">
							  <div class="form-group">
								<label for="prodname">Old Password</label>
								<input type="password" class="form-control" name="oldpass" placeholder="Enter Old Password" required="required"><br>
							  </div>
							  <div class="form-group">
								<label>New Password</label>
								<input type="password" class="form-control" name="newpass" placeholder="Enter New Password" required="required"><br>
							  </div>
							  <div class="form-group">
								<label>Re-Enter New Password</label>
								<input type="password" class="form-control" name="renewpass" placeholder="Re-Enter New Password" required="required"><br>
							  </div>
							  <input type="submit" value="Submit" name="submit">
					      </form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="../js/my.js"></script>
	</body>
</html>