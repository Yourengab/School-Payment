<?php
require 'functions.php';

$nis = $_GET['nis'];
$dataSiswa = query("SELECT * FROM tb_siswa WHERE nis=$nis");
// Query tb_Bulan
$dataBulan = query("SELECT * FROM tb_bulan");
$bulanLunas = query("SELECT * FROM tb_spp WHERE nis=$nis");

if (isset($_POST['bayarSPP'])) {
  if (bayarSpp($_POST) > 0) {
    echo "
    <script>
    alert('Berhasil membayar spp siswa!');
    </script>
    ";
  } else {
    echo "
    <script>
    alert('Gagal membayar spp siswa!');
    document.location.href = 'index.php'
    </script>
    ";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bayar SPP</title>
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
  <a href="index.php">Kembali</a>
  <div class="container" style="display: flex; justify-content: space-evenly;">
  <form method="post">
    <ul>
      <li>
        <label for='nis'>NIS Siswa</label>
        <input type='text' id='nis' name="nis" value="<?= $dataSiswa[0]['nis'] ?>" readonly>
      </li>
      <li>
        <label for='nama'>Nama Siswa</label>
        <input type='text' id='nama' name="nama" value="<?= $dataSiswa[0]['nama'] ?>" readonly>
      </li>
      <li>
        <label for='kelas'>Kelas</label>
        <input type='text' id='kelas' name="kelas" value="<?= $dataSiswa[0]['kelas'] ?>" readonly>
      </li>
      <li>
        <label for='bulan'>Bayar Bulan</label>
        <select name="bulan" id="bulan">
          <?php foreach ($dataBulan as $bulan) : ?>
            <option value="<?= $bulan['bulan'] ?>" required><?= $bulan['bulan'] ?></option>
          <?php endforeach; ?>
        </select>
      </li>
      <li>
        <label for='bayar'>Nominal Bayar</label>
        <input type='text' id='bayar' name="bayar" required>
      </li>
      <li>
        <label for='keterangan'>Keterangan</label>
        <input type='text' id='keterangan' name="keterangan" required>
      </li>
    </ul>
    <button type="submit" name="bayarSPP" onclick="return confirm('Apakah data pembayaran sudah benar?')">Bayar Spp</button>
  </form>
  <br>
  <table border="1" cellspacing="3">
    <tr>
      <th>Bulan Yang Sudah Dibayar</th>
    </tr>
    <?php foreach(  $bulanLunas as $lunas ) : ?>
    <tr>
        <td>
         <h4> <?= $lunas['bulan']; ?> - <?= $lunas['keterangan']; ?></h4>
         <p><?= $lunas['tgl_bayar']; ?></p>
        </td>
      </tr>
      <?php endforeach; ?>
  </table>
  </div>
</body>

</html>