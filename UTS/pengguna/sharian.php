<?php
include('koneksi.php');

$idharian = $_GET['idharian'];
$status = $_GET['status'];

// Pastikan status aman dari SQL injection
$status = mysqli_real_escape_string($conn, $status);

// Lakukan query untuk update status
$query = "UPDATE harian SET status = '$status' WHERE idharian = $idharian";
$q = mysqli_query($conn, $query);

// Cek jika query berhasil
if (!$q) {
    echo "Error: " . mysqli_error($conn);
} else {
    header('Location: harian.php');
}
?>
