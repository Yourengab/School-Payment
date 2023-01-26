<?php 
require 'functions.php';

$dataSiswa = query("SELECT * FROM tb_siswa");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Siswa</title>
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
  <a href="histori.php">Histori Pembayaran Siswa</a>
  <a href="bayar.php">Bayar SPP</a>
  <a href="tambahsiswa.php">Tambah data siswa</a>
</nav>
    <h2>Daftar Siswa</h2>
  <table border="1" cellspacing="3">
    <tr>
      <td>NIS</td>
      <td>Nama</td>
      <td>Angkatan</td>
      <td>Kelas</td>
      <td>No Telp</td>
      <td>Aksi</td>
    </tr>
  <?php foreach(  $dataSiswa as $siswa ) : ?>
    <tr>
      <th><?= $siswa['nis']; ?></th>
      <th><?= $siswa['nama']; ?></th>
      <th><?= $siswa['angkatan']; ?></th>
      <th><?= $siswa['kelas']; ?></th>
      <th><?= $siswa['no_telp']; ?></th>
      <th><a href="deleteprocess.php?nis=<?= $siswa['nis']?>">Delete</a></th>
    </tr>
  <?php endforeach; ?>
  </table>
  </body>
</html>
