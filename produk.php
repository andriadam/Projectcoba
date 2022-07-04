<?php
session_start();

require 'function.php';

// Pagination
// konfigurasi
$jumlahDataPerHalaman = 9;
$jumlahData = count(query("SELECT * FROM produk"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;


$produk = query("SELECT * FROM produk LIMIT $awalData, $jumlahDataPerHalaman");


if (isset($_POST["cari"])) {
  $produk = cari($_POST["keyword"]);
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



  <!-- Produk rambut -->
  <section id="produk" class="produk">
    <div class="container">
      <div class="row text-center">

        <div class="col mt-5">
          <h3>PRODUK RAMBUT</h3>
          <img src="img/Line 7.png" class="mt-n1 mb-3">
        </div>
      </div>

      <div class="row">

        <?php $i = 1; ?>
        <?php foreach ($produk as $row) : ?>
          <div class="col-4">
            <figure class="figure-similar">
              <div class="figure-img position-relative">
                <img src="img/produk/<?= $row["gambarProduk"]; ?>" class="figure-img img-fluid rounded">
                <a href="detail.php?idProduk=<?= $row["idProduk"]; ?>" class="position-absolute d-flex justify-content-center">
                  <img src="img/icon_plus@2x.png" class="align-self-center">
                </a>
              </div>
              <figcaption class="figure-caption">
                <div class="row">
                  <div class="col desk">
                    <h4><?= $row["judulProduk"]; ?></h4>
                    <p>Diskon <?= $row["diskonProduk"]; ?>%</p>
                  </div>
                  <div class="col d-flex align-items-center justify-content-end harga">
                    <p style="font-size: 20px;">RP. <?= $row["hargaProduk"]; ?>.000</p>
                  </div>
                </div>
              </figcaption>
            </figure>
          </div>
          <?php $i++; ?>
        <?php endforeach; ?>

      </div>


    </div>
    </div>
  </section>
  <!-- Akhir produk rambut -->


  <!-- Navigasi -->
  <section class="halaman mb-5">
    <div class="container">
      <div class="row">
        <div class="col">
          <nav aria-label="...">
            <ul class="pagination">
              <?php if ($halamanAktif > 1) : ?>
                <li class="page-item ">
                  <a class="page-link" href="?halaman=<?= $halamanAktif - 1; ?>">Previous</a>
                </li>
              <?php endif; ?>
              <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                <?php if ($i == $halamanAktif) : ?>
                  <li class="page-item active" aria-current="page">
                    <a class="page-link" href="?halaman=<?= $i ?>"><?= $i ?></a>
                  </li>
                <?php else : ?>
                  <li class="page-item">
                    <a class="page-link" href="?halaman=<?= $i ?>"><?= $i ?></a>
                  </li>
                <?php endif; ?>
              <?php endfor; ?>

              <?php if ($halamanAktif < $jumlahHalaman) : ?>
                <li class="page-item">
                  <a class="page-link" href="?halaman=<?= $halamanAktif + 1; ?>">Next</a>
                </li>
              <?php endif; ?>
            </ul>
          </nav>

        </div>

      </div>
    </div>

  </section>
  <!-- Akhir navigasi -->











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