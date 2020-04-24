<?php 

	$id = $_GET['id'];
	$query = $koneksi->query("DELETE FROM pengguna WHERE id_pengguna='$id'");
	if($query){
		?>
		<script type="text/javascript">
		alert('Petugas berhasil dihapus');
		window.location.href="admin.php?halaman=admin_pengguna";
		</script>
		<?php
	}else{
		?>
		<script type="text/javascript">
		alert('Petugas gagal dihapus');
		window.location.href="admin.php?halaman=admin_pengguna";
		</script>
		<?php
	}

 ?>