<a href="admin.php?halaman=admin_dashboard" class="btn btn-sm btn-dark mb-3">Kembali</a>
<div class="card">
    <div class="card-header" style="background-color:#D3D3D3;">
        Riwayat Pengembalian
    </div>
    <div class="card-body">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                	<th>No</th>
                    <th>Kode</th>
                    <th>Peminjam</th>
                    <th>NIM</th>
                    <th>Buku</th>
                    <th>Kode Buku</th>
                    <th>Tgl pinjam</th>
                    <th>Tgl kembali</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            	$no = 1;
                $query = $koneksi->query("SELECT * FROM dipinjam 
                                            JOIN pengguna ON dipinjam.nim_peminjam=pengguna.nim
                                            JOIN buku ON dipinjam.kode_buku=buku.kode_buku
                                            WHERE dipinjam.status='dikembalikan' ORDER BY dipinjam.id_dipinjam DESC");
            	while($data = $query->fetch_assoc()){
             ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $data['kode_peminjaman'] ?></td>
                    <td><?php echo $data['nama_pengguna'] ?></td>
                    <td><?php echo $data['nim'] ?></td>
                    <td><?php echo $data['judul_buku'] ?></td>
                    <td><?php echo $data['kode_buku'] ?></td>
                    <td><?php echo $data['tgl_pinjam'] ?></td>
                    <td><?php echo $data['tgl_kembali'] ?></td>
                    <td>
                        <a onclick="return confirm('lanjutkan')" href="admin.php?halaman=admin_hapus_riwayat&id=<?php echo $data['id_dipinjam'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="admin.php?halaman=admin_tambah_buku" class="btn btn-sm btn-primary mt-3">Tambah</a>
    </div>
</div>  