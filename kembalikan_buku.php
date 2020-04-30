<?php 

	$id = $_GET['id'];
	$kode = $_GET['kode'];

	$dipinjam = $koneksi->query("UPDATE dipinjam SET status='dikembalikan' WHERE id_dipinjam='$id'");
	$buku = $koneksi->query("UPDATE buku SET jumlah_buku=(jumlah_buku+1) WHERE kode_buku='$kode'");

	if($dipinjam || $buku){
		?>
		<script type="text/javascript">
		alert('Buku berhasil dikembalikan');
		window.location.href="admin.php";
		</script>
		<?php
	}

 ?>