<?php
session_start();


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




  <!-- Carousel -->
  <section id="promo" class="promo">
    <div class="row text-center">
      <div class="col mt-4">
        <h3>ALUR BOOKING</h3>
        <img src="img/Line 7.png" class="mt-n1">
      </div>
    </div>
    <div id="carouselExampleCaptions" class="carousel slide mt-3" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/promo/photo-1590540d.png" class="d-block w-100" alt="">
          <div class="carousel-caption d-none d-md-block">
            <h5></h5>
            <p></p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/promo/reg.png" class="d-block w-100" alt="">
          <div class="carousel-caption d-none d-md-block">
            <h4>Langkah 1 & 2</h4>
            <p>Klik daftar dan isi data diri anda</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/promo/reg2.png" class="d-block w-100" alt="">
          <div class="carousel-caption d-none d-md-block">
            <h4>Langkah 3 & 4</h4>
            <p>Klik booking, sekarang hanya isi <br>Tanggal, jam dan Pilih kapstermu</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/promo/reg3.png" class="d-block w-100" alt="">
          <div class="carousel-caption d-none d-md-block">
            <h5>Klik buat booking dan tunggu kami datang</h5>

          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </section>
  <!-- Akhir carousel -->



  <!-- Kapster -->
  <section id="kapster" class="kapster">
    <div class="container">
      <div class="row text-center">
        <div class="col mt-5">
          <h3>KAPSTER</h3>
          <img src="img/Line 7.png" class="mt-n1 mb-3">
        </div>
      </div>
    </div>
    <div class="row kap">

    </div>

  </section>
  <!-- Akhir kapster -->




  <!-- Harga -->
  <section id="harga" class="harga-pangkas">
    <div class="container">
      <div class="row text-center">
        <div class="col mt-5">
          <h3>HARGA PANGKAS</h3>
          <img src="img/Line 7.png" class="mt-n1 mb-3">
        </div>
      </div>
      <div class="row">
        <div class="col-6 text-center jenis-1">
          <img src="img/harga/Group 9.png" alt="">
          <img src="img/harga/man.png" alt="">
          <img src="img/harga/50k R.png" alt="">
        </div>
        <div class="col-6 text-center jenis-2">
          <img src="img/harga/Group 10.png" alt="">
          <img src="img/harga/kids.png" alt="">
          <img src="img/harga/50k.png" alt="">
        </div>
      </div>
      <div class="row">
        <a href="booking.php" class="col text-center booking">
          <img src="img/btn-booking.png" class="btn-booking">
        </a>
      </div>
    </div>
  </section>
  <!-- akhir harga -->

  <?php  ?>

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
</body>

</html>