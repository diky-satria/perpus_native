<div class="row mb-3">
	<div class="col-md-5">
		<a href="admin.php?halaman=admin_pengguna" class="btn btn-sm btn-dark mb-3">Kembali</a>
		<div class="card">
			<div class="card-header" style="background-color:#D3D3D3;">
				Tambah Petugas
			</div>
			<div class="card-body">
				<form method="post">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="nama" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" name="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Telepon</label>
						<input type="number" name="telepon" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Role</label>
						<select class="form-control" required name="role">
							<option disabled selected>-- Pilih Role Access --</option>
							<option value="admin">Admin</option>
							<option value="petugas">Petugas</option>
						</select>
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<textarea class="form-control" required name="alamat" rows="3"></textarea>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control" required>
					</div>
					<button type="submit" name="tambah" class="btn btn-sm btn-primary">Tambah</button>
				</form>
			</div>
		</div>		
	</div>
	<div class="col-md-7"></div>
</div>
<?php 
	
	if(isset($_POST['tambah'])){
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$telepon = $_POST['telepon'];
		$role = $_POST['role'];
		$alamat = $_POST['alamat'];
		$password = $_POST['password'];
		$query = $koneksi->query("INSERT INTO pengguna (nama_pengguna,email_pengguna,telepon_pengguna,role_pengguna,alamat_pengguna,password_pengguna) VALUES ('$nama','$email','$telepon','$role','$alamat','$password')");
		if($query){
			?>
			<script type="text/javascript">
			alert('Petugas berhasil ditambahkan');
			window.location.href="admin.php?halaman=admin_pengguna";
			</script>
			<?php
		}else{
			?>
			<script type="text/javascript">
			alert('Petugas gagal ditambahkan');
			window.location.href="admin.php?halaman=admin_tambah_pengguna";
			</script>
			<?php
		}
	}
	
 ?>