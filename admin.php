<?php 
  session_start();
  if(!isset($_SESSION['pengguna'])){
    header('location:index.php');
  }
  include 'koneksi.php';
 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap4/css/style.css">
    <link rel="stylesheet" type="text/css" href="bootstrap4/css/admin.css">

    <title>Hello, world!</title>
  </head>
  <body>
    
    <!-- navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light" style="background-color:#BEBEBE;">
      <div class="container">
        <a class="navbar-brand">E-PUSTAKA</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <?php if($_SESSION['pengguna']['role_pengguna'] == 'admin'): ?>
              <li class="nav-item">
                <a class="nav-link" href="admin.php?halaman=admin_dashboard">Dashboard</a>
              </li>
            <?php endif; ?>
              <?php if($_SESSION['pengguna']['role_pengguna'] == 'admin' || $_SESSION['pengguna']['role_pengguna'] == 'petugas'): ?>
              <li class="nav-item">
                <a class="nav-link" href="admin.php">Peminjaman</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="admin.php?halaman=admin_anggota">Anggota</a>
              </li>
            <?php endif; ?>
              <li class="nav-item">
                <a class="nav-link" href="admin.php?halaman=anggota_terdaftar">Mahasiswa/i</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logout">Logout</a>
              </li>
            </ul>
            <ul class="navbar-nav text-align-right">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo $_SESSION['pengguna']['nama_pengguna'] ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Profil</a>
                  <a class="dropdown-item" href="#">Ubah Password</a>
                </div>
              </li>
            </ul>
          </div>
      </div>
    </nav>
    <!-- akhir navbar -->

    <!-- konten -->
    <div class="container mt-4">
      <div class="row" style="margin-top:70px;">
        <div class="col-md">
          <?php 

            if(isset($_GET['halaman'])){
              if($_GET['halaman'] == 'admin_dashboard'){
                if($_SESSION['pengguna']['role_pengguna'] == 'admin'){
                  include 'admin_dashboard.php'; 
                }else{
                  include 'anggota_terdaftar.php';
                }
              }
              if($_GET['halaman'] == 'admin_pengguna'){
                if($_SESSION['pengguna']['role_pengguna'] == 'admin'){
                  include 'admin_pengguna.php'; 
                }else{
                  include 'anggota_terdaftar.php';
                }
              }
              if($_GET['halaman'] == 'admin_tambah_pengguna'){
                if($_SESSION['pengguna']['role_pengguna'] == 'admin'){
                  include 'admin_tambah_pengguna.php'; 
                }else{
                  include 'anggota_terdaftar.php';
                }
              }
              if($_GET['halaman'] == 'admin_ubah_pengguna'){
                if($_SESSION['pengguna']['role_pengguna'] == 'admin'){
                  include 'admin_ubah_pengguna.php'; 
                }else{
                  include 'anggota_terdaftar.php';
                }
              }
              if($_GET['halaman'] == 'admin_hapus_pengguna'){
                if($_SESSION['pengguna']['role_pengguna'] == 'admin'){
                  include 'admin_hapus_pengguna.php'; 
                }else{
                  include 'anggota_terdaftar.php';
                }
              }
              if($_GET['halaman'] == 'admin_buku'){
                if($_SESSION['pengguna']['role_pengguna'] == 'admin'){
                  include 'admin_buku.php'; 
                }else{
                  include 'anggota_terdaftar.php';
                }
              }
              if($_GET['halaman'] == 'admin_tambah_buku'){
                if($_SESSION['pengguna']['role_pengguna'] == 'admin'){
                  include 'admin_tambah_buku.php'; 
                }else{
                  include 'anggota_terdaftar.php';
                }
              }
              if($_GET['halaman'] == 'admin_ubah_buku'){
                if($_SESSION['pengguna']['role_pengguna'] == 'admin'){
                  include 'admin_ubah_buku.php'; 
                }else{
                  include 'anggota_terdaftar.php';
                }
              }
              if($_GET['halaman'] == 'admin_hapus_buku'){
                if($_SESSION['pengguna']['role_pengguna'] == 'admin'){
                  include 'admin_hapus_buku.php'; 
                }else{
                  include 'anggota_terdaftar.php';
                }
              }
              if($_GET['halaman'] == 'admin_riwayat_pengembalian'){
                if($_SESSION['pengguna']['role_pengguna'] == 'admin'){
                  include 'admin_riwayat_pengembalian.php'; 
                }else{
                  include 'anggota_terdaftar.php';
                }
              }
              if($_GET['halaman'] == 'admin_hapus_riwayat'){
                if($_SESSION['pengguna']['role_pengguna'] == 'admin'){
                  include 'admin_hapus_riwayat.php'; 
                }else{
                  include 'anggota_terdaftar.php';
                }
              }
              if($_GET['halaman'] == 'admin_anggota'){
                if($_SESSION['pengguna']['role_pengguna'] == 'admin' || $_SESSION['pengguna']['role_pengguna'] == 'petugas'){
                  include 'admin_anggota.php'; 
                }else{
                  include 'anggota_terdaftar.php';
                }
              }
             if($_GET['halaman'] == 'admin_tambah_anggota'){
                if($_SESSION['pengguna']['role_pengguna'] == 'admin' || $_SESSION['pengguna']['role_pengguna'] == 'petugas'){
                  include 'admin_tambah_anggota.php'; 
                }else{
                  include 'anggota_terdaftar.php';
                }
              }
              if($_GET['halaman'] == 'admin_ubah_anggota'){
                if($_SESSION['pengguna']['role_pengguna'] == 'admin' || $_SESSION['pengguna']['role_pengguna'] == 'petugas'){
                  include 'admin_ubah_anggota.php'; 
                }else{
                  include 'anggota_terdaftar.php';
                }
              }
              if($_GET['halaman'] == 'admin_hapus_anggota'){
                if($_SESSION['pengguna']['role_pengguna'] == 'admin' || $_SESSION['pengguna']['role_pengguna'] == 'petugas'){
                  include 'admin_hapus_anggota.php'; 
                }else{
                  include 'anggota_terdaftar.php';
                }
              }
              if($_GET['halaman'] == 'admin_detail_anggota'){
                if($_SESSION['pengguna']['role_pengguna'] == 'admin' || $_SESSION['pengguna']['role_pengguna'] == 'petugas'){
                  include 'admin_detail_anggota.php'; 
                }else{
                  include 'anggota_terdaftar.php';
                }
              }
              if($_GET['halaman'] == 'kembalikan_buku'){
                if($_SESSION['pengguna']['role_pengguna'] == 'admin' || $_SESSION['pengguna']['role_pengguna'] == 'petugas'){
                  include 'kembalikan_buku.php'; 
                }else{
                  include 'anggota_terdaftar.php';
                }
              }
              if($_GET['halaman'] == 'tambah_peminjam'){
                if($_SESSION['pengguna']['role_pengguna'] == 'admin' || $_SESSION['pengguna']['role_pengguna'] == 'petugas'){
                  include 'tambah_peminjam.php'; 
                }else{
                  include 'anggota_terdaftar.php';
                }
              }
              if($_GET['halaman'] == 'perpanjang_buku'){
                if($_SESSION['pengguna']['role_pengguna'] == 'admin' || $_SESSION['pengguna']['role_pengguna'] == 'petugas'){
                  include 'perpanjang_buku.php'; 
                }else{
                  include 'anggota_terdaftar.php';
                }
              }
              if($_GET['halaman'] == 'detail_peminjaman'){
                if($_SESSION['pengguna']['role_pengguna'] == 'admin' || $_SESSION['pengguna']['role_pengguna'] == 'petugas'){
                  include 'detail_peminjaman.php'; 
                }else{
                  include 'anggota_terdaftar.php';
                }
              }
              if($_GET['halaman'] == 'anggota_terdaftar'){
                include 'anggota_terdaftar.php'; 
              }
              if($_GET['halaman'] == 'detail_peminjaman_anggota'){
                include 'detail_peminjaman_anggota.php'; 
              }
            }else{
              include 'admin_home.php';
            }

           ?>
        </div>
      </div>
    </div>
    <!-- akhir konten -->

    <!-- modal logout -->
    <!-- Modal -->
    <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            <a href="logout.php" class="btn btn-primary">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- akhir modal logout -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script scr="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script>
      $(document).ready(function() {
          $('#example').DataTable();
      } );
    </script>
    
  </body>
</html>