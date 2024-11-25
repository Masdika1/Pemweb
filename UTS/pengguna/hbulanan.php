<?php
session_start();
//panggil koneksi database
include "koneksi.php";
require_once 'Flasher.php';

$idbulanan = $_POST['idbulanan'];
$nama = $_POST['tnama'];
$tanggal = $_POST['ttanggal'];
$jam = $_POST['tjam'];
$lokasi = $_POST['tlokasi'];
$deskripsi = $_POST['tdeskripsi'];
$status = $_POST['tstatus'];

// ubah jika di klik
if(isset($_POST['bhapus'])) {


    //persiapan hapus data baru
    $hapus = mysqli_query($conn, "DELETE FROM bulanan WHERE idbulanan='$idbulanan'");

    // jika hapus sukses 
    if ($hapus) {
        Flasher::setFlash('Berhasil','dihapus','success');
        header("location:bulanan.php");
        exit;
    } else {
        Flasher::setFlash('Gagal','dihapus','danger');
        header("location:bulanan.php");
        exit;
    }
 }
?>