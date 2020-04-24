<?php 

	$id = $_GET['id'];
	$kode_buku = $_GET['kode_buku'];
	$kode_peminjaman = $_GET['kode_peminjaman'];
	$jumlah = $_GET['jumlah'];

	if($jumlah <= 1){
		?>
		<script type="text/javascript">
		alert('Jumlah buku yang ingin dipinjam tidak boleh kosong');
		window.location.href="admin.php?kode=<?php echo $kode_peminjaman ?>";
		</script>
		<?php
	}else{
		$koneksi->query("UPDATE peminjaman SET jumlah=(jumlah-1) WHERE id_peminjaman='$id'");
		$koneksi->query("UPDATE buku SET jumlah_buku=(jumlah_buku+1) WHERE kode_buku='$kode_buku'");
		header("location:admin.php?kode=".$kode_peminjaman);
	}

 ?>