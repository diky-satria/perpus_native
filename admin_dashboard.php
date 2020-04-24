<?php 
	
	//ambil data admin dan petugas
	$sql = $koneksi->query("SELECT * FROM pengguna WHERE role_pengguna != 'anggota'");
	$data = $sql->num_rows;

	//ambil data buku
	$sql_buku = $koneksi->query("SELECT * FROM buku");
	$data_buku = $sql_buku->num_rows;

 ?>
<div class="row">
	<div class="col-md-3">
	<!-- petugas -->
		<div class="card text-white dashboard-card" style="width: 18rem;">
			<a href="admin.php?halaman=admin_pengguna">
			  <div class="card-body bg-info">
			    <h5 class="card-title">Petugas</h5>
			    <div class="display-4"><?php echo $data ?></div>
			  </div>
			</a>
		</div>
	</div>
	<div class="col-md-3 ml-3">
		<!-- buku -->
		<div class="card text-white dashboard-card" style="width: 18rem;">
			<a href="admin.php?halaman=admin_buku">
			  <div class="card-body bg-secondary">
			    <h5 class="card-title">Buku</h5>
			    <div class="display-4"><?php echo $data_buku ?></div>
			  </div>
			</a>
		</div>
	</div>
	<div class="col-md-3">
		
	</div>
	<div class="col-md-3">
		
	</div>
</div>