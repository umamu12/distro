<?php 
	include"inc/config.php";
	include"layout/header.php";
	
	
?>
<?php	if(!empty($_GET['id'])){ ?>
		<?php
			extract($_GET); 
			$k = mysqli_query($connect,  "SELECT * FROM produk where id='$id'"); 
			$data = mysqli_fetch_array($k);
		?>
		<div class="col-md-9">
			<div class="row">
			<div class="col-md-12">
			<h3>Details : <?php echo $data['nama'] ?></h3>
				<br/>
				<div class="col-md-12 content-menu" style="margin-top:-20px;">
				<?php $kat = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM kategori_produk where id='$data[kategori_produk_id]'"));  ?>
					<small>Categoryy :<a href="<?php echo $url; ?>menu.php?kategori=<?php echo $kat['id'] ?>"><?php echo $kat['nama'] ?></a></small>
					<a href="<?php echo $url; ?>menu.php?id=<?php echo $data['id'] ?>">
						
						<img src="<?php echo $url; ?>uploads/<?php echo $data['gambar'] ?>" width="100%"> 
					</a>
					<br><br>
					<p><?php echo $data['deskripsi'] ?></p>
					<p style="font-size:18px">Price :<?php echo number_format($data['harga'], 2, ',', '.') ?></p>
					<p>
						<a href="<?php echo $url; ?>cart.php?act=beli&&produk_id=<?php echo $data['id'] ?>" class="btn btn-info" href="#" role="button">Order</a>
					</p>
				</div>   
				 
					
				
			</div>
			</div> 
		</div>
		
<?php }elseif(!empty($_GET['kategori'])){ ?>	

		<?php
			extract($_GET); 
			$kat = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM kategori_produk where id='$kategori'")); 
		?>
		<div class="col-md-9">
			<div class="row">
			<div class="col-md-12">
			<hr>
			<h3>Category : <?php echo $kat['nama'] ?></h3>
				<?php 
					$k = mysqli_query($connect, "SELECT * FROM produk where kategori_produk_id='$kategori'");
					while($data = mysqli_fetch_array($k)){
				?>
				<div class="col-md-4 content-menu">
					<a href="<?php echo $url; ?>menu.php?id=<?php echo $data['id'] ?>">
						<img src="<?php echo $url; ?>uploads/<?php echo $data['gambar'] ?>" width="100%">
						<h4><?php echo $data['nama'] ?></h4>
					</a>
					<p style="font-size:18px">Price :<?php echo number_format($data['harga'], 2, ',', '.') ?></p>
					<p>
						<a href="<?php echo $url; ?>menu.php?id=<?php echo $data['id'] ?>" class="btn btn-success btn-sm" href="#" role="button">See Details</a>
						<a href="<?php echo $url; ?>cart.php?act=beli&&produk_id=<?php echo $data['id'] ?>" class="btn btn-info btn-sm" href="#" role="button">Order</a>
					</p>
				</div>  
				<?php } ?>
				
			</div>
			</div>
		</div>

<?php }else{ ?>	
			
			<div class="col-md-9">
			<div class="row">
			<div class="col-md-12">
			<hr>
			<h3>List All Menu</h3>
				<?php 
					$k = mysqli_query($connect, "SELECT * FROM produk");
					while($data = mysqli_fetch_array($k)){
				?>
				<div class="col-md-4 content-menu">
					<a href="<?php echo $url; ?>menu.php?id=<?php echo $data['id'] ?>">
						<img src="<?php echo $url; ?>uploads/<?php echo $data['gambar'] ?>" width="100%">
						<h4><?php echo $data['nama'] ?></h4>
					</a>
					<p style="font-size:18px">Price :<?php echo number_format($data['harga'], 2, ',', '.') ?></p>
					<p>
						<a href="<?php echo $url; ?>menu.php?id=<?php echo $data['id'] ?>" class="btn btn-success btn-sm" href="#" role="button">See Details</a>
						<a href="<?php echo $url; ?>cart.php?act=beli&&produk_id=<?php echo $data['id'] ?>" class="btn btn-info btn-sm" href="#" role="button">Order</a>
					</p>
				</div>  
				<?php } ?>
				
			</div>
			</div>
		</div>

<?php } ?>	
<?php include"layout/footer.php"; ?>