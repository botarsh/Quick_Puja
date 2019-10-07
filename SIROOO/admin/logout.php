<?php
	$con = mysqli_connect("localhost","root","","newstore") or die(mysqli_error($con));
	if(!isset($_SESSION['email'])){
		session_start();
	}
	if(!isset($_SESSION['email'])){
		header('location:index.php');
	}
	session_destroy();
	header('location:index.php');
?>