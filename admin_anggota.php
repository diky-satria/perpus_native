<div class="card">
    <div class="card-header" style="background-color:#D3D3D3;">
        Anggota
    </div>
    <div class="card-body">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                	<th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            	$no = 1;
                $query = $koneksi->query("SELECT * FROM pengguna WHERE role_pengguna = 'anggota'");
            	while($data = $query->fetch_assoc()){
             ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $data['nim'] ?></td>
                    <td><?php echo $data['nama_pengguna'] ?></td>
                    <td><?php echo $data['jurusan'] ?></td>
                    <td>
                        <a href="admin.php?halaman=admin_detail_anggota&id=<?php echo $data['id_pengguna'] ?>" class="btn btn-sm btn-primary">Detail</a>
                        <a href="admin.php?halaman=admin_ubah_anggota&id=<?php echo $data['id_pengguna'] ?>" class="btn btn-sm btn-success">Ubah</a>
                        <a onclick="return confirm('lanjutkan')" href="admin.php?halaman=admin_hapus_anggota&id=<?php echo $data['id_pengguna'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="admin.php?halaman=admin_tambah_anggota" class="btn btn-sm btn-primary mt-3">Tambah</a>
    </div>
</div>  