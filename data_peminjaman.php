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
                    <th>Jumlah</th>
                    <th>Tgl Pinjam</th>
                    <th>Tgl Kembali</th>
                    <th style="color:red;">Denda</th>
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
                    <td><?php echo $data['total'] ?></td>
                    <td><?php echo $data['tgl_pinjam'] ?></td>
                    <td><?php echo $data['tgl_kembali'] ?></td>
                    <td style="color:red;">aadss</td>
                    <td>
                        <a href="admin.php?halaman=kembalikan_buku&kode=<?php echo $data['kode_peminjaman'] ?>" class="btn btn-sm btn-primary">Kembalikan</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>  