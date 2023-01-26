<?php 
require 'functions.php';



if(deleteSiswa($_GET['nis']) > 0 ) {
    echo "
    <script>
    alert('Berhasil menghapus siswa!');
    document.location.href = 'index.php'
    </script>
    ";
} else {
    echo "
    <script>
    alert('Gagal menghapus siswa!');
    document.location.href = 'index.php'
    </script>
    ";
}
?>