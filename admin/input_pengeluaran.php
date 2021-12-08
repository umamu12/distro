<?php
	include"../inc/config.php";
	validate_admin_not_login("login.php");


	if(!empty($_GET)){
		if($_GET['act'] == 'delete'){

			$q = mysqli_query($connect,"delete from laporan WHERE id_pengeluaran='$_GET[id]'");
			if($q){ alert("Success"); redir("input_pengeluaran.php"); }
		}
	}
	if(!empty($_GET['act']) && $_GET['act'] == 'create'){
		if(!empty($_POST)){
			extract($_POST);
			$q = mysqli_query($connect,"insert into laporan Values(NULL,'$nama_barang','$Tanggal_pengeluaran','$harga','$jumlah',$harga*$jumlah)");
			if($q){ alert("Success"); redir("input_pengeluaran.php"); }
		}
	}
	if(!empty($_GET['act']) && $_GET['act'] == 'edit'){
		if(!empty($_POST)){
			extract($_POST);

			$q = mysqli_query($connect,"update laporan SET nama_barang='$nama_barang',harga='$harga',jumlah='$jumlah',total='$total' where id_pengeluaran=$_GET[id]") or die(mysqli_error($q));
			if($q){ alert("Success"); redir("input_pengeluaran.php"); }
		}
	}


	include"inc/header.php";

?>

	<div class="container">
		<?php
			$q = mysqli_query($connect,"select*from laporan");
			$j = mysqli_num_rows($q);
		?>
		<h4>Input Expenses (<?php echo ($j>0)?$j:0; ?>)</h4>
		<a class="btn btn-sm btn-primary" href="input_pengeluaran.php?act=create">Add Data</a>
		<hr>
		<?php
			if(!empty($_GET)){
				if($_GET['act'] == 'create'){
				?>
					<div class="row col-md-6">
					<form action="" method="post" enctype="multipart/form-data">
						<label>Item Name</label><br>
						<input type="text" class="form-control" name="nama_barang" required placeholder="Masukkan Nama Barang"><br>
						<label>Issue Date</label><br>
						<div class="form-group">
							<div class='input-group date' id='datetimepicker'>
								<input type='text' class="form-control" name="Tanggal_pengeluaran"
								required placeholder="Pilih Tanggal" />
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
						</div>
						<label>Price</label><br>
						<input type="text" class="form-control" name="harga" required placeholder="Masukkan Harga"><br>
						<label>Amount</label><br>
						<input type="text" class="form-control" name="jumlah" required placeholder="Masukkan Jumlah"><br>
						<input type="submit" name="form-input" value="Simpan" class="btn btn-success">
					</form>
					</div>
					<div class="row col-md-12"><hr></div>
				<?php
				}
				if($_GET['act'] == 'edit'){
					$data = mysqli_fetch_object(mysqli_query($connect,"select*from laporan where id_pengeluaran='$_GET[id]'"));
				?>
					<div class="row col-md-6">
					<form action="input_pengeluaran.php?act=edit&&id=<?php echo $_GET['id'] ?>" method="post" enctype="multipart/form-data">
						<label>Item Name</label><br>
						<input type="text" class="form-control" name="nama_barang" value="<?php echo $data->nama_barang; ?>" required><br>
						<label>Price</label><br>
						<input type="text" class="form-control" name="harga" value="<?php echo $data->harga; ?>" required><br>
						<label>Amount</label><br>
						<input type="text" class="form-control" name="jumlah" value="<?php echo $data->jumlah; ?>" required><br>
						<input type="submit" name="form-edit" value="Simpan" class="btn btn-success">
					</form>
					</div>
					<div class="row col-md-12"><hr></div>
				<?php
				}
			}
		?>

		<table class="table table-striped table-hove">
			<thead>
				<tr>
					<th>Number</th>
					<th>Item Name</th>
					<th>Issue Date</th>
					<th>Price</th>
					<th>Total item</th>
					<th>Total</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>




		<?php while($data=mysqli_fetch_object($q)){
			$tgl=explode("-",$data->Tanggal_pengeluaran);
			$tgl1=$tgl['2'].'-'. $tgl['1'].'-'. $tgl['0'];


			?>



				<tr>
					<th scope="row"><?php echo $no++; ?></th>
					<td><?php echo $data->nama_barang  ?></td>
					<td><?php echo $tgl1 ?></td>
				  <td><?php echo "Rp. " .number_format($data->harga, 2, ",", "."); ?></td>
					<th><?php echo $data->jumlah ?></th>
					<td><?php echo "Rp. " .number_format($data->total, 2, ",", "."); ?></td>
					<td>
						<a class="btn btn-sm btn-success" href="input_pengeluaran.php?act=edit&&id=<?php echo $data->id_pengeluaran ?>">Edit</a>
						<a class="btn btn-sm btn-danger" href="input_pengeluaran.php?act=delete&&id=<?php echo $data->id_pengeluaran ?>">Delete</a>
					</td>
				</tr>
		<?php } ?>
			</tbody>
		</table>
    </div> <!-- /container -->

<?php include"inc/footer.php"; ?>
