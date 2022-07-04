<?php
session_start();
require 'function.php';


if (isset($_POST["registrasi"])) {

  if (registrasi($_POST) > 0) {
    echo "<script>
     alert('Registrasi berhasil !');
     document.location.href='index.php' </script>";
  } else {
    echo mysqli_error($conn);
  }
}

?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/all.css">
  <link rel="stylesheet" href="css/style.css">

  <title>Project</title>
</head>

<body id="home">
  <!-- Top bar -->
  <nav class="navbar navbar-expand-lg sticky-top" id="top-bar" style="background-color: #202020;">

    <img src="img/top bar/logo kecil.png" class="mr-2">
    <a class="navbar-brand d-flex" href="#">DCut</a>
    <button class="navbar-toggler btn-light" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <div class="container d-flex justify-content-between">
        <ul class="navbar-nav ml-auto d-flex">
          <li class="nav-item mr-4">
            <a class="nav-link page-scroll" href="index.php">BERANDA</a>
          </li>
          <li class="nav-item mr-4">
            <a class="nav-link page-scroll" href="alur.php">ALUR BOOKING</a>
          </li>
          <li class="nav-item mr-4">
            <a class="nav-link page-scroll" href="produk.php">PRODUK RAMBUT</a>
          </li>
          <li class="nav-item mr-4">
            <a class="nav-link page-scroll" href="tentang.php">TENTANG KAMI</a>
          </li>
          <?php if (isset($_SESSION['keranjang'])) {
            echo "<li class='nav-item mr-4'>
            <a class='nav-link page-scroll' href='keranjang.php'><i class='fas fa-shopping-cart'></i></a>
          </li>";
          } ?>
        </ul>
      </div>
      <div class="navbar-nav btn-group btn" style="font-size: 16px;">
        <a href="registrasi.php" class="btn" style="background-color: #BA9031;">Daftar</a>
        <a href="login.php" class="btn" style="background-color: #BA9031;">Login</a>
        <?php if (isset($_SESSION['login'])) {
          echo "<a href='logout.php' class='btn btn-danger' id='option2'><i class='fas fa-sign-out-alt'></i></a>";
          echo "<a href='ubah.php?idPelanggan=" . $_COOKIE['idPelanggan'] . "'" . "class='btn btn-info' id='option2'><i class='fas fa-cog'></i></a>";
        } ?>
      </div>

    </div>
  </nav>
  <!-- Akhir top bar -->


  <!-- Registrasi -->
  <section class="registrasi my-5">
    <div class="container ">
      <div class="row text-center">
        <div class="col">
          <h3>Registrasi</h3>
          <img src="img/Line 7.png" class="mt-n1 mb-3">
        </div>
      </div>
      <div class="row">
        <div class="col-8 offset-2">
          <form action="" method="POST">

            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" name="email" class="form-control" id="email" placeholder="Masukkan email" required>
            </div>

            <div class="form-row">
              <div class="form-group col">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan password" required>
              </div>

              <div class="form-group col">
                <label for="password2">Konfirmasi password</label>
                <input type="password" name="password2" class="form-control" id="password2" placeholder="Masukkan password" required>
              </div>
            </div>

            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan nama anda" required>
            </div>
            <div class="form-group">
              <label for="nomor">Nomor</label>
              <input type="text" name="nomor" class="form-control" id="nomor" placeholder="Masukkan nomor anda" required>
            </div>
            <div class="form-group">
              <label for="alamatLengkap">Alamat Lengkap</label>
              <input type="text" name="alamatLengkap" class="form-control" id="alamatLengkap" placeholder="Masukkan alamat anda" required>
            </div>

            <div class="form-group ">
              <label for="kota">Kota</label>
              <select id="kota" name="kota" class="form-control" required>
                <option selected>-pilih kota-</option>
                <option>Tangerang</option>
                <option>Jakarta</option>
                <option>Bandung</option>
              </select>
            </div>

            <button type="submit" name="registrasi" class="btn" style="background-color: #BA9031; color: white;">Registrasi</button>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- Akhir registrasi -->




  <!-- Footer -->
  <footer class="p-5">
    <div class="container">
      <div class="row justify-content-between mb-1">
        <div class="col-1">
          <a href="">
            <img src="img/footer/logo-footer.png">
          </a>
        </div>
        <div class="col-4 text-right">
          <p>IKUTI KAMI DI : </p>
          <a href="">
            <img src="img/footer/fb-footer.png" class="ml-2">
          </a>
          <a href="">
            <img src="img/footer/ig-footer.png" class="ml-2">
          </a>
          <a href="">
            <img src="img/footer/tw-footer.png" class="ml-2">
          </a>
        </div>
      </div>
      <div class="row justify-content-between mt-3">
        <div class="col-5 ml-n1">
          <p class="all-right mt-n4">All Rights Reserved by <span class="adam-store">Andri Adam</span> Copyright 2020.
          </p>
        </div>

        <div class="col"></div>
      </div>
    </div>
  </footer>
  <!-- Akhir footer -->














  <!-- wa -->
  <a href="https://api.whatsapp.com/send?phone=6289602748612&amp&text=Halo%20kak%2C%20selamat%20datang%20di%20DCut%20mau%20booking?%20silahkan%20Chat%20" class="wa btn-success">
    <img src="img/wa.png">
  </a>
  <!-- akhir wa -->

  <!-- top -->
  <a href="#home" class="top page-scroll">
    <img src="img/top.png" alt="">
  </a>
  <!-- akhir top -->





  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
  <script src="js/all.js"></script>

</body>

</html>