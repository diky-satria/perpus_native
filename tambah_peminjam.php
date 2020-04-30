<?php 
	$kode = $_GET['kode'];
	$tgl_pinjam = date('d-m-Y');
	$tgl_kembali = date('d-m-Y', time()+60*60*24*7);
	$petugas = $_SESSION['pengguna']['nama_pengguna'];
 ?>
<div class="row mb-3">
	<div class="col-md">
		<a href="admin.php" class="btn btn-sm btn-dark">Kembali</a>
	</div>
</div>
<div class="row">
	<div class="col-md">
		<div class="card">
	    <div class="card-header" style="background-color:#D3D3D3;">
	        Tambah Data Peminjaman
	    </div>
	    <div class="card-body">
		    <div class="row">
		    	<div class="col-md-4"> 
		    	<form method="post">
		        	<div class="form-group">
		        		<label>Kode Peminjaman</label>
		        		<input type="text" name="kode" value="<?php echo $kode ?>" class="form-control" readonly>
		        	</div>
		    	</div>
		    	<div class="col-md-4">
		    		<div class="form-group">
		        		<label>Tanggal Pinjam</label>
		        		<input type="text" name="tgl_pinjam" value="<?php echo $tgl_pinjam ?>" class="form-control" readonly>
		        	</div>
		    	</div>
		    	<div class="col-md-4">
		    		<div class="form-group">
		        		<label>Tanggal Kembali</label>
		        		<input type="text" name="tgl_kembali" value="<?php echo $tgl_kembali ?>" class="form-control" readonly>
		        	</div>
		    	</div>
		    </div>
		    <div class="row">
		    	<div class="col-md-4">
		        	<div class="form-group">
		        		<label>Judul Buku</label>
		        		<select name="buku"id="buku_peminjam" class="form-control" required>
		        			<option value="0" disabled selected>-- Pilih Buku --</option>
		        			<?php 
		        				$query = $koneksi->query("SELECT * FROM buku ORDER BY judul_buku ASC");
		        				while($buku = $query->fetch_assoc()){
		        			 ?>
		        			<option value="<?php echo $buku['kode_buku'] ?>"><?php echo $buku['kode_buku'] ?>&nbsp;&nbsp;&nbsp;<?php echo $buku['judul_buku'] ?></option>
		        			<?php } ?>
		        		</select>
		        	</div>
		    	</div>
		    	<div class="col-md-4">
		    	</div>
		    	<div class="col-md-4">
		    		<div class="form-group">
		        		<label>Nama Peminjam</label>
		        		<select name="nim" id="nim_peminjam" class="form-control" required>
		        			<option value="0" disabled selected>-- Pilih Nama --</option>
		        			<?php 
		        				$queryb = $koneksi->query("SELECT * FROM pengguna WHERE role_pengguna='anggota' ORDER BY nama_pengguna ASC");
		        				while($data = $queryb->fetch_assoc()){
		        			 ?>
		        			<option value="<?php echo $data['nim'] ?>"><?php echo $data['nim'] ?>&nbsp;&nbsp;&nbsp;<?php echo $data['nama_pengguna'] ?></option>
		        			<?php } ?>
		        		</select>
		        	</div>
		    	</div>
		    </div>
		    <div class="row">
		    	<div class="col-md">
		    		<button type="submit" name="pinjam" id="tombol" class="btn btn-sm btn-primary btn-block">Pinjam Sekarang</button>
		    	</div>
		        </form>
		    </div>
	    </div>
	</div>  
	</div>
</div>
<?php 

	if(isset($_POST['pinjam'])){
		$kodep = $_POST['kode'];
		$tgl_pinjam = $_POST['tgl_pinjam'];
		$tgl_kembali = $_POST['tgl_kembali'];
		$buku = $_POST['buku'];
		$nim = $_POST['nim'];
		$status = 'dipinjam';
		$sql = $koneksi->query("INSERT INTO dipinjam (kode_peminjaman,petugas,tgl_pinjam,tgl_kembali,kode_buku,nim_peminjam,status) VALUES ('$kodep','$petugas','$tgl_pinjam','$tgl_kembali','$buku','$nim','$status')");
		$sql2 = $koneksi->query("UPDATE buku SET jumlah_buku=(jumlah_buku-1) WHERE kode_buku='$buku'");
		if($sql || $sql2){
			?>
			<script type="text/javascript">
			alert('Buku berhasil dipinjam');
			window.location.href="admin.php";
			</script>
			<?php
		}else{
			?>
			<script type="text/javascript">
			alert('Buku gagal dipinjam');
			window.location.href="admin.php?halaman=tambah_peminjam&kode=<?php echo $kode ?>";
			</script>
			<?php
		}
	}

 ?>