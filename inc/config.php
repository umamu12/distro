<?php 
	session_start();
	mysql_connect("localhost", "umam12", "");
	mysql_select_db("distro");
	
	// settings
	$url = "http://localhost/distro/";
	$title = "Online Distro";
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