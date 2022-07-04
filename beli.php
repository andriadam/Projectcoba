<?php
session_start();

//Mendapatkan idProduk dari url
$idProduk = $_GET['idProduk'];
$jumlah = $_GET['jumlah'];
// $_SESSION['keranjang'] = null;

// die;


//Jika produk itu ada di keranjang maka produk itu ditambah 1
$_SESSION['keranjang'][$idProduk] = $jumlah;

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
// die;

//Hubungkan ke keranjang.php
echo "<script>
           
            document.location.href = 'keranjang.php'
          </script>";

// header("Location: keranjang.php");
// exit;


// echo "<html><link rel='stylesheet' href='css/sweetalert2.min.css'>
//       <script src='js/sweetalert2.min.js'></script></html>";

// echo  "<script>Swal.fire({
//           title: 'Produk berhasil ditambahkan ke keranjang',
//           width: 600,
//           padding: '3em',
//           background: '#fff url(img/cart/sukses_checkout.png)';
//         })</script>";
