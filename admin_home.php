<?php 
	include 'kode_pinjam.php';
	$kode = $kodes;
	include 'function.php';
 ?>
<div class="row mb-3">
	<div class="col-md">
		<a href="admin.php?halaman=tambah_peminjam&kode=<?php echo $kode ?>" class="btn btn-sm btn-primary float-right">Tambah Peminjaman</a>
	</div>
</div>
<div class="row">
	<div class="col-md">
		<div class="card">
	    <div class="card-header" style="background-color:#D3D3D3;">
	        Data Peminjaman Buku
	    </div>
	    <div class="card-body">
	        <table id="example" class="table table-striped table-bordered" style="width:100%">
	            <thead>
	                <tr>
	                	<th>No</th>
	                	<th>Kode</th>
	                    <th>NIM</th>
	                    <th>Tgl Pinjam</th>
	                    <th>Tgl Kembali</th>
	                    <th style="color:red;">Terlambat + Denda</th>
	                    <th>Opsi</th>
	                </tr>
	            </thead>
	            <tbody>
	            <?php 
	            	$no = 1;
	                $query = $koneksi->query("SELECT * FROM dipinjam WHERE status='dipinjam'");
	            	while($data = $query->fetch_assoc()){
	             ?>
	                <tr>
	                    <td><?php echo $no++ ?></td>
	                    <td><?php echo $data['kode_peminjaman'] ?></td>
	                    <td><?php echo $data['nim_peminjam'] ?></td>
	                    <td><?php echo $data['tgl_pinjam'] ?></td>
	                    <td><?php echo $data['tgl_kembali'] ?></td>
	                    <td>
	                    <?php 
	                    	$denda = 1000;
	                    	$tgl_kembali = $data['tgl_kembali'];
	                    	$tgl_dateline = date('d-m-Y');
	                    	$hari = terlambat($tgl_kembali, $tgl_dateline);
	                    	$bayar = $hari*$denda;

	                    	if($hari>0){
	                    		echo "<font style='color:red;'>".$hari." hari <br> Rp. ".number_format($bayar, '0','.','.')."</font>";
	                    	}else{
	                    		echo "<font>".$bayar."</font>";
	                    	}
	                     ?>
	                    </td>
	                    
	                    <td>
	                    	<a href="admin.php?halaman=detail_peminjaman&kode=<?php echo $data['kode_peminjaman'] ?>&hari=<?php echo $hari ?>&denda=<?php echo $bayar ?>" class="btn btn-primary btn-sm">Detail</a>
	                        <a href="admin.php?halaman=kembalikan_buku&id=<?php echo $data['id_dipinjam'] ?>&kode=<?php echo $data['kode_buku'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('lanjutkan >>>')">Kembalikan</a>
	                        <a href="admin.php?halaman=perpanjang_buku&id=<?php echo $data['id_dipinjam'] ?>&hari=<?php echo $hari ?>" class="btn btn-success btn-sm" onclick="return confirm('lanjutkan perpanjangan peminjaman')">Perpanjang</a>
	                    </td>
	                </tr>
	                <?php } ?>
	            </tbody>
	        </table>
	    </div>
	</div>  
	</div>
</div>