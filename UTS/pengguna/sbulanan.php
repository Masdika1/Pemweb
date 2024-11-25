<?php
include('koneksi.php');

$idbulanan = $_GET['idbulanan'];
$status = $_GET['status'];

// Pastikan status aman dari SQL injection
$status = mysqli_real_escape_string($conn, $status);

// Lakukan query untuk update status
$query = "UPDATE bulanan SET status = '$status' WHERE idbulanan = $idbulanan";
$q = mysqli_query($conn, $query);

// Cek jika query berhasil
if (!$q) {
    echo "Error: " . mysqli_error($conn);
} else {
    header('Location: bulanan.php');
}
?>
