<?php 

	$id = $_GET['id'];
	$query = $koneksi->query("SELECT * FROM pengguna WHERE id_pengguna='$id'");
	$data = $query->fetch_assoc();
	$jurusan = $data['jurusan'];
	$semester = $data['semester'];
	$kelas = $data['kelas'];

 ?>
<div class="row mb-3">
	<div class="col-md">
		<a href="admin.php?halaman=admin_anggota" class="btn btn-sm btn-dark mb-3">Kembali</a>
		<div class="card">
			<div class="card-header" style="background-color:#D3D3D3;">
				Ubah Anggota
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
					<form method="post">
						<div class="form-group">
							<label>NIM</label>
							<input type="text" name="nim" value="<?php echo $data['nim'] ?>" class="form-control" readonly>
						</div>
						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="nama" value="<?php echo $data['nama_pengguna'] ?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Jurusan</label>
							<select class="form-control" name="jurusan">
								<option value="Informatika" <?php if($jurusan == 'Informatika'){ echo 'selected'; } ?>>Informatika</option>
								<option value="Sistem Informasi" <?php if($jurusan == 'Sistem Informasi'){ echo 'selected'; } ?>>Sistem Informasi</option>
								<option value="Sosiologi" <?php if($jurusan == 'Sosiologi'){ echo 'selected'; } ?>>Sosiologi</option>
								<option value="Psikologi" <?php if($jurusan == 'Psikologi'){ echo 'selected'; } ?>>Psikologi</option>
								<option value="Soshum" <?php if($jurusan == 'Soshum'){ echo 'selected'; } ?>>Soshum</option>
							</select>
						</div>
						<div class="form-group">
							<label>Semester</label>
							<select class="form-control" name="semester">
								<option value="1" <?php if($semester == '1'){ echo 'selected'; } ?>>1</option>
								<option value="2" <?php if($semester == '2'){ echo 'selected'; } ?>>2</option>
								<option value="3" <?php if($semester == '3'){ echo 'selected'; } ?>>3</option>
								<option value="4" <?php if($semester == '4'){ echo 'selected'; } ?>>4</option>
								<option value="5" <?php if($semester == '5'){ echo 'selected'; } ?>>5</option>
								<option value="6" <?php if($semester == '6'){ echo 'selected'; } ?>>6</option>
								<option value="7" <?php if($semester == '7'){ echo 'selected'; } ?>>7</option>
								<option value="8" <?php if($semester == '8'){ echo 'selected'; } ?>>8</option>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Kelas</label>
							<select class="form-control" name="kelas">
								<option value="Pagi" <?php if($kelas == 'Pagi'){ echo 'selected'; } ?>>Pagi</option>
								<option value="Malam" <?php if($kelas == 'Malam'){ echo 'selected'; } ?>>Malam</option>
								<option value="Weekend" <?php if($kelas == 'Weekend'){ echo 'selected'; } ?>>Weekend</option>
							</select>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="text" name="email" value="<?php echo $data['email_pengguna'] ?>" class="form-control" readonly>
						</div>
						<div class="form-group">
							<label>Telepon</label>
							<input type="number" name="telepon" value="<?php echo $data['telepon_pengguna'] ?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<textarea class="form-control" required name="alamat" rows="4"><?php echo $data['alamat_pengguna'] ?></textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md">
						<button type="submit" name="ubah" class="btn btn-block btn-sm btn-primary">Ubah</button>	
					</form>
					</div>
				</div>					
			</div>
		</div>		
	</div>
</div>
<?php 
	
	if(isset($_POST['ubah'])){
		$nama = $_POST['nama'];
		$jurusan = $_POST['jurusan'];
		$semester = $_POST['semester'];
		$kelas = $_POST['kelas'];
		$telepon = $_POST['telepon'];
		$alamat = $_POST['alamat'];
		$query = $koneksi->query("UPDATE pengguna SET nama_pengguna='$nama',jurusan='$jurusan',semester='$semester',kelas='$kelas',telepon_pengguna='$telepon',alamat_pengguna='$alamat' WHERE id_pengguna='$id'");
		if($query){
			?>
			<script type="text/javascript">
			alert('Anggota berhasil diubah');
			window.location.href="admin.php?halaman=admin_anggota";
			</script>
			<?php
		}else{
			?>
			<script type="text/javascript">
			alert('Anggota gagal diubah');
			window.location.href="admin.php?halaman=admin_tambah_anggota";
			</script>
			<?php
		}
	}
	
 ?>