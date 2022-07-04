<?php
session_start();

require 'function.php';

// var_dump($_COOKIE["idPelanggan"]);
// die;

// ambil data dari url
$idProduk = $_GET["idProduk"];


// query data produk berdasarkan idProduk
$produk = query("SELECT * FROM produk WHERE idProduk = $idProduk")[0];

// apakah user sudah memencet beli
// if (isset($_POST["beli"])) {
//   if (!isset($_SESSION["login"])) {
//     header("Location: login.php");
//     exit;
//   }
//   if (beli($_POST) > 0) {
//     $switch = 1;
//   } else {
//     $switch = 0;
//   }
// }

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


  <style>
    /* registrasi */
    section.registrasi {
      font-family: 'mont';
    }

    /* single produk */
    .quantity {
      display: flex;
      justify-content: start;
    }

    .quantity button {
      width: 30px;
      height: 30px;
      /* border: 1px solid #000; */

      border-radius: 0;
      /* background: #fff; */
    }

    .quantity input {
      border: none;
      /* border-top: 1px solid #000;
      border-bottom: 1px solid #000; */
      text-align: center;
      width: 50px;
      height: 30px;
      font-size: 18px;
      color: #000;
      font-weight: 300;
    }

    .total-price {
      text-align: start;
      font-size: 24px;
      color: #fff;
    }
  </style>

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


  <!-- Breadcrumb -->
  <div class="container mt-4">
    <nav>
      <ol class="breadcrumb bg-transparent pl-0">
        <li class="breadcrumb-item"><a href="produk.php">Produk</a></li>
        <li class="breadcrumb-item active">Single Produk</li>
      </ol>
    </nav>
  </div>
  <!-- Akhir Breadcrumb -->


  <!-- Single Product -->
  <section class="single-product">
    <div class="container">
      <div class="row">




        <div class="col-lg-5">
          <figure class="figure-single">
            <img src="img/produk/<?= $produk["gambarProduk"]; ?>" class="figure-img img-fluid" style="width: 120%;">

          </figure>
        </div>

        <div class="col-lg-5 single-head">
          <h3><?= $produk["judulProduk"]; ?></h3>

          <h4 class="">IDR <?= $produk["hargaProduk"]; ?>000</h4>

          <form action="beli.php" method="GET">
            <input type="hidden" name="idProduk" value="<?= $produk['idProduk']; ?>">
            <div class="btn btn-sm btn-group quantity">
              <!-- <button class="btn-danger minus-btn disabled" type="button"><i class="fas fa-minus-circle"></i></button> -->
              <input type="number" name="jumlah" id="quantity" value="1" min="1" max="3">
              <!-- <button class="bg-primary plus-btn" type="button"><i class="fas fa-plus-circle"></i></button> -->
            </div>

            <p class="total-price ml-2">
              <span>Total Rp. </span>
              <span name="total" id="price"><?= $produk["hargaProduk"]; ?>000</span>

            </p>

            <?php if (isset($_SESSION['login'])) {
              echo "<input type='hidden' name='idPelanggan' value='" . $_COOKIE['idPelanggan'] . "'>";
            } ?>



            <button href="#" type="submit" name="beli" class="btn btn-block btn-success" style="font-size: 20px;">Beli sekarang</button>
            <a href="tambah.php?idProduk=<?= $produk["idProduk"]; ?>" class="btn btn-block btn-primary mt-3 " style="text-decoration: none;  color:white; font-size: 20px;">Tambah ke keranjang</a>


          </form>

        </div>
      </div>
    </div>
  </section>
  <!-- Akhir single product -->


  <!-- Modal -->
  <div class="modal fade" id="pembayaran-modal" tabindex="-1" role="alert" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content text-center">

        <div class="modal-body bg-dark">
          <img src="img/cart/sukses_checkout.png" class="mb-5">
          <h3>Pesanan berhasil dibuat</h3>
          <p>Silahkan lakukan pembayaran terlebih dahulu <br>
            ke nomor VA kami(BCA) : 10118792</p>
          <button type="button" class="btn btn-secondary mt-3 home w-50" data-dismiss="modal">Home</button>
        </div>
      </div>
    </div>
  </div>




  <!-- Product description -->
  <section class="product-description py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-10">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Review (27)</a>
            </li>
          </ul>
          <div class="tab-content p-4" id="myTabContent">
            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
              <p>Business value pada jaringan telekomunikasi yang mengatasi halangan geografis contoh
                e-businessnya adalah Business value pada jaringan telekomunikasi yang mengatasi mengatasi
                halangan geografis contoh e-business nya adalah halangan geografis contoh e-business nya
                Business value pada jaringan telekomunikasi yang mengatasi halangan geografis contoh
                e-businessnya adalah Business value pada jaringan telekomunikasi yang mengatasi mengatasi
                halangan geografis contoh e-business nya adalah halangan geografis contoh e-business nya
                Business value pada jaringan telekomunikasi yang mengatasi halangan geografis contoh
                e-businessnya adalah Business value pada jaringan telekomunikasi yang mengatasi mengatasi
              </p>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis magnam dolores facilis.
                Consectetur non dolorem dolor natus dolores recusandae molestias reprehenderit pariatur excepturi a
                impedit iste voluptates fugit, inventore temporibus.</p>
            </div>
            <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
              <div class="row mb-1">
                <div class="d-none d-md-block col-md-1">
                  <img src="img/review/2.png">
                </div>
                <div class="col">
                  <h5 class="mt-1 mb-0">Andri Adam</h5>
                  <p>Produk ini sangat jelek sekali untuk muka saya</p>
                </div>
              </div>
              <div class="row mb-1">
                <div class="d-none d-md-block col-md-1">
                  <img src="img/review/2.png">
                </div>
                <div class="col">
                  <h5 class="mt-1 mb-0">Andri Adam</h5>
                  <p>Produk ini sangat jelek sekali untuk muka saya</p>
                </div>
              </div>
              <div class="row mb-1">
                <div class="d-none d-md-block col-md-1">
                  <img src="img/review/2.png">
                </div>
                <div class="col">
                  <h5 class="mt-1 mb-0">Andri Adam</h5>
                  <p>Produk ini sangat jelek sekali untuk muka saya</p>
                </div>
              </div>
              <div class="row mb-1">
                <div class="d-none d-md-block col-md-1">
                  <img src="img/review/2.png">
                </div>
                <div class="col">
                  <h5 class="mt-1 mb-0">Andri Adam</h5>
                  <p>Produk ini sangat jelek sekali untuk muka saya</p>
                </div>
              </div>
              <div class="row mb-1">
                <div class="d-none d-md-block col-md-1">
                  <img src="img/review/2.png">
                </div>
                <div class="col">
                  <h5 class="mt-1 mb-0">Andri Adam</h5>
                  <p>Produk ini sangat jelek sekali untuk muka saya</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Akhir product description -->











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
  <script>
    //setting default attribute to disabled of minus button
    document.querySelector(".minus-btn").setAttribute("disabled", "disabled");

    //taking value to increment decrement input value
    var valueCount

    //taking price value in variable
    var price = document.getElementById("price").innerText;

    //price calculation function
    function priceTotal() {
      var total = valueCount * price;
      document.getElementById("price").innerText = total
    }

    //plus button
    document.querySelector(".plus-btn").addEventListener("click", function() {
      //getting value of input
      valueCount = document.getElementById("quantity").value;

      //input value increment by 1
      valueCount++;

      //setting increment input value
      document.getElementById("quantity").value = valueCount;

      if (valueCount > 1) {
        document.querySelector(".minus-btn").removeAttribute("disabled");
        document.querySelector(".minus-btn").classList.remove("disabled")
      }

      //calling price function
      priceTotal()
    })

    //plus button
    document.querySelector(".minus-btn").addEventListener("click", function() {
      //getting value of input
      valueCount = document.getElementById("quantity").value;

      //input value increment by 1
      valueCount--;

      //setting increment input value
      document.getElementById("quantity").value = valueCount

      if (valueCount == 1) {
        document.querySelector(".minus-btn").setAttribute("disabled", "disabled")
      }

      //calling price function
      priceTotal()
    })
  </script>
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
  <script src="js/all.js"></script>
  <script src="js/sweetalert2.min.js"></script>
  <?php

  if ($switch === 1) {
    echo "<script>
  Swal.fire(
  'Pesanan berhasil dibuat',
  'Silahkan menunggu barang tiba',
  'success'
  ) </script>";
  } elseif ($switch === 0) {
    echo
      "<script>Swal.fire({
  type: 'error',
  title: 'Pesanan gagal dibuat!',
  text: ''
  }) </script>";
  } else {
  }


  ?>


</body>

</html>


</body>

</html>