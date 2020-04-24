<?php 

	$nim = $_SESSION['pengguna']['nim'];

 ?>
<h4>Peminjaman Anda</h4>

<table class="table table-striped table-responsive mt-4">
	<thead>
		<tr>
			<th>No</th>
			<th>Kode Peminjaman</th>
			<th>Tanggal Pinjam</th>
			<th>Tanggal Kembali</th>
		</tr>
	</thead>
	<tbody>
	<?php 
		$no = 1;
		$query = $koneksi->query("SELECT * FROM dipinjam WHERE nim_peminjam='$nim'");
			while($data=$query->fetch_assoc()){

		 ?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><a href=""><?php echo $data['kode_peminjaman'] ?></a></td>
				<td><?php echo $data['tgl_pinjam'] ?></td>
				<td><?php echo $data['tgl_kembali'] ?></td>
			</tr>
		<?php } ?>
</table>