<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('location: login.php');
    exit;
}
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Siswa</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                        url('https://statik.tempo.co/data/2020/07/29/id_956098/956098_720.jpg') no-repeat center center/cover;
            min-height: 100vh;
            padding: 40px;
            color: #fff;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 12px;
            max-width: 1000px;
            margin: auto;
            backdrop-filter: blur(10px);
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 28px;
            color: #fff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff;
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 12px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            text-align: center;
        }

        th {
            background-color: rgba(0, 0, 0, 0.5);
        }

        tr:nth-child(even) {
            background-color: rgba(255, 255, 255, 0.05);
        }

        a.btn {
            display: inline-block;
            margin: 10px 5px 0;
            padding: 10px 20px;
            background-color: #00bfff;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        a.btn:hover {
            background-color: #009acd;
        }

        .actions a {
            margin: 0 5px;
            font-size: 14px;
            padding: 6px 12px;
            background-color: #00bfff;
            border-radius: 6px;
            color: #fff;
            text-decoration: none;
        }

        .actions a:hover {
            background-color: #009acd;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Data Siswa</h2>

    <table>
        <tr>
            <th>NO</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>No Telepon</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>

        <?php
        $sql = "SELECT * FROM siswa";
        $result = $koneksi->query($sql);
        $no = 1;

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$no}</td>
                        <td>{$row['NIS']}</td>
                        <td>{$row['nama']}</td>
                        <td>{$row['jurusan']}</td>
                        <td>{$row['no_telepon']}</td>
                        <td>{$row['alamat']}</td>
                        <td class='actions'>
                            <a href='edit.php?id={$row['id_siswa']}'>Edit</a>
                            <a href='hapus.php?id={$row['id_siswa']}' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>Hapus</a>
                        </td>
                    </tr>";
                $no++;
            }
        } else {
            echo "<tr><td colspan='7'>Data tidak ditemukan</td></tr>";
        }

        $koneksi->close();
        ?>
    </table>

    <div style="text-align: center;">
        <a href="logout_proses.php" class="btn">LOGOUT</a>
        <a href="input.php" class="btn">TAMBAH</a>
    </div>
</div>

</body>
</html>
