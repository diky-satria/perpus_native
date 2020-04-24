<div class="row mb-3">
	<div class="col-md">
		<a href="admin.php?halaman=admin_anggota" class="btn btn-sm btn-dark mb-3">Kembali</a>
		<div class="card">
			<div class="card-header" style="background-color:#D3D3D3;">
				Tambah Anggota
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
					<form method="post">
						<div class="form-group">
							<label>NIM</label>
							<input type="text" name="nim" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="nama" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Jurusan</label>
							<select class="form-control" name="jurusan" required>
								<option disabled selected>-- Pilih Jurusan --</option>
								<option value="Informatika">Informatika</option>
								<option value="Sistem Informasi">Sistem Informasi</option>
								<option value="Sosiologi">Sosiologi</option>
								<option value="Psikologi">Psikologi</option>
								<option value="Soshum">Soshum</option>
							</select>
						</div>
						<div class="form-group">
							<label>Semester</label>
							<select class="form-control" name="semester" required>
								<option disabled selected>-- Pilih Semester --</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
							</select>
						</div>
						<div class="form-group">
							<label>Kelas</label>
							<select class="form-control" name="kelas" required>
								<option disabled selected>-- Pilih Semester --</option>
								<option value="Pagi">Pagi</option>
								<option value="Malam">Malam</option>
								<option value="Weekend">Weekend</option>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Email</label>
							<input type="text" name="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Telepon</label>
							<input type="number" name="telepon" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<textarea class="form-control" required name="alamat" rows="4"></textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md">
						<button type="submit" name="tambah" class="btn btn-block btn-sm btn-primary">Tambah</button>	
					</form>
					</div>
				</div>					
			</div>
		</div>		
	</div>
</div>
<?php 
	
	if(isset($_POST['tambah'])){
		$nim = $_POST['nim'];
		$nama = $_POST['nama'];
		$jurusan = $_POST['jurusan'];
		$semester = $_POST['semester'];
		$kelas = $_POST['kelas'];
		$email = $_POST['email'];
		$telepon = $_POST['telepon'];
		$password = $_POST['password'];
		$alamat = $_POST['alamat'];
		$role = 'anggota';
		$query = $koneksi->query("INSERT INTO pengguna (nim,nama_pengguna,jurusan,semester,kelas,email_pengguna,password_pengguna,role_pengguna,telepon_pengguna,alamat_pengguna) VALUES ('$nim','$nama','$jurusan','$semester','$kelas','$email','$password','$role','$telepon','$alamat')");
		if($query){
			?>
			<script type="text/javascript">
			alert('Anggota berhasil ditambahkan');
			window.location.href="admin.php?halaman=admin_anggota";
			</script>
			<?php
		}else{
			?>
			<script type="text/javascript">
			alert('Anggota gagal ditambahkan');
			window.location.href="admin.php?halaman=admin_tambah_anggota";
			</script>
			<?php
		}
	}
	
 ?>