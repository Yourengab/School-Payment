<?php 
require 'functions.php';

$kelasIX = hitungTotal("SELECT * FROM tb_siswa WHERE kelas='IX'");
$kelasVIII = hitungTotal("SELECT * FROM tb_siswa WHERE kelas='VIII'");
$kelasVII = hitungTotal("SELECT * FROM tb_siswa WHERE kelas='VII'");


// for ( $i = 0; $i < $kelasIX; $i++) {
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar kelas</title>
</head>
<style>
    body {
      padding: 0;
      margin: 0;
    }
    nav {
      width: 100%;
      height: 50px;
      background-color: #9999;
      display: flex;
      justify-content: center;
      gap: 50px;
      align-items: center;
    }
    nav a {
      text-decoration: underline;
      color: black;
      font-size: 20px;
    }
  </style>
<body>
<nav>
  <a href="index.php">Daftar Siswa</a>
  <a href="kelas.php">Daftar Kelas</a>
  <a href="histori.php">Histori Pembayaran Siswa</a>
  <a href="bayar.php">Bayar SPP</a>
  <a href="tambahsiswa.php">Tambah data siswa</a>
</nav>
<table border="1" cellspacing="3">
    <h2>Daftar kelas</h2>
    <tr>
      <td>Kelas</td>
      <td>Harga SPP</td>
      <td>Total Siswa</td>
    </tr>
        <tr>
            <th>IX</th>
            <th>Rp400000</th>
            <th><?= $kelasIX ?></th>
        </tr>
        <tr>
            <th>VIII</th>
            <th>Rp350000</th>
            <th><?= $kelasVIII ?></th>
        </tr>
        <tr>
            <th>VII</th>
            <th>Rp300000</th>
            <th><?= $kelasVII ?></th>
        </tr>
  </table>
</body>
</html>