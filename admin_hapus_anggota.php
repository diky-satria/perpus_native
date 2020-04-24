<?php 

	$id = $_GET['id'];
	$sql = $koneksi->query("DELETE FROM pengguna WHERE id_pengguna='$id'");
	if($sql){
		?>
		<script type="text/javascript">
		window.location.href="admin.php?halaman=admin_anggota";
		</script>
		<?php
	}else{
		?>
		<script type="text/javascript">
		alert('Anggota gagal dihapus');
		window.location.href="admin.php?halaman=admin_anggota";
		</script>
		<?php
	}

 ?>