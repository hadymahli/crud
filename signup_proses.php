<?php
session_start();
include 'koneksi.php';

$email    = $_POST['email'];
$password = $_POST['password'];

$cek = mysqli_query($koneksi, "SELECT * FROM user WHERE email = '$email'");
if (mysqli_num_rows($cek) > 0) {

    header("Location: signup.php?pesan=gagal");
    exit;
}

$password = password_hash($password, PASSWORD_DEFAULT);

$query = "INSERT INTO user (email, password) VALUES ('$email', '$hashed_password')";

if (mysqli_query($koneksi, $query)) {

    header("Location: login.php?pesan=sukses");
} else {
    header("Location: signup.php?pesan=gagal");
}
?>
