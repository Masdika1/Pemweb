<?php
session_start();
//panggil koneksi database
include "koneksi.php";
require_once 'Flasher.php';

$nama = $_POST['tnama'];
$tanggal = $_POST['ttanggal'];
$jam = $_POST['tjam'];
$lokasi = $_POST['tlokasi'];
$deskripsi = $_POST['tdeskripsi'];

// simpan jika di klik
if(isset($_POST['bsimpan'])) {


    //persiapan simpan data baru
    $simpan = mysqli_query($conn, "INSERT INTO jadwal (nama, tanggal, jam, lokasi, deskripsi)
                                      VALUES ('$nama',
                                              '$tanggal',
                                              '$jam',
                                              '$lokasi',
                                              '$deskripsi')");

    // jika simpan sukses 
    if ($simpan) {
        Flasher::setFlash('Berhasil','ditambahkan','success');
        header("location:index.php");
        exit;
    } else {
        Flasher::setFlash('Gagal','di ditambahkan','danger');
        header("location:index.php");
        exit;
    }
 }
?>