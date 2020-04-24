<?php 
	$id = $_GET['id'];
	$query_buku = $koneksi->query("SELECT * FROM buku WHERE id_buku='$id'");
	$buku = $query_buku->fetch_assoc();
	$lokasi = $buku['lokasi'];
 ?>
<div class="row mb-3">
	<div class="col-md">
		<a href="admin.php?halaman=admin_buku" class="btn btn-sm btn-dark mb-3">Kembali</a>
		<div class="card">
			<div class="card-header" style="background-color:#D3D3D3;">
				Ubah Buku
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
					<form method="post">
						<div class="form-group">
							<label>Kode</label>
							<input type="text" name="kode" value="<?php echo $buku['kode_buku'] ?>" class="form-control" readonly>
						</div>
						<div class="form-group">
							<label>Judul</label>
							<input type="text" name="judul" value="<?php echo $buku['judul_buku'] ?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Pengarang</label>
							<input type="text" name="pengarang" value="<?php echo $buku['pengarang'] ?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Penerbit</label>
							<input type="text" name="penerbit" value="<?php echo $buku['penerbit'] ?>" class="form-control" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Tahun Terbit</label>
							<input type="number" name="tahun" value="<?php echo $buku['tahun_terbit'] ?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>ISBN</label>
							<input type="text" name="isbn" value="<?php echo $buku['isbn'] ?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Jumlah</label>
							<input type="number" name="jumlah" value="<?php echo $buku['jumlah_buku'] ?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Lokasi</label>
							<select class="form-control" name="lokasi">
								<option value="rak 1" <?php if($lokasi == 'rak 1'){ echo 'selected'; } ?>>Rak 1</option>
								<option value="rak 2" <?php if($lokasi == 'rak 2'){ echo 'selected'; } ?>>Rak 2</option>
								<option value="rak 3" <?php if($lokasi == 'rak 3'){ echo 'selected'; } ?>>Rak 3</option>
								<option value="rak 4" <?php if($lokasi == 'rak 4'){ echo 'selected'; } ?>>Rak 4</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md">
						<button type="submit" name="ubah" class="btn btn-sm btn-primary btn-block">Ubah</button>
					</div>
					</form>
				</div>
			</div>
		</div>						
	</div>				
</div>
<?php 
	
	if(isset($_POST['ubah'])){
		$judul = $_POST['judul'];
		$pengarang = $_POST['pengarang'];
		$penerbit = $_POST['penerbit'];
		$tahun = $_POST['tahun'];
		$isbn = $_POST['isbn'];
		$jumlah = $_POST['jumlah'];
		$lokasi = $_POST['lokasi'];
		$query = $koneksi->query("UPDATE buku SET judul_buku='$judul',pengarang='$pengarang',penerbit='$penerbit',tahun_terbit='$tahun',isbn='$isbn',jumlah_buku='$jumlah',lokasi='$lokasi' WHERE id_buku='$id'");
		if($query){
			?>
			<script type="text/javascript">
			alert('Buku berhasil diubah');
			window.location.href="admin.php?halaman=admin_buku";
			</script>
			<?php
		}else{
			?>
			<script type="text/javascript">
			alert('Buku gagal diubah');
			window.location.href="admin.php?halaman=admin_ubah_buku";
			</script>
			<?php
		}
	}
	
 ?>