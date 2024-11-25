<?php
session_start();
include 'koneksi.php';

// Ambil data dari form login
$email = $_POST['email'];
$password = $_POST['password'];

// Cek data pada tabel login dengan email dan password yang sesuai
$data = mysqli_query($conn, "SELECT * FROM login WHERE email='$email' AND password='$password'");

// Hitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if ($cek > 0) {
    $user = mysqli_fetch_assoc($data); // Ambil data pengguna
    
    // Simpan email dan nama pengguna dalam session
    $_SESSION['email'] = $email;
    $_SESSION['nama'] = $user['nama']; // Simpan nama ke session
    $_SESSION['status'] = "login";
    
    header("location:index.php"); // Redirect ke halaman index/dashboard
} else {
    echo "<script> alert('Login gagal! Username atau password salah'); </script>";
    echo "<script> window.location = 'login.php'; </script>";
}
?>
