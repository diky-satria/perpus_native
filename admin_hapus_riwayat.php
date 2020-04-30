<?php 

	$id = $_GET['id'];

	$sql = $koneksi->query("DELETE FROM dipinjam WHERE id_dipinjam='$id'");

	if($sql){
		?>
		<script type="text/javascript">
		alert('Riwayat peminjaman berhasil dihapus');
		window.location.href="admin.php?halaman=admin_riwayat_pengembalian";
		</script>
		<?php
	}

 ?>