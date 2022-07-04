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

  <!-- Tentang -->

  <section class="tentang mb-4">
    <div class="container">
      <div class="row text-center">
        <div class="col mt-5">
          <h3>TENTANG KAMI</h3>
          <img src="img/Line 7.png" class="mt-n1 mb-3">
        </div>
      </div>
      <div class="row">
        <div class="col">

          <div class="accordion" id="accordionExample">
            <div class="card text-white bg-dark">
              <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <h5 class="card-title">Sejarah DCut</h5>
                  </button>
                </h2>
              </div>

              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                  <div class="row no-gutters">
                    <div class="col-md-4">
                      <img src="img/icon/logo.png" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim repellat sequi cupiditate quo eaque alias dolores suscipit ab odit assumenda officia facilis sit inventore quas dolorem voluptas unde, quaerat ullam! Commodi quaerat fugit itaque ad, quia eum recusandae non maiores dolorem molestiae! Commodi itaque temporibus ab aliquid adipisci quisquam voluptatum officiis doloremque neque iure? Incidunt reiciendis mollitia cum, labore explicabo repellendus unde magni nam aliquid ipsam molestias nulla in fuga quidem dolorum alias atque. Veniam, aliquid laborum excepturi modi amet sequi ipsa illum necessitatibus eligendi nobis odit itaque deserunt debitis porro, deleniti perferendis magnam. Dolores, praesentium aliquid. Pariatur, eveniet voluptatem.</p>
                        <p class="card-text"><small class="text-muted">28 Oktober 2020</small></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card text-white bg-dark">
            <div class="card-header" id="headingTwo">
              <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <h5 class="card-title">Profil pemilik</h5>
                </button>
              </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
              <div class="card-body">
                <div class="row no-gutters">
                  <div class="col-md-8">
                    <div class="card-body">
                      <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim repellat sequi cupiditate quo eaque alias dolores suscipit ab odit assumenda officia facilis sit inventore quas dolorem voluptas unde, quaerat ullam! Commodi quaerat fugit itaque ad, quia eum recusandae non maiores dolorem molestiae! Commodi itaque temporibus ab aliquid adipisci quisquam voluptatum officiis doloremque neque iure? Incidunt reiciendis mollitia cum, labore explicabo repellendus unde magni nam aliquid ipsam molestias nulla in fuga quidem dolorum alias atque. Veniam, aliquid laborum excepturi modi amet sequi ipsa illum necessitatibus eligendi nobis odit itaque deserunt debitis porro, deleniti perferendis magnam. Dolores, praesentium aliquid. Pariatur, eveniet voluptatem.</p>
                      <p class="card-text"><small class="text-muted">28 Oktober 2020</small></p>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <img src="img/icon/profile.jpg" class="card-img" alt="...">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card text-white bg-dark">
            <div class="card-header" id="headingThree">
              <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  <h5 class="card-title">Cabang-cabang kami</h5>
                </button>
              </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
              <div class="card-body">
                <div class="card-group">
                  <div class="card text-white bg-dark mb-3">
                    <img src="img/icon/cabang1.jpg" class="card-img-top" alt="img/icon/profile.jpg">
                    <div class="card-body">
                      <h5 class="card-title">Tangerang</h5>
                      <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta veritatis nesciunt tempore beatae perspiciatis repudiandae dolorum sed, fugiat mollitia nam. Corporis vitae quia impedit dicta fuga! Possimus deserunt dolores rem.</p>
                    </div>
                    <div class="card-footer">
                      <small class="text-muted">28 Oktober 2020</small>
                    </div>
                  </div>
                  <div class="card text-white bg-dark mb-3">
                    <img src="img/icon/cabang2.jpg" class="card-img-top" alt="img/icon/profile.jpg">
                    <div class="card-body">
                      <h5 class="card-title">Jakarta</h5>
                      <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita quaerat culpa soluta suscipit asperiores minima nam, nihil, ab provident, illum consequuntur dolorum. Ipsum non beatae voluptates, omnis fugiat praesentium dignissimos.</p>
                    </div>
                    <div class="card-footer">
                      <small class="text-muted">28 Oktober 2020</small>
                    </div>
                  </div>
                  <div class="card text-white bg-dark mb-3">
                    <img src="img/icon/cabang3.jpg" class="card-img-top" alt="img/icon/profile.jpg">
                    <div class="card-body">
                      <h5 class="card-title">Bandung</h5>
                      <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime obcaecati blanditiis a veniam eos, at neque? Blanditiis harum facere laudantium saepe, quo non ratione nulla perferendis ex, ullam at assumenda.</p>
                    </div>
                    <div class="card-footer">
                      <small class="text-muted">28 Oktober 2020</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    </div>
    </div>
  </section>
  <!-- Akhir tentang -->

  <!-- Lokasi & Kontak -->
  <section id="kontak" class="lokasi">
    <div class="container">
      <div class="row text-center">
        <div class="col mt-5">
          <h3>LOKASI & KONTAK</h3>
          <img src="img/Line 7.png" class="mt-n1 line-title mb-3">
        </div>
      </div>
      <div class="row">
        <div class="col text-center">
          <p><span>
              <i class="fas fa-map-marker-alt mr-2"></i> JL.Faliman jaya, Tangerang
            </span>
            <span>
              <i class="fas fa-envelope  mr-2"></i> Andriadam2792000@gmail.com
            </span>
            <span>
              <i class="fas fa-phone-alt  mr-2"></i>089602748612
            </span>
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-10 offset-sm-1 col-md-6 offset-md-3 col-8 offset-2">
          <div id="googleMap" style="width:100%;height:380px;"></div>
        </div>
      </div>
    </div>
  </section>
  <!-- akhir lokasi -->



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