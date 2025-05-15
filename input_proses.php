<?php
    include 'koneksi.php';

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
                window.location.href = 'input.php';
              </script>";
    } else {
        $insert = mysqli_query($koneksi, "INSERT INTO siswa (NIS, nama, jurusan, no_telepon, alamat)
                                          VALUES ('$NIS', '$Nama', '$Jurusan', '$Notelepon', '$Alamat')");
        if ($insert) {
            echo "<script>
                    alert('Data berhasil disimpan!');
                    window.location.href = 'index.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Gagal menyimpan data!');
                    window.location.href = 'input.php';
                  </script>";
        }
    }
?>
