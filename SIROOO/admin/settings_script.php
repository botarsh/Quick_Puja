<?php
	require 'include/common.php';
	if(!isset($_SESSION['email'])){
		header('location:index.php');
	}
	$email=$_SESSION[email];
	$old=md5(mysqli_real_escape_string($con,$_POST['oldpass']));
	$pass=md5(mysqli_real_escape_string($con,$_POST['newpass']));
	$repass=md5(mysqli_real_escape_string($con,$_POST['renewpass']));
	if($pass!=$repass){
		header('location:setting.php?x=1');
	}
	else{
		$select_qry = "SELECT * FROM users WHERE password='$old'";
		$select_run = mysqli_query($con,$select_qry) or die(mysqli_error($con));
		if(mysqli_num_rows($select_run)<1){
			header('location:setting.php?y=1');
		}
		else{
			$qry="UPDATE `users` SET `password`='$pass' WHERE `email_id`='$email' AND `password`='$old'";
			$run=mysqli_query($con,$qry) or die(mysqli_error($con));
			header('location:setting.php?alert=1');
		}
	}
?>