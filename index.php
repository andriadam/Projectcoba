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

  <!-- Jumbotron -->
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="row justify-content-center my-4">
            <img src="img/top bar/logo besar.png" alt="">
          </div>

          <h1>MEMBAWA <span>AHLI</span> PANGKAS RAMBUT <span>KERUMAH</span> ANDA</h1>

          <div class="row">
            <a href="booking.php" class="btn mx-auto mt-4">
              <img src="img/btn-booking.png" class="btn-booking">
            </a>
          </div>
        </div>

      </div>

    </div>
  </div>
  <!-- akhir Jumbotron -->


  <!-- Jadwal buka -->
  <section id="" class="buka">
    <div class="container">
      <div class="row kotak justify-content-center">
        <div class="col-sm-11 col-md-8 col-8 offset-2">
          <div class="row justify-content-center">
            <h2>BUKA JAM</h2>
          </div>
          <div class="row">
            <div class="line-s"></div>
          </div>
          <div class="row text-center jam">
            <div class="col">
              <p>Senin - Jumat</p>
              <p>10.00-21.00</p>
            </div>
            <div class="col">
              <p>Sabtu - Minggu</p>
              <p>8.00-18.00</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- akhir jadwal buka -->

  <!-- Mengapa -->
  <section id="why" class="mengapa my-5">
    <div class="container">
      <div class="row text-center">
        <div class="col">
          <h3>MENGAPA PILIH KAMI ?</h3>
          <img src="img/Line 7.png" class="mt-n1 line-title mb-4">
        </div>

      </div>
      <div class="row text-center icon">
        <div class="col justify-content-center why">
          <i class="fas fa-money-bill-wave " style="min-width: 95px;
          min-height: 95px;"></i>
          <br>
          <h5>Harga Terjangkau</h5>
          <p>Harga yang ditawarkan sangat terjangkau untuk semua kalangan.</p>
        </div>
        <div class="col justify-content-center why">
          <i class="fas fa-stopwatch" style="min-width: 95px;
          min-height: 95px;"></i>
          <h5>Tepat waktu</h5>
          <p>Kami akan datang kerumah anda dalam waktu yang cepat dan tepat waktu.</p>
        </div>
        <div class="col justify-content-center why">
          <i class="fas fa-briefcase-medical" style="min-width: 95px;
          min-height: 95px;"></i>
          <h5>Kebersihan</h5>
          <p>Kami selalu menjaga peralatan kami dalam keadaan bersih & steril peralatan yang kami gunakan.</p>
        </div>
        <div class="col justify-content-center why">
          <i class="far fa-handshake" style="min-width: 95px;
          min-height: 95px;"></i>
          <h5>Pelayanan</h5>
          <p>Konsumen seperti memiliki kapster pribadi, karena bebas dalam memilih kapsternya.</p>
        </div>
      </div>
    </div>
  </section>
  <!-- Akhir mengapa -->

  <!-- Carousel -->
  <section id="promo" class="promo">
    <div id="carouselExampleCaptions" class="carousel slide mt-5" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/promo/photo-1590540178859-647e3b7a70bd.png" class="d-block w-100" alt="">
          <div class="carousel-caption d-none d-md-block">
            <h5>Promo Spesial Tahun baru diskon 50%</h5>
            <p>20 Desember 2020 - 10 Januari 2021</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/promo/photo-1590540178859-647e3b7a70bd.png" class="d-block w-100" alt="">
          <div class="carousel-caption d-none d-md-block">
            <h5>Promo Spesial Tahun baru diskon 50%</h5>
            <p>20 Desember 2020 - 10 Januari 2021</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/promo/photo-1590540178859-647e3b7a70bd.png" class="d-block w-100" alt="">
          <div class="carousel-caption d-none d-md-block">
            <h5>Promo Spesial Tahun baru diskon 50%</h5>
            <p>20 Desember 2020 - 10 Januari 2021</p>
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


  <!-- Galeri -->
  <section id="galeri" class="galeri">
    <div class="container">
      <div class="row text-center">
        <div class="col mt-5">
          <h3>MELIHAT BAGAIMANA PELAYANAN KAMI</h3>
          <img src="img/Line 7.png" class="mt-n1 line-title mb-3">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
          <a href="#gambar-1">
            <img src="img/melihat/Mask Group 10.png" class="img-thumbnail">
          </a>
          <div class="overlay" id="gambar-1">
            <a href="#galeri" class="btn btn-danger position-absolute close">Close</a>
            <a href="#gambar-9">
              <img src="img/melihat/prev.png">
            </a>
            <img src="img/melihat/Mask Group 10.png" class="max">
            <a href="#gambar-2">
              <img src="img/melihat/next.png">
            </a>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
          <a href="#gambar-2">
            <img src="img/melihat/Mask Group 11.png" class="img-thumbnail">
          </a>
          <div class="overlay" id="gambar-2">
            <a href="#galeri" class="btn btn-danger position-absolute close">Close</a>
            <a href="#gambar-1">
              <img src="img/melihat/prev.png">
            </a>
            <img src="img/melihat/Mask Group 11.png" class="max">
            <a href="#gambar-3">
              <img src="img/melihat/next.png">
            </a>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
          <a href="#gambar-3">
            <img src="img/melihat/Mask Group 12.png" class="img-thumbnail">
          </a>
          <div class="overlay" id="gambar-3">
            <a href="#galeri" class="btn btn-danger position-absolute close">Close</a>
            <a href="#gambar-2">
              <img src="img/melihat/prev.png">
            </a>
            <img src="img/melihat/Mask Group 12.png" class="max">
            <a href="#gambar-4">
              <img src="img/melihat/next.png">
            </a>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
          <a href="#gambar-4">
            <img src="img/melihat/Mask Group 17.png" class="img-thumbnail ">
          </a>
          <div class="overlay" id="gambar-4">
            <a href="#galeri" class="btn btn-danger position-absolute close">Close</a>
            <a href="#gambar-3">
              <img src="img/melihat/prev.png">
            </a>
            <img src="img/melihat/Mask Group 17.png" class="max">
            <a href="#gambar-5">
              <img src="img/melihat/next.png">
            </a>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
          <a href="#gambar-5">
            <img src="img/melihat/Mask Group 18.png" class="img-thumbnail ">
          </a>
          <div class="overlay" id="gambar-5">
            <a href="#galeri" class="btn btn-danger position-absolute close">Close</a>
            <a href="#gambar-4">
              <img src="img/melihat/prev.png">
            </a>
            <img src="img/melihat/Mask Group 18.png" class="max">
            <a href="#gambar-6">
              <img src="img/melihat/next.png">
            </a>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
          <a href="#gambar-6">
            <img src="img/melihat/Mask Group 19.png" class="img-thumbnail ">
          </a>
          <div class="overlay" id="gambar-6">
            <a href="#galeri" class="btn btn-danger position-absolute close">Close</a>
            <a href="#gambar-5">
              <img src="img/melihat/prev.png">
            </a>
            <img src="img/melihat/Mask Group 19.png" class="max">
            <a href="#gambar-7">
              <img src="img/melihat/next.png">
            </a>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
          <a href="#gambar-7">
            <img src="img/melihat/Mask Group 20.png" class="img-thumbnail ">
          </a>
          <div class="overlay" id="gambar-7">
            <a href="#galeri" class="btn btn-danger position-absolute close">Close</a>
            <a href="#gambar-6">
              <img src="img/melihat/prev.png">
            </a>
            <img src="img/melihat/Mask Group 20.png" class="max">
            <a href="#gambar-8">
              <img src="img/melihat/next.png">
            </a>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
          <a href="#gambar-8">
            <img src="img/melihat/Mask Group 9.png" class="img-thumbnail ">
          </a>
          <div class="overlay" id="gambar-8">
            <a href="#galeri" class="btn btn-danger position-absolute close">Close</a>
            <a href="#gambar-7">
              <img src="img/melihat/prev.png">
            </a>
            <img src="img/melihat/Mask Group 9.png" class="max">
            <a href="#gambar-1">
              <img src="img/melihat/next.png">
            </a>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
  <!-- Akhir galeri -->

  <!-- Kata Mereka -->
  <section id="testimoni" class="kata-mereka mb-5">
    <div class="row text-center">
      <div class="col mt-5">
        <h3>KATA MEREKA</h3>
        <img src="img/Line 7.png" class="mt-n1 line-title mb-3">
      </div>
    </div>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="container">
            <div class="row">
              <div class="col-4">
                <div class="row">
                  <div class="col text-center">
                    <blockquote class="blockquote">
                      <p class="pt-4 pb-5">"Harga sangat terjangkau untuk mahasiswa"
                      </p>
                      <img src="img/kata/Mask Group 22.png" class="mb-2">
                      <p>Darwis Padli</p>
                      <p>Mahasiswa</p>
                    </blockquote>
                  </div>
                </div>
              </div>
              <div class="col-4">
                <div class="row">
                  <div class="col text-center">
                    <blockquote class="blockquote">
                      <p class="pt-4 pb-5">"Harga sangat terjangkau untuk mahasiswa"
                      </p>
                      <img src="img/kata/Mask Group 22.png" class="mb-2">
                      <p>Darwis Padli</p>
                      <p>Mahasiswa</p>
                    </blockquote>
                  </div>
                </div>
              </div>
              <div class="col-4">
                <div class="row">
                  <div class="col text-center">
                    <blockquote class="blockquote">
                      <p class="pt-4 pb-5">"Harga sangat terjangkau untuk mahasiswa"
                      </p>
                      <img src="img/kata/Mask Group 22.png" class="mb-2">
                      <p>Darwis Padli</p>
                      <p>Mahasiswa</p>
                    </blockquote>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="container">
            <div class="row">
              <div class="col-4">
                <div class="row">
                  <div class="col text-center">
                    <blockquote class="blockquote">
                      <p class="pt-4 pb-5">"Harga sangat terjangkau untuk mahasiswa"
                      </p>
                      <img src="img/kata/Mask Group 22.png" class="mb-2">
                      <p>Darwis Padli</p>
                      <p>Mahasiswa</p>
                    </blockquote>
                  </div>
                </div>
              </div>
              <div class="col-4">
                <div class="row">
                  <div class="col text-center">
                    <blockquote class="blockquote">
                      <p class="pt-4 pb-5">"Harga sangat terjangkau untuk mahasiswa"
                      </p>
                      <img src="img/kata/Mask Group 22.png" class="mb-2">
                      <p>Darwis Padli</p>
                      <p>Mahasiswa</p>
                    </blockquote>
                  </div>
                </div>
              </div>
              <div class="col-4">
                <div class="row">
                  <div class="col text-center">
                    <blockquote class="blockquote">
                      <p class="pt-4 pb-5">"Harga sangat terjangkau untuk mahasiswa"
                      </p>
                      <img src="img/kata/Mask Group 22.png" class="mb-2">
                      <p>Darwis Padli</p>
                      <p>Mahasiswa</p>
                    </blockquote>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="container">
            <div class="row">
              <div class="col-4">
                <div class="row">
                  <div class="col text-center">
                    <blockquote class="blockquote">
                      <p class="pt-4 pb-5">"Harga sangat terjangkau untuk mahasiswa"
                      </p>
                      <img src="img/kata/Mask Group 22.png" class="mb-2">
                      <p>Darwis Padli</p>
                      <p>Mahasiswa</p>
                    </blockquote>
                  </div>
                </div>
              </div>
              <div class="col-4">
                <div class="row">
                  <div class="col text-center">
                    <blockquote class="blockquote">
                      <p class="pt-4 pb-5">"Harga sangat terjangkau untuk mahasiswa"
                      </p>
                      <img src="img/kata/Mask Group 22.png" class="mb-2">
                      <p>Darwis Padli</p>
                      <p>Mahasiswa</p>
                    </blockquote>
                  </div>
                </div>
              </div>
              <div class="col-4">
                <div class="row">
                  <div class="col text-center">
                    <blockquote class="blockquote">
                      <p class="pt-4 pb-5">"Harga sangat terjangkau untuk mahasiswa"
                      </p>
                      <img src="img/kata/Mask Group 22.png" class="mb-2">
                      <p>Darwis Padli</p>
                      <p>Mahasiswa</p>
                    </blockquote>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

  </section>
  <!-- akhir kata -->


  <!-- Produk rambut -->
  <section id="produk" class="produk">
    <div class="container">
      <div class="row text-center">
        <div class="col">
          <span><a href="produk.php" class="d-flex justify-content-end align-text-top" style="margin-left: auto; font-size: 28px; color:white ">Lainnya &raquo;</a></span>
          <h3>PRODUK RAMBUT </h3>
          <img src="img/Line 7.png" class="mt-n1 line-title mb-3">
        </div>
      </div>
      <div class="row">
        <div class="col">
          <figure class="figure-similar">
            <div class="figure-img position-relative">
              <img src="img/produk/produk-1.png" class="figure-img img-fluid rounded">
              <a href="detail.php?idProduk=1" class="position-absolute d-flex justify-content-center">
                <img src="img/icon_plus@2x.png" class="align-self-center">
              </a>
            </div>
            <figcaption class="figure-caption">
              <div class="row">
                <div class="col desk">
                  <h4>Barbers</h4>
                  <p>Diskon 20%</p>
                </div>
                <div class="col d-flex align-items-center justify-content-end harga">
                  <p style="font-size: 20px;">RP. 80.000</p>
                </div>
              </div>
            </figcaption>
          </figure>
        </div>
        <div class="col">
          <figure class="figure-similar">
            <div class="figure-img position-relative">
              <img src="img/produk/produk-2.png" class="figure-img img-fluid rounded">
              <a href="detail.php?idProduk=2" class="position-absolute d-flex justify-content-center">
                <img src="img/icon_plus@2x.png" class="align-self-center">
              </a>
            </div>
            <figcaption class="figure-caption">
              <div class="row">
                <div class="col desk">
                  <h4>Apothecary</h4>
                  <p>Diskon 10%</p>
                </div>
                <div class="col d-flex align-items-center justify-content-end harga">
                  <p style="font-size: 20px;">RP. 180.000</p>
                </div>
              </div>
            </figcaption>
          </figure>
        </div>
        <div class="col">
          <figure class="figure-similar">
            <div class="figure-img position-relative">
              <img src="img/produk/produk-3.png" class="figure-img img-fluid rounded">
              <a href="detail.php?idProduk=3" class="position-absolute d-flex justify-content-center">
                <img src="img/icon_plus@2x.png" class="align-self-center">
              </a>
            </div>
            <figcaption class="figure-caption">
              <div class="row">
                <div class="col desk">
                  <h4>Uppercut</h4>
                  <p>Diskon 15%</p>
                </div>
                <div class="col d-flex align-items-center justify-content-end harga">
                  <p style="font-size: 20px;">RP. 150.000</p>
                </div>
              </div>
            </figcaption>
          </figure>
        </div>
      </div>
    </div>
    </div>
  </section>
  <!-- Akhir produk rambut -->



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