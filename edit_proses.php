<?php 
 require 'koneksi.php';

    $id_siswa   = $_POST['id_siswa'];
    $NIS = $_POST['NIS'];
    $Nama = $_POST['nama'];
    $Jurusan = $_POST['jurusan'];
    $Notelepon = $_POST['no_telepon'];
    $Alamat = $_POST['alamat'];

    $Query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE NIS = '$NIS'");
    $ceknis = mysqli_num_rows($Query);

    if ($ceknis > 0) {
        echo "<script>
                alert('NIS sudah ada...');
                window.location.href = 'edit.php?id=$id_siswa';
              </script>";
    } else {
        $update = mysqli_query($koneksi, "UPDATE siswa SET NIS = '$NIS', nama = '$Nama', jurusan = '$Jurusan', no_telepon = '$Notelepon', alamat = '$Alamat'
        WHERE id_siswa = '$id_siswa'");
        }

    if ($update) {
        echo "<script>
                alert('Data berhasil diupdate!');
                window.location.href = './';
              </script>";
    } 
?>
