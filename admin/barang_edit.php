<?php 
	include 'header.php';
	include '../koneksi.php';
?>

<div class="container">
	<div class="panel">
		<div class="panel-heading">
			<h4>Edit Barang</h4>
		</div>
		<div class="panel-body">
			<div class="col-md-8 col-md-offset-2">
				<a href="barang.php" class="btn btn-sm btn-info pull-right">Kembali</a>
				<br><br>
			
			<?php
				$id = $_GET['id'];

				$barang = mysqli_query($koneksi,"select * from barang where id_barang ='$id'");
				while ($t=mysqli_fetch_array($barang)) {
			?>
				<form method="POST" action="barang_update.php">
					<input type="hidden" name="id_barang" value="<?php echo $t['id_barang']; ?>">
					<div class="form-group">
						<label>Nama Barang</label>
						<input type="text" name="nama_barang" class="form-control" placeholder="Masukkan nama barang" required="required" value="<?php echo $t['nama_barang'] ?>">
					</div>
					<div class="form-group">
						<label>Harga beli</label>
						<input type="text" name="harga_beli" class="form-control"  required="required" value="<?php echo $t['harga_beli'] ?>">
					</div>
					<div class="form-group">
						<label>Harga jual</label>
						<input type="text" name="harga_jual" class="form-control" required="required" value="<?php echo $t['harga_jual'] ?>">
					</div>
					<div class="form-group">
						<label>Stok</label>
						<input type="number" name="stok" class="form-control" required="required" value="<?php echo $t['stok'] ?>">
					</div>
					<input type="submit" class="btn btn-primary" value="Simpan">
				</form>
			<?php
				}
			?>
			</div>
		</div>
	</div>
</div>