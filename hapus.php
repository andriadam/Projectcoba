<?php 

session_start();

$idProduk = $_GET['idProduk'];
unset($_SESSION['keranjang'][$idProduk]);
echo "<script>location = 'keranjang.php';</script>";
