<?php 
	include"inc/config.php";
	if(!empty($_SESSION['iam_user'])){
		redir("index.php");
	}
	include"layout/header.php";
	 
	 
	
	if(!empty($_POST)){
		extract($_POST);
		$password = md5($password);
		$q = mysqli_query($connect, "SELECT * FROM `user` WHERE email='$email' AND password='$password' AND status='user'")or die(mysqli_error($q));
		if($q){
			$r = mysqli_fetch_object($q);
			$_SESSION['iam_user'] = $r->id;
			redir("index.php");
		}else{
			alert("Maaf email dan password anda salah");
		}
	}
?> 
		 
		<div class="col-md-9">
			<div class="row">
			<div class="col-md-12">
			
			<?php 
				if(!empty($_POST)){
			extract($_POST); 
		
			$q = mysqli_query($connect, "insert into kontak Values(NULL,'$nama','$email','$subjek','$pesan')");
				if($q){  
			?>

			<div class="alert alert-success">Thank you for your advice</div>
				<?php }else{ ?>
			<div class="alert alert-danger">An error occurred in filling out the form. Data has not been sent.</div>
				<?php } } ?>
			<h3>Login User</h3>
				<hr>
				<div class="col-md-6 content-menu" style="margin-top:-20px;">
				 
				 <form action="" method="post" enctype="multipart/form-data">
						<label>Email</label><br>
      <input type="email" class="form-control" name="email" placeholder="Email" required="" autofocus="" /><br>
	  <label>Password</label><br>
      <input type="password" class="form-control" name="password" placeholder="Password" required=""/>      <br>
						<input type="submit" name="form-input" value="Login" class="btn btn-success">
					</form>
				 
				</div>   
				<div class="col-md-12 content-menu">
				 Don't have an account ? <a href="register.php">Create now !</a>
				</div>   
					
				
			</div>
			</div> 
		</div> 	
<?php include"layout/footer.php"; ?>