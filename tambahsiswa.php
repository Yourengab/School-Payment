<?php 
require 'functions.php';

$angkatan = query("SELECT * FROM tb_angkatan");
$user = query("SELECT * FROM tb_user");

if( isset($_POST['tambahSiswa'])) {

   if(  tambahSiswa($_POST) > 0 ) {
    echo "
    <script>
    alert('Berhasil menambah siswa!');
    document.location.href = 'index.php'
    </script>
    ";
   } else {
    echo "
    <script>
    alert('Gagal menambah siswa!');
    document.location.href = 'tambahsiswa.php'
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
    <title>Tambah data siswa</title>
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

<form method="post">
    <h2>Tambah Siswa</h2>
    <ul>
        <li>
        <label for='nis'>Nis Siswa</label>
        <input type='text' id='nis' name="nis" required>
        </li>

        <li>
        <label for='nama'>Nama Siswa</label>
        <input type='text' id='nama' name="nama" required>
        </li>
        
        <li>
        <label for='angkatan'>Angkatan</label>
        <select name="angkatan" id="angkatan">
            <?php foreach(  $angkatan as $tahun ) : ?>
                <option value="<?=$tahun['angkatan']?>"><?=$tahun['angkatan']?></option>
            <?php endforeach; ?>
        </select>
        </li>

        <li>
        <label for='kelas'>Kelas</label>
        <input type='text' id='kelas' name="kelas" required>
        </li>

        <li>
        <label for='no_telp'>No Telp</label>
        <input type='text' id='no_telp' name="no_telp" required>
        </li>

        <li>
        <label for='password'>Password</label>
        <input type='text' id='password' name="password" required>
        </li>

        <li>
        <label for='level'>Level</label>
        <select name="level" id="level">
            <?php foreach(  $user as $level ) : ?>
                <option value="<?=$level['level']?>"><?=$level['level']?></option>
            <?php endforeach; ?>
        </select>
        </li>
        <button type="submit" name="tambahSiswa">Tambah</button>
    </ul>
</form>
</body>
</html>