<?php
session_start();

//Mendapatkan idProduk dari url
$idProduk = $_GET['idProduk'];


// die;


//Jika produk itu ada di keranjang maka produk itu ditambah 1
if (isset($_SESSION['keranjang'][$idProduk])) {
  $_SESSION['keranjang'][$idProduk] += 1;
} else {
  //Selain itu maka produk itu belum ada di keranjang
  $_SESSION['keranjang'][$idProduk] = 1;
}

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
// die;

//Hubungkan ke keranjang.php
echo "<script>
            alert('Produk berhasil ditambahkan ke keranjang')
            document.location.href = 'produk.php'
          </script>";



// echo "<html><link rel='stylesheet' href='css/sweetalert2.min.css'>
//       <script src='js/sweetalert2.min.js'></script></html>";

// echo  "<script>Swal.fire({
//           title: 'Produk berhasil ditambahkan ke keranjang',
//           width: 600,
//           padding: '3em',
//           background: '#fff url(img/cart/sukses_checkout.png)';
//         })</script>";
