<?php 
require 'functions.php';

$dataSiswa  = query("SELECT * FROM tb_siswa");
$dataSpp = query("SELECT * FROM tb_spp");


if( isset($_POST['cariNis'])) {
$nis = $_POST['nis'];

if(!$nis) {
  $dataSpp = query("SELECT * FROM tb_spp");
  $dataSiswa  = query("SELECT * FROM tb_siswa");
} else {
  $dataSiswa = cariData($nis);
  $dataSpp = query("SELECT * FROM tb_spp WHERE nis=$nis");
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bayar</title>
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
    <h2>Cari histori pembayaan siswa berdasarkan nis</H2>
    <form method="post">
        <label for='nis'>NIS :</label>
        <input type='text' id='nis' name="nis">

        <button type="submit" name="cariNis">Cari</button>
    </form>
    <a href="index.php">Kembali</a>

    <table border="1" cellspacing="3">
    <h2>Informasi Siswa</h2>
  <?php if(isset($_POST['cariNis'])) : ?>
    <tr>
      <td>NIS</td>
      <td>Nama</td>
      <td>Angkatan</td>
      <td>Kelas</td>
      <td>No Telp</td>
    </tr>
  <?php foreach(  $dataSiswa as $siswa ) : ?>
    <tr>
      <th><?= $siswa['nis']; ?></th>
      <th><?= $siswa['nama']; ?></th>
      <th><?= $siswa['angkatan']; ?></th>
      <th><?= $siswa['kelas']; ?></th>
      <th><?= $siswa['no_telp']; ?></th>
    </tr>
    <?php endforeach; ?>
  </table>
  <?php endif; ?>
<h2>Spp yang sudah di bayar</h2>
<table border="1" cellspacing="3">
    <tr>
      <td>NIS</td>
      <td>Nama Siswa</td>
      <td>tanggal Bayar</td>
      <td>Total Bayar</td>
      <td>Bulan</td>
      <td>Keterangan</td>
    </tr>
  <?php foreach(  $dataSpp as $spp ) : ?>
    <tr>
      <th><?= $spp['nis']; ?></th>
      <th><?= $spp['nama']; ?></th>
      <th><?= $spp['tgl_bayar']; ?></th>
      <th><?= $spp['bulan']; ?></th>
      <th><?= $spp['total_bayar']; ?></th>
      <th><?= $spp['keterangan']; ?></th>
    </tr>
  <?php endforeach; ?>
</table>
</body>
</html>