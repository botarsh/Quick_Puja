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
						<div class="uploadsecs">
							<div class="uploadsec"><a href="add1.php">First Section</a></div>
							<div class="uploadsec"><a href="add2.php">First Section</a></div>
							<div class="uploadsec active"><a href="add3.php">First Section</a></div>
						</div>
						<div class="form" id="form">
						  <form method="post" action="add3.php" align="center" enctype="multipart/form-data">
							  <div class="form-group">
								<label for="prodname">Name</label>
								<input type="text" class="form-control" name="Name" placeholder="Enter Your Name" required="required"><br>
							  </div>
							  <div class="form-group">
								<label>Institute</label>
								<input type="text" class="form-control" name="Institute" placeholder="Enter Your Institute Name" required="required"><br>
							  </div>
							  <div class="form-group">
								<label>Project</label>
								<input type="file" class="form-control" name="file" required="required"><br>
							  </div>
							  <input type="submit" value="Upload" name="submit">
					      </form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="../js/my.js"></script>
	</body>
</html>
<?php

     if (isset($_POST['submit'])) {
     	# code...
     	$Name=$_POST['Name'];
     	$Institute=$_POST['Institute'];
     	$filename=$_FILES['file']['name'];
     	$tempfilename=$_FILES['file']['tmp_name'];
     	$target_dir = "../img/products/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $uploadOk = 1;
        $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
     	if($FileType !="jpg" && $FileType !="png"  && $FileType !="jpeg") {
         echo "Sorry, Only jpg, png and jpeg files are allowed.";
           $uploadOk = 0;
        }
        else{
     	$conn=mysqli_connect('localhost','root','','store') or die(mysqli_error());
     	move_uploaded_file($tempfilename,"../img/products/$filename");
     	$sql="INSERT INTO `items2`(`name`, `price`, `imgpath`) VALUES ('$Name','$Institute','$filename')";
     	$match="SELECT * FROM `items2` WHERE `imgpath`='$filename'";
     	$exists = mysqli_query($conn,$match);
        if (mysqli_num_rows($exists)>0) {
         	# code...
     	    ?><script>alert('Please Change Your File Name..!')</script><?php
       }
       else{
       	$run=mysqli_multi_query($conn,$sql);
		?><script>alert('Product details are Successfully added.')</script><?php
     	header('Location: add3.php');
       }
     }
   }

?>