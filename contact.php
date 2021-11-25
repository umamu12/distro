<?php 
	include"inc/config.php";
	include"layout/header.php";	
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
			<h3>Contact us</h3>
				<hr>
				<div class="col-md-8 content-menu" style="margin-top:-20px;">
				 
				 <form action="" method="post" enctype="multipart/form-data">
						<label>Name</label><br>
						<input type="text" class="form-control" name="nama" required><br>
						<label>Email</label><br>
						<input type="email" class="form-control" name="email" required><br>
						<label>Subject</label><br>
						<input type="text" class="form-control" name="subjek" required><br>
						<label>Message</label><br>
						<textarea class="form-control" name="pesan" required></textarea><br>
						<input type="submit" name="form-input" value="Save" class="btn btn-success">
					</form>
				 
				</div>   
				 	
			</div>
			</div> 
		</div> 	
<?php include"layout/footer.php"; ?>