<?php 

	$id = $_GET['id'];
	$query = $koneksi->query("SELECT * FROM pengguna WHERE id_pengguna='$id'");
	$data = $query->fetch_assoc();

 ?>
<a href="admin.php?halaman=admin_anggota" class="btn btn-sm btn-dark mb-3">Kembali</a>
<div class="card">
    <div class="card-header" style="background-color:#D3D3D3;">
        Detail Anggota
    </div>
    <div class="card-body">
    	<div class="row">
    		<div class="col-md-6">
    			<table class="table">
    				<tr>
    					<td>NIM</td>
    					<td>:</td>
    					<td><?php echo $data['nim'] ?></td>
    				</tr>
    				<tr>
    					<td>Nama</td>
    					<td>:</td>
    					<td><?php echo $data['nama_pengguna'] ?></td>
    				</tr>
    				<tr>
    					<td>Email</td>
    					<td>:</td>
    					<td><?php echo $data['email_pengguna'] ?></td>
    				</tr>
    				<tr>
    					<td>Jurusan</td>
    					<td>:</td>
    					<td><?php echo $data['jurusan'] ?></td>
    				</tr>
    				<tr>
    					<td>Semester</td>
    					<td>:</td>
    					<td><?php echo $data['semester'] ?></td>
    				</tr>
    			</table>
    		</div>
    		<div class="col-md-6">
    			<table class="table">
    				<tr>
    					<td>Kelas</td>
    					<td>:</td>
    					<td><?php echo $data['kelas'] ?></td>
    				</tr>
    				<tr>
    					<td>Telepon</td>
    					<td>:</td>
    					<td><?php echo $data['telepon_pengguna'] ?></td>
    				</tr>
    				<tr>
    					<td>Alamat</td>
    					<td>:</td>
    					<td><?php echo $data['alamat_pengguna'] ?></td>
    				</tr>
    				<tr>
    					<td>Tanggal Daftar</td>
    					<td>:</td>
    					<td><?php echo $data['tanggal_daftar'] ?></td>
    				</tr>
    			</table>
    		</div>
    	</div>
    </div>
</div>