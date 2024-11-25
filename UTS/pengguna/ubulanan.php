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
$deskripsi= $_POST['tdeskripsi'];
$status = $_POST['tstatus'];

// ubah jika di klik
if(isset($_POST['bubah'])) {


    //persiapan ubah data baru
    $ubah = mysqli_query($conn, "UPDATE bulanan SET  nama='$nama', tanggal='$tanggal', jam='$jam', lokasi ='$lokasi', deskripsi='$deskripsi', status='$status' WHERE idbulanan='$idbulanan'");

    // jika ubah sukses 
    if ($ubah) {
        Flasher::setFlash('Berhasil','diubah','success');
        header("location:bulanan.php");
        exit;
    } else {
        Flasher::setFlash('Gagal','diubah','danger');
        header("location:bulanan.php");
        exit;
    }
 }
?>