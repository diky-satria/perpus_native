<?php 
	$kode = $_GET['kode'];
	$query = $koneksi->query("SELECT * FROM dipinjam JOIN pengguna ON dipinjam.nim_peminjam=pengguna.nim WHERE dipinjam.kode_peminjaman='$kode'");
	$data = $query->fetch_assoc();
	if(!$data){
		?>
		<script type="text/javascript">
		window.location.href="admin.php?halaman=admin_anggota";
		</script>
		<?php
	}
 ?>
<div class="container">
	<div class="row">
		<div class="col-md">
			<a href="admin.php?halaman=data_peminjaman" class="btn btn-sm btn-dark mb-3">Kembali</a>	
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
								<th>No</th>
								<th>Kode</th>
								<th>Judul</th>
								<th>Jumlah</th>
								
							</tr>
						</thead>
						<tbody>
						<?php 
							$no =1;
							$sql = $koneksi->query("SELECT * FROM peminjaman JOIN buku ON peminjaman.kode_buku=buku.kode_buku JOIN dipinjam ON peminjaman.kode_pinjam=dipinjam.kode_peminjaman WHERE peminjaman.kode_pinjam='$kode'");
							while($sqld = $sql->fetch_assoc()){
						 ?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo $sqld['kode_buku'] ?></td>
								<td><?php echo $sqld['judul_buku'] ?></td>
								<td><?php echo $sqld['jumlah'] ?></td>
								
							</tr>
							<?php $tot = $sqld['total'] ?>
						<?php } ?>
							<tr>
								<th colspan="3" style="text-align:center;">Total Peminjaman</th>
								<td><?php echo $tot ?></td>
							</tr>
						</tbody>
					</table>
					<a href="admin.php?halaman=konfirmasi_kembalian_buku&kode_dipinjam=<?php echo $data['kode_peminjaman'] ?>&kode_buku=<?php echo $sqld['kode_buku'] ?>" onclick="return confirm('Harap pastikan kondisi buku tidak rusak dan jumlah buku sesuai dengan jumlah peminjaman')" class="btn btn-sm btn-success float-right">Konfirmasi Pengembalian</a>
				</div>
			</div>
		</div>