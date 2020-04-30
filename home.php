<?php include 'kode_pinjam.php'; ?>
<div class="container">
  <div class="row" style="margin-top:80px;">
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
  <!-- akhir form login -->
    <div class="col-md-9"></div>
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