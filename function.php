<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "dcutb");

function query($query)
{
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function tambah($data)
{
  global $conn;

  //ambil data 
  $idPelanggan  = htmlspecialchars($data["idPelanggan"]);
  $nama = htmlspecialchars($data["nama"]);
  $nomor = $data["nomor"];
  $tanggalJam = htmlspecialchars($data["tanggalJam"]);
  $alamatLengkap = htmlspecialchars($data["alamatLengkap"]);
  $kota = htmlspecialchars($data["kota"]);
  $kapster = htmlspecialchars($data["kapster"]);
  $ongkir = htmlspecialchars($data["ongkir"]);

  // query insert data
  $query = "INSERT INTO booking VALUES ('', '$idPelanggan', '$nama', '$nomor', '$tanggalJam', '$alamatLengkap', '$kota', '$kapster', '$ongkir')";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function registrasi($data)
{
  global $conn;
  //ambil data 
  $email = strtolower(stripslashes($data["email"]));
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $password2 = mysqli_real_escape_string($conn, $data["password2"]);
  $nama = htmlspecialchars($data["nama"]);
  $nomor = htmlspecialchars($data["nomor"]);

  $alamatLengkap = htmlspecialchars($data["alamatLengkap"]);
  $kota = htmlspecialchars($data["kota"]);

  // cek email sudah ada atau belum
  $result = mysqli_query($conn, "SELECT email FROM pelanggan WHERE email ='$email'");

  if (mysqli_fetch_assoc($result)) {
    echo "<script>
          alert('email sudah terdaftar !')
          </script>";
    return false;
  }



  // cek konfirmasi password
  if ($password !== $password2) {
    echo "<script>
          alert('Konfirmasi password tidak sesuai !');
          </script>";
    return false;
  }

  // enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);


  // query insert data
  $query = "INSERT INTO pelanggan VALUES ('', '$email', '$password', '$nama', '$nomor', '$alamatLengkap', '$kota')";

  // Menambahkan pelanggan baru ke database
  mysqli_query($conn, $query);


  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  global $conn;

  //ambil data 
  $idPelanggan = $data["idPelanggan"];
  $email = strtolower(stripslashes($data["email"]));
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $password2 = mysqli_real_escape_string($conn, $data["password2"]);
  $nama = htmlspecialchars($data["nama"]);
  $nomor = htmlspecialchars($data["nomor"]);
  $alamatLengkap = htmlspecialchars($data["alamatLengkap"]);
  $kota = htmlspecialchars($data["kota"]);

  // cek konfirmasi password
  if ($password !== $password2) {
    echo "<script>
        alert('Konfirmasi password tidak sesuai !');
        document.location.href='ubah.php?idPelanggan=$idPelanggan'
        </script>";
    return false;
  }

  // enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  // // Menambahkan user baru ke database
  // mysqli_query($conn, "INSERT INTO users VALUES ('', '$username', '$password')");

  // query insert data
  $query = "UPDATE pelanggan SET
            email = '$email'," .
    "password =" . "'$password',
            nama = '$nama', 
            nomor = '$nomor', 
            alamatLengkap= '$alamatLengkap', 
            kota ='$kota'
            WHERE idPelanggan = $idPelanggan 
            ";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function pembeliaan($data)
{
  global $conn;

  $idPelanggan = htmlspecialchars($data["idPelanggan"]);
  $nama = htmlspecialchars($data["nama"]);
  $nomor = htmlspecialchars($data["nomor"]);
  $alamatLengkap = htmlspecialchars($data["alamatLengkap"]);
  $kota = htmlspecialchars($data["kota"]);
  $ongkir = htmlspecialchars($data["ongkir"]);
  $total = htmlspecialchars($data["total"]);

  $query = "INSERT INTO pembeliaan VALUES ('','$idPelanggan','$nama', '$nomor', '$alamatLengkap', '$kota', '$ongkir','$total')";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function beli($data)
{
  global $conn;

  //ambil data 
  $idPelanggan = htmlspecialchars($data["idPelanggan"]);
  $jumlah = htmlspecialchars($data["jumlah"]);
  $idProduk = htmlspecialchars($data["idProduk"]);
  $gambar = htmlspecialchars($data["gambar"]);
  $judul = htmlspecialchars($data["judul"]);
  $harga = htmlspecialchars($data["harga"]);



  // query insert data
  $query = "INSERT INTO beli VALUES ('','$idPelanggan','$idProduk', '$gambar', '$judul', '$harga', '$jumlah','')";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
