<?php 
	
	$tgl_pinjam = date('d-m-Y');
	$tgl_kembali = date('d-m-Y', time()+60*60*24*7);
	$kode = $_GET['kode'];
	$pengguna = $_SESSION['pengguna'];

 ?>
<div class="row">
		<div class="col-md-4">
		<form method="post">
			<div class="form-group">
				<label>Kode Peminjaman</label>
				<input type="text" name="kode_pinjam" value="<?php echo $kode ?>" class="form-control" readonly>
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
		</form>
		</div>
</div>

<div class="row">
	<div class="col-md-8">
		<div class="card mt-3">
			<div class="card-header" style="background-color:#99ff99;">
				Data Buku
			</div>
			<div class="card-body">
				<div class="container">
					<div class="row">
						<div class="col-md-4">
						<form method="post">
							<div class="form-group">
								<input type="text" class="form-control" name="kode_buku" autofocus required>
							</div>		
						</div>
						<div class="col-md-8">
							<button type="submit" name="tambahkan" class="btn btn-primary">Pinjam</button>
						</form>		
						</div>
					</div>
					<?php 

						if(isset($_POST['tambahkan'])){

							$kode_pinjam = $kode;
							$kode_buku = $_POST['kode_buku'];

							$qb = $koneksi->query("SELECT * FROM buku WHERE kode_buku = '$kode_buku'");
							$db = $qb->fetch_assoc();
							$kodeb = $db['kode_buku'];
							$judulb = $db['judul_buku'];
							$jumlah = 1;

							if($kodeb == $kode_buku){

								$sql_stok = $koneksi->query("SELECT * FROM buku WHERE kode_buku='$kode_buku'");
								while($data_stok = $sql_stok->fetch_assoc()){
									$stok = $data_stok['jumlah_buku'];

									if($stok <= 0){
										?>
										<script type="text/javascript">
										alert('Buku sedang kosong');
										window.location.href="admin.php?kode=<?php echo $kode ?>";
										</script>
										<?php
									}else{
										$pengguna = $pengguna['nama_pengguna'];

										$koneksi->query("INSERT INTO peminjaman (kode_pinjam,kode_buku,jumlah,petugas) VALUES ('$kode_pinjam','$kodeb','$jumlah','$pengguna')");
										$koneksi->query("UPDATE buku SET jumlah_buku=(jumlah_buku-1) WHERE kode_buku='$kodeb'");
									}
								}

							}else{
								?>
								<script type="text/javascript">
								alert('Barang tidak terdaftar');
								window.location.href="admin.php?kode=<?php echo $kode ?>";
								</script>
								<?php
							}
						}

					 ?>
					<div class="row">
						<div class="col-md">
							<table class="table">
								<thead>
									<tr>
										<th>No</th>
										<th>Kode</th>
										<th>Judul</th>
										<th>Jumlah</th>
										<th>Opsi</th>
									</tr>
								</thead>
								<tbody>
								<?php 
									$total = 0;
									$no = 1;
									$query = $koneksi->query("SELECT * FROM peminjaman JOIN buku ON peminjaman.kode_buku=buku.kode_buku WHERE peminjaman.kode_pinjam='$kode'");
									while($pinjam = $query->fetch_assoc()){
								 ?>
									<tr>
										<td><?php echo $no++ ?></td>
										<td><?php echo $pinjam['kode_buku']; ?></td>
										<td><?php echo $pinjam['judul_buku']; ?></td>
										<td><?php echo $pinjam['jumlah']; ?></td>
										<td>
											<a href="admin.php?halaman=kurang_peminjaman&id=<?php echo $pinjam['id_peminjaman'] ?>&kode_buku=<?php echo $pinjam['kode_buku'] ?>&kode_peminjaman=<?php echo $kode ?>&jumlah=<?php echo $pinjam['jumlah'] ?>" class="btn btn-sm btn-success">Kurang</a>
											<a href="admin.php?halaman=tambah_peminjaman&id=<?php echo $pinjam['id_peminjaman'] ?>&kode_buku=<?php echo $pinjam['kode_buku'] ?>&kode_peminjaman=<?php echo $kode ?>" class="btn btn-sm btn-success">Tambah</a>
											<a onclick="return confirm('Lanjutkan')" href="admin.php?halaman=hapus_peminjaman&id=<?php echo $pinjam['id_peminjaman'] ?>&kode_buku=<?php echo $pinjam['kode_buku'] ?>&kode_peminjaman=<?php echo $kode ?>&jumlah=<?php echo $pinjam['jumlah'] ?>" class="btn btn-sm btn-danger">Hapus</a>
										</td>
									</tr>
								<?php $total = $total+$pinjam['jumlah'] ?>
								<?php } ?>
									<tr>
										<th colspan="3" style="text-align:center;">Total Peminjaman</th>
										<td><?php echo $total ?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card mt-3 mb-5">
			<div class="card-header" style="background-color:#D3D3D3;">
				Data Peminjam Buku
			</div>
			<div class="card-body">
				<div class="row mb-2">
					<div class="col-md-9"></div>
					<div class="col-md-2">
					<form method="post">
						<input type="text" name="nim" class="form-control" placeholder="Nim Peminjam" required>
					</div>
					<div class="col-md-1">		
						<button type="submit" name="cari" class="btn btn-primary">Cari</button>
					</form>
					</div>
				</div>
				<?php 
					if(isset($_POST['cari'])){
						$nim = $_POST['nim'];
						$sql_cari = $koneksi->query("SELECT * FROM pengguna WHERE nim='$nim'");
						$cari = $sql_cari->fetch_assoc();
						$nim_p = $cari['nim'];
						if(!$cari){
							?>
							<script type="text/javascript">
							alert('NIM tidak terdaftar, silahkan daftar terlebih dahulu !');
							window.location.href="admin.php?kode=<?php echo $kode ?>";
							</script>
							<?php
						}else{
					}
				 ?>
				<form method="post">
				<div class="row">
					<div class="col-md-3">
						<label>NIM</label>
						<input type="text" name="nim_p" value="<?php echo $cari['nim'] ?>" class="form-control" readonly>
					</div>
					<div class="col-md-3">
						<label>Nama</label>
						<input type="text" name="nama" class="form-control" value="<?php echo $cari['nama_pengguna'] ?>" readonly>
					</div>
					<div class="col-md-3">
						<label>Jurusan</label>
						<input type="text" name="jurusan" class="form-control" value="<?php echo $cari['jurusan'] ?>" readonly>
					</div>
					<div class="col-md-3">
						<label>Semester</label>
						<input type="text" name="semester" value="<?php echo $cari['semester'] ?>" class="form-control" readonly>
					</div>
				</div>
				<div class="row">
					<div class="col-md">
						<button type="submit" name="pinjam" class="btn btn-block mt-3 btn-sm btn-success">Pinjam Sekarang</button>
					</div>
				</div>
				<?php } ?>
				</form>
			</div>
		</div>
		<?php 

			if(isset($_POST['pinjam'])){
				$ko_pinjam = $kode;
				$t_pinjam = $tgl_pinjam;
				$t_kembali = $tgl_kembali;
				$jum = $total;
				$nimnim = $_POST['nim_p'];
				$status = 'dipinjam';

				$cek = $koneksi->query("SELECT * FROM peminjaman WHERE kode_pinjam='$ko_pinjam'");
				$get = $cek->fetch_assoc();

				if($get){
					$query_peminjaman = $koneksi->query("INSERT INTO dipinjam (kode_peminjaman,tgl_pinjam,tgl_kembali,total,nim_peminjam,status) VALUES ('$ko_pinjam','$t_pinjam','$t_kembali','$jum','$nimnim','$status')");
					if($query_peminjaman){
						?>
						<script type="text/javascript">
						alert("Peminjaman Berhasil");
						window.location.href="admin.php?halaman=peminjaman&kode=<?php echo $ko_pinjam ?>";
						</script>
						<?php
					}else{
						?>
						<script type="text/javascript">
						alert("Peminjaman gagal");
						window.location.href="admin.php?kode=<?php echo $kode ?>";
						</script>
						<?php
					}		
				}else{
					?>
						<script type="text/javascript">
						alert("Anda belum memilih buku untuk dipinjam");
						window.location.href="admin.php?kode=<?php echo $kode ?>";
						</script>
						<?php
				}

			}

		 ?>
	</div>
</div>

