<?php 
  include 'kode_pinjam.php';
  error_reporting(0);
 ?>
<div class="container">
  <div class="row" style="margin:80px 0 80px 0;">
  <!-- form login -->
    <div class="col-md-3">
      <div class="card">
        <div class="card-header text-center" style="background-color:#D3D3D3;">
          Login
        </div>
        <div class="card-body">
          <form method="post">
            <div class="form-group">
              <input type="text" name="email" class="form-control" placeholder="Email ..." required>
            </div>
            <div class="form-group">
              <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
          <button type="submit" name="login" class="btn btn-sm btn-primary">Login</button>
          </form>
        </div>
      </div> 
    </div>
    <?php 

      if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = $koneksi->query("SELECT * FROM pengguna WHERE email_pengguna='$email' AND password_pengguna='$password'");
        $pengguna = $query->fetch_assoc();
        $email_pengguna = $pengguna['email_pengguna'];
        $password_pengguna = $pengguna['password_pengguna'];
        if($email == $email_pengguna AND $password == $password_pengguna){
          $_SESSION['pengguna'] = $pengguna;
          if($pengguna['role_pengguna'] == 'admin' || $pengguna['role_pengguna'] == 'petugas'){
            header('location:admin.php');   
          }else{
            header('location:admin.php?halaman=anggota_terdaftar');
          }
        }else{
          ?>
          <script type="text/javascript">
          alert('Email dan Password salah');
          window.location.href="index.php";
          </script>
          <?php
        }
      }
      
     ?>
  <!-- akhir form login -->
    <div class="col-md-9">
      <div class="row">
        <form class="form-inline my-2 my-lg-0 ml-2" method="post">
          <input class="form-control mr-sm-2" type="text" name="keyword" placeholder="cari buku">
          <button class="btn btn-sm btn-primary my-2 my-sm-0" type="submit" name="cari">Cari</button>
        </form> 
      </div>

      <div class="row mt-3">
      <?php 
          
          $keyword = $_POST['keyword'];
          if($keyword != '') { 
            $buku = $koneksi->query("SELECT * FROM buku
                                    WHERE judul_buku LIKE '%$keyword%'
                                    OR pengarang LIKE '%$keyword%'
                                    OR penerbit LIKE '%$keyword%'");

          }else{
            $buku = $koneksi->query("SELECT * FROM buku");
          } 

          if($data = $buku->num_rows){
            while($data = $buku->fetch_assoc()){
          
       ?>
        <div class="card mb-3 mx-2" style="max-width: 400px;">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="bootstrap4/foto_buku/<?php echo $data['foto'] ?>" class="card-img" style="height:100%;">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title"><?php echo $data['judul_buku'] ?></h5>
                <p class="card-text">Pengarang : <?php echo $data['pengarang'] ?></p>
                <p class="card-text">Penerbit : <?php echo $data['penerbit'] ?></p>
                <p class="card-text"><small class="text-danger">Sisa : <?php echo $data['jumlah_buku'] ?></small></p>
              </div>
            </div>
          </div>
        </div>
      <?php } 
          }else{
            echo "<div class='card mb-3 mx-2' style='width: 100%;'>
                    <div class='row no-gutters'>
                      <div class='col-md'>
                        <div class='card-body'>
                          <h5 class='card-title' style='color:red;'><center>Pencarian tidak ditemukan</center></h5>   
                        </div>
                      </div>
                    </div>
                  </div>";
        }?>

      </div>
    </div>

  </div>
</div>