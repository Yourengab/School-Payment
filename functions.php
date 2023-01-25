<?php 
$conn = mysqli_connect("localhost",'root',"",'db_spp');

function query($query) {
global $conn;

$result = mysqli_query($conn,$query);

$rows = [];
while( $row = mysqli_fetch_assoc($result) ) {
    $rows[] = $row;
}
return $rows;
}

function tambahSiswa($data) {
    global $conn;

    $nis = htmlspecialchars($data['nis']);
    $nama = htmlspecialchars($data['nama']);
    $kelas = htmlspecialchars($data['kelas']);
    $angkatan = htmlspecialchars($data['angkatan']);
    $no_telp = htmlspecialchars($data['no_telp']);
    $password = htmlspecialchars($data['password']);
    $level = htmlspecialchars($data['level']);

    $result = "INSERT INTO tb_siswa VALUES (
         $nis,
        '$nama',
         $angkatan,
        '$kelas',
        '$no_telp',
        '$password',
        '$level'
    );";

    mysqli_query($conn,$result);

    return mysqli_affected_rows($conn);
}

function cariData($keyword) {
    $query = "SELECT * FROM tb_siswa WHERE nis = $keyword ";

    return query($query);
}

function bayarSpp($data) {
    global $conn;

    $nis = htmlspecialchars($data['nis']);
    $tgl = htmlspecialchars($data['tgl']);
    $nama = htmlspecialchars($data['nama']);
    $bulan = htmlspecialchars($data['bulan']);
    $bayar = htmlspecialchars($data['bayar']);
    $keterangan = htmlspecialchars($data['keterangan']);

    $result = "INSERT INTO tb_spp VALUES (
        '',
        '$nis',
        '$nama',
        '$tgl',
        '$bulan',
        '$bayar',
        '$keterangan'
    );";

    mysqli_query($conn,$result);

    return mysqli_affected_rows($conn);
}
?>