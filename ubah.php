<?php
session_start();
require 'function.php';

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

// ambil data dari url
$idPelanggan = $_GET['idPelanggan'];

// query data user berdasarkan id
$pelanggan = query("SELECT * FROM pelanggan WHERE idPelanggan =$idPelanggan")[0];

// if (isset($_SESSION["login"])) {
//   $idPelanggan = $_GET['idPelanggan'];
//   // ambil data dari tabel pelanggan
//   $pelanggan = query("SELECT * FROM pelanggan WHERE idPelanggan =$idPelanggan")[0];
// } else {
//   $pelanggan = null;
//   $idPelanggan = null;
// }

// var_dump($pelanggan);
// die;

if (isset($_POST["submit"])) {
  // var_dump($_POST);
  // die;

  // cek apakah data berhasil diUbah atau tidak
  if (ubah($_POST) > 0) {
    $switch = 1;
  } else {
    $switch = 0;
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
  <!-- font awesome -->
  <link rel="stylesheet" href="css/all.css">
  <!-- my bootstrap -->
  <link rel="stylesheet" href="css/style.css">
  <!-- datetimepicker -->
  <link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css">

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






  <!-- Ubah profile -->
  <section class="ubahProfile">
    <div class="container mt-5 mb-5">
      <div class="row text-center">
        <div class="col">
          <h3>UBAH PROFILE</h3>
          <img src="img/Line 7.png" class="mt-n1 mb-4">
        </div>
      </div>
      <form action="" method="POST">
        <div class="row justify-content-center">
          <div class="col-8">
            <div class="form-group">
              <input type="hidden" name="idPelanggan" value="<?= $pelanggan["idPelanggan"]; ?>">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="Masukkan email baru" value="<?php if (isset($pelanggan)) {
                                                                                                                            echo $pelanggan["email"];
                                                                                                                          } ?>" required>
              </div>
              <div class="form-row">
                <div class="form-group col">
                  <label for="password">Password</label>
                  <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan password baru" value="" required>
                </div>
                <div class="form-group col">
                  <label for="password2">Konfirmasi password</label>
                  <input type="password" name="password2" class="form-control" id="password2" placeholder="Masukkan password" value="" required>
                </div>
              </div>
              <label for="nama">Nama</label>
              <input type="text" name="nama" class="form-control" id="nama" value="<?= $pelanggan["nama"];
                                                                                    ?>" required>
            </div>
            <div class="form-group">
              <label for="nomor">Nomor Telepon</label>
              <input type="text" name="nomor" class="form-control" id="nomor" value="<?= $pelanggan["nomor"];
                                                                                      ?>" required>
            </div>
            <div class="form-group">
              <label for="alamatLengkap">Alamat Lengkap</label>
              <input type="text" name="alamatLengkap" class="form-control" id="alamatLengkap" value="<?= $pelanggan["alamatLengkap"];
                                                                                                      ?>" required>
            </div>
            <div class="form-group">
              <label for="kota">Kota</label>
              <select id="kota" name="kota" class="form-control" required>
                <option selected><?= $pelanggan["kota"] ?></option>
                <option>Tangerang</option>
                <option>Jakarta</option>
                <option>Bandung</option>
              </select>
            </div>

            <button type="submit" name="submit" class="btn btn-primary" style="background-color: #BA9031;">Ubah Profile</button>
          </div>
        </div>

      </form>
    </div>

  </section>
  <!-- Akhir booking -->






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
  <script src="http://maps.googleapis.com/maps/api/js"></script>

  <script>
    // fungsi initialize untuk mempersiapkan peta
    function initialize() {
      var propertiPeta = {
        center: new google.maps.LatLng(-8.5830695, 116.3202515),
        zoom: 9,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };

      var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
    }

    // event jendela di-load  
    google.maps.event.addDomListener(window, 'load', initialize);
  </script>

  <script src="js/sweetalert2.min.js"></script>
  <?php
  if ($switch === 1) {
    echo "<script>
  Swal.fire(
  'Profil berhasil diubah',
  '',
  'success'
  ) </script>";
  } elseif ($switch === 0) {
    echo
      "<script>Swal.fire({
  type: 'error',
  title: 'Profil gagal diubah',
  text: ''
  }) </script>";
  } else {
  }


  ?>

</body>

</html>