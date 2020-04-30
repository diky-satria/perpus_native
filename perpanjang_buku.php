<?php 

	$id = $_GET['id'];
	$hari = $_GET['hari'];
	$tgl_pinjam = date('d-m-Y');
	$tgl_kembali = date('d-m-Y', time()+60*60*24*7);

	if($hari>0){
		?>
		<script type="text/javascript">
		alert('Tidak bisa memperpanjang peminjaman! Kembalikan buku lalu pinjam lagi');
		window.location.href="admin.php";
		</script>
		<?php
	}else{
		$sql = $koneksi->query("UPDATE dipinjam SET tgl_pinjam='$tgl_pinjam', tgl_kembali='$tgl_kembali' WHERE id_dipinjam='$id'");
		?>
		<script type="text/javascript">
		alert('Buku berhasil diperpanjang');
		window.location.href="admin.php";
		</script>
		<?php
	}

 ?>