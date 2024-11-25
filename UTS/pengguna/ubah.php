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
$deskripsi= $_POST['tdeskripsi'];

// ubah jika di klik
if(isset($_POST['bubah'])) {


    //persiapan ubah data baru
    $ubah = mysqli_query($conn, "UPDATE jadwal SET  nama='$nama', tanggal='$tanggal', jam='$jam', lokasi ='$lokasi', deskripsi='$deskripsi' WHERE idjadwal='$idjadwal'");

    // jika ubah sukses 
    if ($ubah) {
        Flasher::setFlash('Berhasil','diubah','success');
        header("location:index.php");
        exit;
    } else {
        Flasher::setFlash('Gagal','diubah','danger');
        header("location:index.php");
        exit;
    }
 }
?>