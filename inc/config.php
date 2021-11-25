<?php 
	session_start();
	$connect = mysqli_connect("localhost", "root", "");
	$database = "distro";
	mysqli_select_db($connect,$database);
	
	// settings
	$url = "http://localhost/distro/";
	$title = "Distro Online";
	$no = 1;
	
	function alert($command){
		echo "<script>alert('".$command."');</script>";
	}
	function redir($command){
		echo "<script>document.location='".$command."';</script>";
	}
	function validate_admin_not_login($command){
		if(empty($_SESSION['iam_admin'])){
			redir($command);
		}
	}
?>