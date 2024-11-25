<?php
include('koneksi.php');

$idmingguan = $_GET['idmingguan'];
$status = $_GET['status'];

// Pastikan status aman dari SQL injection
$status = mysqli_real_escape_string($conn, $status);

// Lakukan query untuk update status
$query = "UPDATE mingguan SET status = '$status' WHERE idmingguan = $idmingguan";
$q = mysqli_query($conn, $query);

// Cek jika query berhasil
if (!$q) {
    echo "Error: " . mysqli_error($conn);
} else {
    header('Location: mingguan.php');
}
?>
