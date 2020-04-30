<?php 
	$kode = $_GET['kode'];
	$denda = $_GET['denda'];
	$hari = $_GET['hari'];
	$query = $koneksi->query("SELECT * FROM dipinjam
							 JOIN pengguna ON dipinjam.nim_peminjam=pengguna.nim
							 JOIN buku ON dipinjam.kode_buku=buku.kode_buku
							 WHERE dipinjam.kode_peminjaman='$kode'");
	$data = $query->fetch_assoc();
	if(!$data){
		?>
		<script type="text/javascript">
		window.location.href="admin.php?halaman=anggota_terdaftar";
		</script>
		<?php
	}
 ?>
<div class="container">
	<div class="row">
		<div class="col-md">
			<a href="admin.php?halaman=anggota_terdaftar" class="btn btn-dark btn-sm">Kembali</a>	
		</div>
	</div>
	<div class="row">
		<div class="col-md text-center"><h4>Detail Peminjaman</h4></div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<table class="table table-sm">
				<tr>
					<td>Kode Peminjaman</td>
					<td>:</td>
					<td><?php echo $data['kode_peminjaman'] ?></td>
				</tr>
				<tr>
					<td>Petugas</td>
					<td>:</td>
					<td><?php echo $data['petugas'] ?></td>
				</tr>
				<tr>
					<td>Tanggal Pinjam</td>
					<td>:</td>
					<td><?php echo $data['tgl_pinjam'] ?></td>
				</tr>
				<tr>
					<td>Tanggal Kembali</td>
					<td>:</td>
					<td><?php echo $data['tgl_kembali'] ?></td>
				</tr>
			</table>
		</div>
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
			<table class="table table-sm">
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
	</div>
</div>

		<div class="container">
			
			<div class="row">
				<div class="col-md">
					<table class="table">
						<thead>
							<tr>
								<th>Kode Buku</th>
								<th>Judul</th>
								<th>Terlambat + Denda</th>	
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $data['kode_buku'] ?></td>
								<td><?php echo $data['judul_buku'] ?></td>
								<td><font style='color:red;'><?php echo $hari ?> hari <br>Rp. <?php echo number_format($denda, '0','.','.') ?></font></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>