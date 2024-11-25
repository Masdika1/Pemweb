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
$status = $_POST['tstatus'];

// simpan jika di klik
if(isset($_POST['bsimpan'])) {


    //persiapan simpan data baru
    $simpan = mysqli_query($conn, "INSERT INTO bulanan (nama, tanggal, jam, lokasi, deskripsi, status)
                                      VALUES ('$nama',
                                              '$tanggal',
                                              '$jam',
                                              '$lokasi',
                                              '$deskripsi',
                                              '$status')");

    // jika simpan sukses 
    if ($simpan) {
        Flasher::setFlash('Berhasil','ditambahkan','success');
        header("location:bulanan.php");
        exit;
    } else {
        Flasher::setFlash('Gagal','di ditambahkan','danger');
        header("location:bulanan.php");
        exit;
    }
 }
?>