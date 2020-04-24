<div class="container mt-4">
	<div class="row" style="margin-top:80px;">
		<div class="col-md">
	        <table id="example" class="table table-striped table-bordered" style="width:100%">
	            <thead>
	                <tr>
	                	<th>No</th>
	                    <th>NIM</th>
	                    <th>Nama</th>
	                    <th>Jurusan</th>
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
	                </tr>
	                <?php } ?>
	            </tbody>
	        </table> 
		</div>
	</div>
</div>