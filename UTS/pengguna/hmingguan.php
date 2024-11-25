<?php
session_start();
//panggil koneksi database
include "koneksi.php";
require_once 'Flasher.php';

$idmingguan = $_POST['idmingguan'];
$nama = $_POST['tnama'];
$hari = $_POST['thari'];
$jam = $_POST['tjam'];
$lokasi = $_POST['tlokasi'];
$deskripsi = $_POST['tdeskripsi'];
$status = $_POST['tstatus'];

// ubah jika di klik
if(isset($_POST['bhapus'])) {


    //persiapan hapus data baru
    $hapus = mysqli_query($conn, "DELETE FROM mingguan WHERE idmingguan='$idmingguan'");

    // jika hapus sukses 
    if ($hapus) {
        Flasher::setFlash('Berhasil','dihapus','success');
        header("location:mingguan.php");
        exit;
    } else {
        Flasher::setFlash('Gagal','dihapus','danger');
        header("location:mingguan.php");
        exit;
    }
 }
?>