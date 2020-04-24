<?php 
	$id = $_GET['id'];
	$query = $koneksi->query("SELECT * FROM pengguna WHERE id_pengguna='$id'");
	$data = $query->fetch_assoc();
	$role = $data['role_pengguna'];
 ?>
<div class="row mb-3">
	<div class="col-md-5">
		<a href="admin.php?halaman=admin_pengguna" class="btn btn-sm btn-dark mb-3">Kembali</a>
		<div class="card">
			<div class="card-header" style="background-color:#D3D3D3;">
				Ubah Petugas
			</div>
			<div class="card-body">
				<form method="post">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="nama" value="<?php echo $data['nama_pengguna'] ?>" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" name="email" value="<?php echo $data['email_pengguna'] ?>" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Telepon</label>
						<input type="number" name="telepon" value="<?php echo $data['telepon_pengguna'] ?>" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Role</label>
						<select class="form-control" required name="role">
							<option value="admin" <?php if($role == 'admin'){ echo 'selected'; } ?>>Admin</option>
							<option value="petugas" <?php if($role == 'petugas'){ echo 'selected'; } ?>>Petugas</option>
						</select>
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<textarea class="form-control" required name="alamat" rows="3"><?php echo $data['alamat_pengguna'] ?></textarea>
					</div>
					<button type="submit" name="ubah" class="btn btn-sm btn-primary">Ubah</button>
				</form>
			</div>
		</div>		
	</div>
	<div class="col-md-7"></div>
</div>
<?php 
	
	if(isset($_POST['ubah'])){
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$telepon = $_POST['telepon'];
		$role = $_POST['role'];
		$alamat = $_POST['alamat'];
		$query = $koneksi->query("UPDATE pengguna SET nama_pengguna='$nama',email_pengguna='$email',telepon_pengguna='$telepon',role_pengguna='$role',alamat_pengguna='$alamat' WHERE id_pengguna='$id'");
		if($query){
			?>
			<script type="text/javascript">
			alert('Petugas berhasil diubah');
			window.location.href="admin.php?halaman=admin_pengguna";
			</script>
			<?php
		}else{
			?>
			<script type="text/javascript">
			alert('Petugas gagal diubah');
			window.location.href="admin.php?halaman=admin_ubah_pengguna";
			</script>
			<?php
		}
	}
	
 ?>