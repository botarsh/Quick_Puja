<?php
	$con=mysqli_connect("localhost","root","","store") or die(mysqli_error($con));
	if(!isset($_SESSION['email'])){
		session_start();
	}
	$usr = mysqli_real_escape_string($con,$_POST['usr']);
	$pass = md5($_POST['pass']);
	
	$qry = "SELECT * FROM `admin` WHERE `email_id`='$usr' AND `password`='$pass'";
	
	$run = mysqli_query($con,$qry) or die(mysqli_error($con));
	$row = mysqli_fetch_array($run) or die(mysqli_error($con));
	$rowcount = mysqli_num_rows($run) or die(mysqli_error($con));
	
	if($rowcount<1){
		$err=1;
		$_SESSION['logerr']=$err;
		header('location:index.php');
	} 
	else{
		$_SESSION['email']=$row['email_id'];
	    $_SESSION['id']=$row['id'];
		header('location:add1.php');
	}
?>