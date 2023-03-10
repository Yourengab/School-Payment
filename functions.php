<?php
$conn = mysqli_connect("localhost", 'root', "", 'db_spp');

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

function hitungTotal($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $total = mysqli_num_rows($result);
    return $total;
}

function tambahSiswa($data)
{
    global $conn;

    $nama = htmlspecialchars($data['nama']);
    $alamat = htmlspecialchars($data['alamat']);
    $kelas = htmlspecialchars($data['kelas']);
    $no_telp = htmlspecialchars($data['no_telp']);
    $password = htmlspecialchars($data['password']);
    $level = htmlspecialchars($data['level']);

    $result = "INSERT INTO tb_siswa VALUES (
         NULL,
        '$nama',
        '$kelas',
        '$no_telp',
        '$alamat',
        '$password',
        'siswa'
    );";

    mysqli_query($conn, $result);

    return mysqli_affected_rows($conn);
}

function cariData($keyword)
{
    $query = "SELECT * FROM tb_siswa WHERE 
    nis LIKE '$keyword' OR
    nama LIKE '%$keyword%' OR
    kelas = '$keyword' OR
    no_telp = '$keyword'
    ";

    return query($query);
}
function cariHistori($keyword)
{
    $query = "SELECT * FROM tb_spp WHERE 
    nis LIKE '$keyword' OR
    nama LIKE '%$keyword%' OR
    kelas = '$keyword' OR
    bulan = '$keyword'
    ";

    return query($query);
}

function deleteSiswa($nis)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM tb_siswa WHERE nis=$nis");
    return mysqli_affected_rows($conn);
}

function bayarSpp($data)
{
    global $conn;

    $nis = htmlspecialchars($data['nis']);
    $kelas = htmlspecialchars($data['kelas']);
    $nama = htmlspecialchars($data['nama']);
    $bulan = htmlspecialchars($data['bulan']);
    $bayar = htmlspecialchars($data['bayar']);
    $keterangan = htmlspecialchars($data['keterangan']);

    $dataSpp = mysqli_query($conn, "SELECT * from tb_kelas");

    $rows = [];
    while ($row = mysqli_fetch_assoc($dataSpp)) {
        $rows[] = $row;
    }

    $sppKelasIX = $rows[0]['nominal_spp'];
    $sppKelasVIII = $rows[1]['nominal_spp'];
    $sppKelasVII = $rows[2]['nominal_spp'];

    // Kelas 9
    if ($kelas == 'IX') {
        if ($_POST['bayar'] > $sppKelasIX) {
            $bayar = $sppKelasIX;
        }
    }
    // Kelas 8
    if ($kelas == 'VIII') {
        if ($_POST['bayar'] > $sppKelasIX) {
            $bayar = $sppKelasVIII;
        }
    }
    // Kelas 7
    if ($kelas == 'VII') {
        if ($_POST['bayar'] > $sppKelasIX) {
            $bayar = $sppKelasVII;
        }
    }

$lunas = mysqli_query($conn,"SELECT bulan FROM tb_spp WHERE nis=$nis AND bulan='$bulan' AND keterangan='LUNAS'");
    
$sudahDibayar = [];
while ($row = mysqli_fetch_assoc($lunas)) {
    $sudahDibayar[] = $row;
}

$location =  " document.location.href = 'bayar.php?nis=$nis'";
if (!$sudahDibayar) {
    // Amibil nis siswa saat baayar berhasil
    echo "
    <script>
    alert('Berhasil Membayar');
    $location
    </script>   
    ";
} else {
    echo "
    <script>
    alert('Bulan Sudah Dibayar!');
    $location
    </script>
    ";
    exit;
}

$result = "INSERT INTO tb_spp VALUES (
    '',
    $nis,
    '$nama',
    '$kelas',
    CURDATE(),
    '$bulan',
    '$bayar',
    '$keterangan'
);";

    mysqli_query($conn, $result);

    return mysqli_affected_rows($conn);
}
