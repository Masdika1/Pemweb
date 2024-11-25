<?php
session_start();
//panggil koneksi database
include "koneksi.php";
require_once 'Flasher.php';

$idjadwal = $_POST['idjadwal'];
$nama = $_POST['tnama'];
$tanggal = $_POST['ttanggal'];
$jam = $_POST['tjam'];
$lokasi = $_POST['tlokasi'];
$deskripsi = $_POST['tdeskripsi'];

// ubah jika di klik
if(isset($_POST['bhapus'])) {


    //persiapan hapus data baru
    $hapus = mysqli_query($conn, "DELETE FROM jadwal WHERE idjadwal='$idjadwal'");

    // jika hapus sukses 
    if ($hapus) {
        Flasher::setFlash('Berhasil','dihapus','success');
        header("location:index.php");
        exit;
    } else {
        Flasher::setFlash('Gagal','dihapus','danger');
        header("location:index.php");
        exit;
    }
 }
?>