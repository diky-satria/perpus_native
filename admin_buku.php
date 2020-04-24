<a href="admin.php?halaman=admin_dashboard" class="btn btn-sm btn-dark mb-3">Kembali</a>
<div class="card">
    <div class="card-header" style="background-color:#D3D3D3;">
        Buku
    </div>
    <div class="card-body">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                	<th>No</th>
                    <th>Kode</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
                    <th>ISBN</th>
                    <th>Jumlah</th>
                    <th>Lokasi</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            	$no = 1;
                $query = $koneksi->query("SELECT * FROM buku");
            	while($data = $query->fetch_assoc()){
             ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $data['kode_buku'] ?></td>
                    <td><?php echo $data['judul_buku'] ?></td>
                    <td><?php echo $data['pengarang'] ?></td>
                    <td><?php echo $data['penerbit'] ?></td>
                    <td><?php echo $data['tahun_terbit'] ?></td>
                    <td><?php echo $data['isbn'] ?></td>
                    <td><?php echo $data['jumlah_buku'] ?></td>
                    <td><?php echo $data['lokasi'] ?></td>
                    <td>
                        <a href="admin.php?halaman=admin_ubah_buku&id=<?php echo $data['id_buku'] ?>" class="btn btn-sm btn-success">Ubah</a>
                        <a onclick="return confirm('lanjutkan')" href="admin.php?halaman=admin_hapus_buku&id=<?php echo $data['id_buku'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="admin.php?halaman=admin_tambah_buku" class="btn btn-sm btn-primary mt-3">Tambah</a>
    </div>
</div>  