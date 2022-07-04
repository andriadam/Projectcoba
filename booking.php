<?php
session_start();
require 'function.php';

$total = 0;

$kapster = query("SELECT * FROM kapster");

$namaErr = $nmrErr = $alamatErr = $kotaErr = "";
$nama = $nmr = $alamat = $kota = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //Validasi input
  if (($_POST["nama"])) {
    $nama = test_input($_POST["nama"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z- ]*$/", $nama)) {
      $namaErr = "* Nama harus berupa huruf atau spasi";
    }
  }

  if (($_POST["nomor"])) {
    $nmr = test_input($_POST["nomor"]);
    // check if nmr only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/", $nmr)) {
      $nmrErr = "* Nomor harus berupa angka";
    };
  }


  if (strlen($_POST['alamatLengkap']) < 14) {
    $alamat = test_input($_POST["alamatLengkap"]);
    // check if alamat kurang dari 10 karakter
    $alamatErr = "* Alamat anda kurang lengkap";
  }

  if (($_POST["kota"])) {
    $kota = test_input($_POST["kota"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z]*$/", $kota)) {
      $kotaErr = "* Kota harus berupa huruf tanpa spasi";
    };
  }



  // apakah user sudah memencet booking
  if (isset($_POST["submit"])) {

    if ($namaErr === "" && $nmrErr === "" && $alamatErr === "" && $kotaErr === "") {
      if (tambah($_POST) > 0) {
        $switch = 1;
      } else {
        $switch = 0;
      }
    }
  }
}

if (isset($_COOKIE['idPelanggan']) && isset($_COOKIE['key'])) {

  $idPelanggan = $_COOKIE['idPelanggan'];
  // ambil data dari tabel pelanggan
  $pelanggan = query("SELECT * FROM pelanggan WHERE idPelanggan ='$idPelanggan'")[0];

  $kota = $pelanggan['kota'];

  $ongkir = query("SELECT * FROM ongkir WHERE kota LIKE '%$kota%'")[0];
} else {
  $pelanggan = null;
  $ongkir = null;
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
  <link rel="stylesheet" href="css/sweetalert2.min.css">


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



  <!-- Booking -->
  <section class="booking">
    <div class="container mt-5 mb-5">
      <div class="row text-center">
        <div class="col">
          <h3>Booking Sekarang</h3>
          <img src="img/Line 7.png" class="mt-n1 mb-4">
        </div>
      </div>
      <form action="" method="POST">
        <div class="row justify-content-center">
          <div class="col-8">
            <input type="hidden" name="idPelanggan" value="<?php if (isset($pelanggan)) {
                                                              echo $pelanggan["idPelanggan"];
                                                            } ?>">
            <div class="form-group row">

              <label for="nama" class="col-sm-3">Nama</label>
              <div class="col-sm-9">
                <input type="text" name="nama" class="form-control" id="nama" value="<?php if (isset($pelanggan)) {
                                                                                        echo $pelanggan["nama"];
                                                                                      } ?>" required>
                <span class="error text-danger"><?= $namaErr; ?></span>
              </div>
            </div>
            <div class="form-group row">
              <label for="nomor" class="col-sm-3">Nomor Telepon</label>
              <div class="col-sm-9">
                <input type="text" name="nomor" class="form-control" id="nomor" value="<?php if (isset($pelanggan)) {
                                                                                          echo $pelanggan["nomor"];
                                                                                        } ?>" required>
                <span class="error text-danger"><?= $nmrErr; ?></span>
              </div>
            </div>
            <div class="form-group row">
              <label for="datetimepicker" class="col-sm-3">Tanggal & waktu</label>
              <div class="col-sm-9">
                <input type="text" name="tanggalJam" class="form-control" id="datetimepicker" required autocomplete="off">
              </div>
            </div>
            <div class="form-group row">
              <label for="alamatLengkap" class="col-sm-3">Alamat Lengkap</label>
              <div class="col-sm-9">
                <input type="text" name="alamatLengkap" class="form-control" id="alamatLengkap" value="<?php if (isset($pelanggan)) {
                                                                                                          echo $pelanggan["alamatLengkap"];
                                                                                                        } ?>" required>
                <span class="error text-danger"><?= $alamatErr; ?></span>
              </div>
            </div>
            <div class="form-group row">
              <label for="kota" class="col-sm-3">Kota</label>
              <div class="col-sm-9">
                <select id="kota" name="kota" class="form-control" required>
                  <option class="bg-dark" selected><?php if (isset($pelanggan["kota"])) {
                                                      echo $pelanggan["kota"];
                                                    } else {
                                                      echo "";
                                                    }; ?></option>
                  <option class="bg-dark">Tangerang</option>
                  <option class="bg-dark">Jakarta</option>
                  <option class="bg-dark">Bandung</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="kapster" class="col-sm-3">Kapster<br>(Pencukur rambut)</label>
              <div class="col-sm-9">
                <select id="kapster" name="kapster" class="form-control" required>
                  <option class="bg-dark" selected></option>
                  <option class="bg-dark">1. Andri</option>
                  <option class="bg-dark">2. Adam</option>
                  <option class="bg-dark">3. Brian</option>
                  <option class="bg-dark">4. Smith</option>
                </select>
                <!-- Our kaps -->
                <section class="kaps">
                  <div class="container">
                    <div class="row">
                      <?php foreach ($kapster as $k) : ?>
                        <div class="col-6 col-sm-3 text-center mt-1">
                          <figure class="figure">
                            <img src="img/kapster/<?= $k['fotoKapster']; ?>" class="kaps figure-img img-fluid border-success">
                            <figcaption class="figure-caption">
                              <h5 class="mt-n1"><?= $k['namaKapster']; ?></h5>
                            </figcaption>
                          </figure>
                        </div>
                      <?php endforeach; ?>
                    </div>
                  </div>
                </section>
                <!-- Akhir kaps -->
              </div>
            </div>
            <div class="form-group row mt-n4">
              <h6 class="col-sm-9 offset-3">+Biaya perjalanan = Rp. <?= (isset($ongkir['tarif'])) ? $ongkir['tarif'] : 15; ?>.000</h6>
              <input type="hidden" name="ongkir" class="form-control" value="<?= (isset($ongkir['tarif'])) ? $ongkir['tarif'] : 15; ?>">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-8 offset-2 d-flex justify-content-center">
            <button type="submit" href="cobaya" name="submit" class="btn btn-block btn-primary col-sm-9 offset-3" style="background-color: #BA9031;" data-toggle="modal" data-target="#pembayaran-modal">Buat booking</button>
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
  <script src="js/jquery.datetimepicker.full.js"></script>
  <script>
    $('#datetimepicker').datetimepicker();
  </script>
  <script src="js/sweetalert2.min.js"></script>
  <?php

  if (isset($switch))
    if ($switch === 1) {
      echo "<script>
      Swal.fire(
        'Booking berhasil dibuat',
        'Silahkan menunggu barang tiba',
        'success'
      ) </script>";
    } elseif ($switch === 0) {
      echo
        "<script>Swal.fire({
        type: 'error',
        title: 'Booking gagal dibuat!',
        text: ''
      }) </script>";
    } else {
    }

  ?>
</body>

</html>