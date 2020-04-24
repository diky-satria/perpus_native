<?php 

	$id = $_GET['id'];
	$kode_buku = $_GET['kode_buku'];
	$kode_peminjaman = $_GET['kode_peminjaman'];


	$buku = $koneksi->query("SELECT * FROM buku WHERE kode_buku='$kode_buku'");
	$data = $buku->fetch_assoc();
	$jumlah = $data['jumlah_buku'];

	if($jumlah <= 0){
		?>
		<script type="text/javascript">
		alert('Stok buku kosong');
		window.location.href="admin.php?kode=<?php echo $kode_peminjaman ?>";
		</script>
		<?php
	}else{
		$query = $koneksi->query("UPDATE peminjaman SET jumlah=(jumlah+1) WHERE id_peminjaman='$id'");
		$qbuku = $koneksi->query("UPDATE buku SET jumlah_buku=(jumlah_buku-1) WHERE kode_buku='$kode_buku'");
		if($query || $qbuku){
			header("location:admin.php?kode=".$kode_peminjaman);
		}else{
			?>
			<script type="text/javascript">
			alert('Gagal menambahkan');
			window.location.href="admin.php?kode=<?php echo $kode_peminjaman ?>";
			</script>
			<?php
		}
		
	}


 ?>