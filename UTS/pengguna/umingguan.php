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
$deskripsi= $_POST['tdeskripsi'];
$status = $_POST['tstatus'];

// ubah jika di klik
if(isset($_POST['bubah'])) {


    //persiapan ubah data baru
    $ubah = mysqli_query($conn, "UPDATE mingguan SET  nama='$nama', hari='$hari', jam='$jam', lokasi ='$lokasi', deskripsi='$deskripsi', status='$status' WHERE idmingguan='$idmingguan'");

    // jika ubah sukses 
    if ($ubah) {
        Flasher::setFlash('Berhasil','diubah','success');
        header("location:mingguan.php");
        exit;
    } else {
        Flasher::setFlash('Gagal','diubah','danger');
        header("location:mingguan.php");
        exit;
    }
 }
?>