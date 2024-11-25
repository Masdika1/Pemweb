<?php
include 'koneksi.php';
$nama = $_POST["nama"];
$email = $_POST["email"];
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];

// Cek apakah password dan confirm_password cocok
if ($password !== $confirm_password) {
    echo "<script>
        alert('Password dan konfirmasi password tidak cocok.');
        window.location.href = 'register.php';
    </script>";
    exit; // Hentikan proses jika password tidak cocok
}

// Proses penyimpanan data ke database
mysqli_query($conn, "INSERT INTO login (nama, email, password) VALUES ('$nama','$email','$password')");

// Jika berhasil, arahkan ke halaman login
header("Location: login.php");
?>
