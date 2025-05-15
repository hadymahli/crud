<?php
require 'koneksi.php';

$id_siswa = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id_siswa='$id_siswa'");
$data = mysqli_fetch_assoc($query);
if (!$data) {
    echo "<script>alert('Data tidak ditemukan!'); window.location.href='index.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Data</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                        url('https://statik.tempo.co/data/2020/07/29/id_956098/956098_720.jpg') no-repeat center center/cover;
            min-height: 100vh;
            padding: 40px;
            color: #fff;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.1);
            max-width: 600px;
            margin: auto;
            padding: 30px 40px;
            border-radius: 12px;
            backdrop-filter: blur(10px);
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 28px;
            color: #fff;
        }

        table {
            width: 100%;
        }

        label {
            font-weight: bold;
            display: inline-block;
            margin-bottom: 6px;
            color: #fff;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 8px;
            background-color: rgba(255, 255, 255, 0.2);
            color: #fff;
            font-size: 14px;
        }

        .form-control::placeholder {
            color: #ccc;
        }

        .form-control:focus {
            outline: none;
            background-color: rgba(255, 255, 255, 0.3);
        }

        td {
            padding: 8px;
            vertical-align: top;
        }

        td[colspan="3"] {
            text-align: center;
            padding-top: 20px;
        }

        .btn {
            padding: 10px 18px;
            margin: 4px;
            font-size: 14px;
            cursor: pointer;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .btn-primary {
            background-color: #00bfff;
            color: white;
        }

        .btn-primary:hover {
            background-color: #009acd;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #545b62;
        }
    </style>
</head>

<body>

    <div class="form-container">
        <h1>Edit Data Siswa</h1>
        <form action="edit_proses.php" method="post">
            <input type="hidden" name="id_siswa" value="<?= $data['id_siswa'] ?>">

            <table>
                <tr>
                    <td><label for="NIS">NIS</label></td>
                    <td><input type="text" name="NIS" id="NIS" value="<?= $data['NIS'] ?>" required class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="nama">Nama</label></td>
                    <td><input type="text" name="nama" id="nama" value="<?= $data['nama'] ?>" required class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="jurusan">Jurusan</label></td>
                    <td><input type="text" name="jurusan" id="jurusan" value="<?= $data['jurusan'] ?>" required class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="no_telepon">No. Telepon</label></td>
                    <td><input type="tel" name="no_telepon" id="no_telepon" value="<?= $data['no_telepon'] ?>" required class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="alamat">Alamat</label></td>
                    <td><textarea name="alamat" id="alamat" required class="form-control"><?= $data['alamat'] ?></textarea></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <a href="index.php" class="btn btn-secondary">Kembali</a>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" name="reset" class="btn btn-primary">Reset</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>

</body>
</html>
