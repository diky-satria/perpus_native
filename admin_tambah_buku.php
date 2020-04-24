<div class="row mb-3">
	<div class="col-md">
		<a href="admin.php?halaman=admin_buku" class="btn btn-sm btn-dark mb-3">Kembali</a>
		<div class="card">
			<div class="card-header" style="background-color:#D3D3D3;">
				Tambah Buku
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
					<form method="post">
						<div class="form-group">
							<label>Kode</label>
							<input type="text" name="kode" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Judul</label>
							<input type="text" name="judul" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Pengarang</label>
							<input type="text" name="pengarang" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Penerbit</label>
							<input type="text" name="penerbit" class="form-control" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Tahun Terbit</label>
							<input type="number" name="tahun" class="form-control" required>
						</div>
						<div class="form-group">
							<label>ISBN</label>
							<input type="text" name="isbn" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Jumlah</label>
							<input type="number" name="jumlah" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Lokasi</label>
							<select class="form-control" name="lokasi">
								<option disabled selected>-- Pilih Lokasi --</option>
								<option value="rak 1">Rak 1</option>
								<option value="rak 2">Rak 2</option>
								<option value="rak 3">Rak 3</option>
								<option value="rak 4">Rak 4</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md">
						<button type="submit" name="tambah" class="btn btn-sm btn-primary btn-block">Tambah</button>
					</div>
					</form>
				</div>
			</div>
		</div>						
	</div>				
</div>
<?php 
	
	if(isset($_POST['tambah'])){
		$kode = $_POST['kode'];
		$judul = $_POST['judul'];
		$pengarang = $_POST['pengarang'];
		$penerbit = $_POST['penerbit'];
		$tahun = $_POST['tahun'];
		$isbn = $_POST['isbn'];
		$jumlah = $_POST['jumlah'];
		$lokasi = $_POST['lokasi'];
		$query = $koneksi->query("INSERT INTO buku (kode_buku,judul_buku,pengarang,penerbit,tahun_terbit,isbn,jumlah_buku,lokasi) VALUES ('$kode','$judul','$pengarang','$penerbit','$tahun','$isbn','$jumlah','$lokasi')");
		if($query){
			?>
			<script type="text/javascript">
			alert('Buku berhasil ditambahkan');
			window.location.href="admin.php?halaman=admin_buku";
			</script>
			<?php
		}else{
			?>
			<script type="text/javascript">
			alert('Buku gagal ditambahkan');
			window.location.href="admin.php?halaman=admin_tambah_buku";
			</script>
			<?php
		}
	}
	
 ?>