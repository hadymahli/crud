<?php 
require 'koneksi.php';

$id = $_GET["id"];

$sql = "DELETE FROM siswa WHERE id_siswa = $id";

if (mysqli_query($koneksi, $sql)) {
    echo "<script>
        alert('Data berhasil dihapus');
        window.location.href = 'index.php';
    </script>";
} else {
    echo "<script>
        alert('Data gagal dihapus');
        window.location.href = 'index.php';
    </script>";
}
?>
