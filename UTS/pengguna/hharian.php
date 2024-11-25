<?php
session_start();
//panggil koneksi database
include "koneksi.php";
require_once 'Flasher.php';

$idharian = $_POST['idharian'];
$nama = $_POST['tnama'];
$jam = $_POST['tjam'];
$lokasi = $_POST['tlokasi'];
$deskripsi = $_POST['tdeskripsi'];
$status = $_POST['tstatus'];

// ubah jika di klik
if(isset($_POST['bhapus'])) {


    //persiapan hapus data baru
    $hapus = mysqli_query($conn, "DELETE FROM harian WHERE idharian='$idharian'");

    // jika hapus sukses 
    if ($hapus) {
        Flasher::setFlash('Berhasil','dihapus','success');
        header("location:harian.php");
        exit;
    } else {
        Flasher::setFlash('Gagal','dihapus','danger');
        header("location:harian.php");
        exit;
    }
 }
?>