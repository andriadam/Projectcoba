<?php
session_start();
require 'function.php';
// if ($_SESSION["login"] != null) {
//   header("Location: login.php");
//   exit;
// }

// ambil data dari url



$idPelanggan = $_COOKIE['idPelanggan'];

// query data user berdasarkan id
$pelanggan = query("SELECT * FROM pelanggan WHERE idPelanggan =$idPelanggan")[0];
// echo "<pre>";
// print_r($pelanggan);
// echo "</pre>";
// die;
$kota = $pelanggan['kota'];

$ongkir = query("SELECT * FROM ongkir WHERE kota LIKE '%$kota%'")[0];


$total = 0;

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



  // apakah user sudah memencet beli
  if (isset($_POST["buatPesanan"])) {
    if (!isset($_SESSION["login"])) {
      header("Location: login.php");
      exit;
    }
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    // die;

    if ($namaErr === "" && $nmrErr === "" && $alamatErr === "" && $kotaErr === "") {
      if (pembeliaan($_POST) > 0) {
        unset($_SESSION['keranjang']);
        $switch = 1;
      } else {
        $switch = 0;
      }
    }
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
  <link rel="stylesheet" href="css/sweetalert2.min.css">


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


  <!-- login -->
  <section class="login my-5">
    <div class="container ">
      <div class="row text-center">
        <div class="col">
          <h3>Keranjang</h3>
          <img src="img/Line 7.png" class="mt-n1 mb-3">
        </div>
      </div>
      <div class="row">
        <?php if (isset($_SESSION['keranjang'])) : ?>
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col">Produk</th>
                <th scope="col">Harga</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Subharga</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <form action="pesanan.php" method="POST">
              <tbody>

                <?php foreach ($_SESSION['keranjang'] as $idProduk => $jumlah) :
                  $produk = query("SELECT * FROM produk WHERE idProduk = $idProduk")[0];
                  // echo "<pre>";
                  // print_r($produk);
                  // echo "</pre>";

                  $subharga = $produk['hargaProduk'] * $jumlah;
                  $total += $subharga;
                  // $cart[$idProduk] = $idProduk;
                  // $cart['jumlah'] = $jumlah;
                  // $cart['subharga'] = $subharga;
                  // echo "<pre>";
                  // print_r($cart);
                  // echo "</pre>";
                  // die;
                ?>
                  <tr>
                    <td> <img src="img/produk/<?= $produk["gambarProduk"]; ?>" style="width: 100px;"></td>
                    <td><?= $produk['judulProduk']; ?></td>
                    <td>Rp. <?= $produk['hargaProduk']; ?>.000</td>
                    <td><?= $jumlah; ?></td>
                    <td>Rp. <?= $subharga; ?>.000</td>
                    <td>
                      <a href="hapus.php?idProduk=<?= $produk['idProduk']; ?>" class="badge badge-pill badge-danger" onclick="return confirm('Apakah anda yakin ingin menghapus produk ini?')">Hapus</a>
                    </td>
                  </tr>

                <?php endforeach; ?>

              </tbody>
              <tfoot>
                <th colspan="4">
                  <h4> Total </h4>
                </th>
                <th colspan="2">
                  <h4>Rp. 999.000</h4>
                </th>
              </tfoot>
            </form>
          </table>
          <div class="container">
            <div class="row">
              <div class="col-8 offset-2">
                <form action="" method="POST">
                  <input type="hidden" name="idPelanggan" class="form-control" value="<?= $pelanggan['idPelanggan']; ?>">
                  <div class="form-group row">
                    <label for="nama" class="col-sm-2">Nama</label>
                    <div class="col-sm-10">
                      <input type="text" name="nama" class="form-control" id="nama" value="<?= $pelanggan["nama"];
                                                                                            ?>" required>
                      <span class="error text-danger"><?= $namaErr; ?></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="nomor" class="col-sm-2">Nomor</label>
                    <div class="col-sm-10">
                      <input type="text" name="nomor" class="form-control" id="nomor" value="<?= $pelanggan["nomor"];
                                                                                              ?>" required>
                      <span class="error text-danger"><?= $nmrErr; ?></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="alamatLengkap" class="col-sm-2 p-0 pl-2">Alamat Lengkap</label>
                    <div class="col-sm-10">
                      <input type="text" name="alamatLengkap" class="form-control" id="alamatLengkap" value="<?= $pelanggan["alamatLengkap"];
                                                                                                              ?>" required>
                      <span class="error text-danger"><?= $alamatErr; ?></span>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="kota" class="col-sm-2">Kota</label>
                    <div class="col-sm-10">
                      <select id="kota" name="kota" class="form-control" required>
                        <option class="bg-dark" selected><?php if (isset($pelanggan["kota"])) {
                                                            echo $pelanggan["kota"];
                                                          } else {
                                                            echo "--Pilih Kota--";
                                                          }; ?></option>
                        <option class="bg-dark">Tangerang</option>
                        <option class="bg-dark">Jakarta</option>
                        <option class="bg-dark">Bandung</option>
                      </select>
                      <span class="error text-danger"><?= $kotaErr; ?></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <h6 class="col-sm-10 offset-2">+Biaya Ongkir = Rp. <?= $ongkir['tarif']; ?>.000</h6>
                    <input type="hidden" name="ongkir" class="form-control bg-dark" value="<?= $ongkir['tarif']; ?>">
                  </div>

                  <div class="form-group row d-flex justify-content-end mt-n3">
                    <h4 class="col-sm-10 offset-2"> Total : Rp. <?= $total += $ongkir['tarif']; ?>.000</h4>
                    <input type="hidden" name="total" class="form-control bg-dark" value="<?= $total; ?>">
                    <div class="col-sm-10">
                      <button href="#" type="submit" name="buatPesanan" class="btn btn-block btn-success" style="font-size: 20px;text-decoration: none;  color:white;">Buat Pesanan</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        <?php endif; ?>




      </div>
    </div>
  </section>
  <!-- Akhir login -->




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






  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
  <script src="js/all.js"></script>
  <script src="js/sweetalert2.min.js"></script>
  <?php

  if (isset($switch)) {
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
      }); </script>";
    } else {
    }
  }

  // if (empty($_SESSION['keranjang']) or !isset($_SESSION['keranjang'])) {

  //   echo "<script>Swal.fire({
  //     type: 'info',
  // title: 'Keranjang kosong, silahkan belanja terlebih dahulu',
  // text: ''
  // }) ;</script>";

  //   echo "<script>location = 'produk.php';</script>";
  // }



  ?>


</body>

</html>