<?php
session_start();
//panggil koneksi database
include "koneksi.php";
require_once 'Flasher.php';

$idharian = $_POST['idharian'];
$nama = $_POST['tnama'];
$jam = $_POST['tjam'];
$lokasi = $_POST['tlokasi'];
$deskripsi= $_POST['tdeskripsi'];
$status = $_POST['tstatus'];

// ubah jika di klik
if(isset($_POST['bubah'])) {


    //persiapan ubah data baru
    $ubah = mysqli_query($conn, "UPDATE harian SET  nama='$nama', jam='$jam', lokasi ='$lokasi', deskripsi='$deskripsi', status='$status' WHERE idharian='$idharian'");

    // jika ubah sukses 
    if ($ubah) {
        Flasher::setFlash('Berhasil','diubah','success');
        header("location:harian.php");
        exit;
    } else {
        Flasher::setFlash('Gagal','diubah','danger');
        header("location:harian.php");
        exit;
    }
 }
?>