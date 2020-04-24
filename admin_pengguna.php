<a href="admin.php?halaman=admin_dashboard" class="btn btn-sm btn-dark mb-3">Kembali</a>
<div class="card">
    <div class="card-header" style="background-color:#D3D3D3;">
        Petugas
    </div>
    <div class="card-body">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                	<th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th>Tanggal Daftar</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            	$no = 1;
                $query = $koneksi->query("SELECT * FROM pengguna WHERE role_pengguna != 'anggota'");
            	while($data = $query->fetch_assoc()){
             ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $data['nama_pengguna'] ?></td>
                    <td><?php echo $data['email_pengguna'] ?></td>
                    <td><?php echo $data['role_pengguna'] ?></td>
                    <td><?php echo $data['telepon_pengguna'] ?></td>
                    <td><?php echo $data['alamat_pengguna'] ?></td>
                    <td><?php echo date('d-M-Y H:i:s', strtotime($data['tanggal_daftar'])) ?></td>
                    <td>
                        <a href="admin.php?halaman=admin_ubah_pengguna&id=<?php echo $data['id_pengguna'] ?>" class="btn btn-sm btn-success">Ubah</a>
                        <a onclick="return confirm('lanjutkan')" href="admin.php?halaman=admin_hapus_pengguna&id=<?php echo $data['id_pengguna'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="admin.php?halaman=admin_tambah_pengguna" class="btn btn-sm btn-primary mt-3">Tambah</a>
    </div>
</div>  