<?php 

	$id = $_GET['id'];
	$kode_buku = $_GET['kode_buku'];
	$kode_peminjaman = $_GET['kode_peminjaman'];
	$jumlah = $_GET['jumlah'];

	$sql = $koneksi->query("DELETE FROM peminjaman WHERE id_peminjaman='$id'");
	$buku = $koneksi->query("UPDATE buku SET jumlah_buku=(jumlah_buku+$jumlah) WHERE kode_buku='$kode_buku'");
	if($sql || $buku){
		?>
		<script type="text/javascript">
		window.location.href="admin.php?kode=<?php echo $kode_peminjaman ?>";
		</script>
		<?php
	}else{
		?>
		<script type="text/javascript">
		alert('Buku gagal dihapus');
		window.location.href="admin.php?kode=<?php echo $kode_peminjaman ?>";
		</script>
		<?php
	}

 ?>