<?php 

	include 'function.php';
	$nim = $_SESSION['pengguna']['nim'];

 ?>
<h4>Peminjaman Anda</h4>

<table class="table table-striped table-responsive mt-4">
	<thead>
		<tr>
			<th>No</th>
			<th>Terlambat + Denda</th>
			<th>Kode Peminjaman</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	if($nim){
		$no = 1;
		$query = $koneksi->query("SELECT * FROM dipinjam WHERE nim_peminjam='$nim' AND status='dipinjam'");
			while($data=$query->fetch_assoc()){

		 ?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td>
                <?php 
                	$denda = 1000;
                	$tgl_kembali = $data['tgl_kembali'];
                	$tgl_dateline = date('d-m-Y');
                	$hari = terlambat($tgl_kembali, $tgl_dateline);
                	$bayar = $hari*$denda;

                	if($hari>0){
                		echo "<font style='color:red;'>".$hari." hari <br> Rp. ".number_format($bayar, '0','.','.')."</font>";
                	}else{
                		echo "<font>".$bayar."</font>";
                	}
                 ?>
                </td>
				<td><a href="admin.php?halaman=detail_peminjaman_anggota&kode=<?php echo $data['kode_peminjaman'] ?>&hari=<?php echo $hari ?>&denda=<?php echo $bayar ?>"><?php echo $data['kode_peminjaman'] ?></a></td>
			</tr>
		<?php } ?>
	<?php }else{?>
		<tr>
			<td colspan="4"><center><h3>Kosong</h3></center></td>	
		</tr>
		<?php } ?>
</table>