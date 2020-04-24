<?php 

	$id = $_GET['id'];
	$query = $koneksi->query("DELETE FROM buku WHERE id_buku='$id'");
	if($query){
		?>
		<script type="text/javascript">
		alert('Buku berhasil dihapus');
		window.location.href="admin.php?halaman=admin_buku";
		</script>
		<?php
	}else{
		?>
		<script type="text/javascript">
		alert('Buku gagal dihapus');
		window.location.href="admin.php?halaman=admin_buku";
		</script>
		<?php
	}

 ?>