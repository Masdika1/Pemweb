<?php
    if( !session_id() ) session_start();
    //panggil koneksi databse
    include "koneksi.php";
    require_once 'Flasher.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>JADWAL</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark d-flex justify-content-between px-5">
            <div class="ml-3">
                <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
                <!-- Navbar Brand-->
                <a class="navbar-brand ps-3" href="index.php">Schedule</a>
                <!-- Sidebar Toggle-->
            </div>
            <p class="text-white my-auto">
                <?php
                if (isset($_SESSION['nama'])) {
                    echo "Selamat datang, " . htmlspecialchars($_SESSION['nama']);
                } else {
                    echo "Pengguna";
                }
                ?>
            </p>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Rencana Kegiatan
                            </a>
                            <a class="nav-link" href="harian.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Aktivitas Harian
                            </a>
                            <a class="nav-link" href="mingguan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Aktivitas Mingguan
                            </a>
                            <a class="nav-link" href="bulanan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Aktivitas Bulanan
                            </a>
                            <a class="nav-link" href="logout.php">
                                Keluar
                            </a>


                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Rencana Kegiatan </h1>
                        <br>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body">Aktivitas Harian</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="harian.php">Lihat Detail</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body">Aktivitas Mingguan</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="mingguan.php">Lihat Detail</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body">Aktivitas Bulanan</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="bulanan.php">Lihat Detail</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalTambah">
                                    Tambah Kegiatan
                                </button>
                            </div>
                            <div class="card-body">
                                    <div class="col-lg-6">
                                        <?php Flasher::flash(); ?>
                                    </div>
                                    <div class = "table-responsive">
                                        <table class="table table-bordered table-striped table-hover">
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Nama Kegiatan</th>
                                                <th class="text-center">Tanggal</th>
                                                <th class="text-center">Jam</th>
                                                <th class="text-center">Lokasi</th>
                                                <th class="text-center">Deskripsi</th>
                                                <th class="text-center">AKSI</th>
                                            </tr>
                                            <?php

                                            //persiapan menampilkan data
                                            $no = 1;
                                            $tampil = mysqli_query($conn, "SELECT * FROM jadwal ORDER BY idjadwal DESC");
                                            while($data = mysqli_fetch_array($tampil)) :
                                            ?>
                                                <tr>
                                                    <td class="text-center"><?= $no++ ?></td>
                                                    <td class="text-center"><?= $data['nama'] ?></td>
                                                    <td class="text-center"><?= $data['tanggal'] ?></td>
                                                    <td class="text-center"><?= $data['jam'] ?></td>
                                                    <td class="text-center"><?= $data['lokasi'] ?></td>
                                                    <td class="text-center"><?= $data['deskripsi'] ?></td>
                                                    <td class="text-center"> 
                                                        <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>">UBAH</a>
                                                        <a href="#" class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>">HAPUS</a>
                                                    </td>
                                                </tr>

                                                <!-- Awal modal Ubah -->
                                                <div class="modal fade" id="modalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLabel">Ubah Kegiatan</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form method="POST" action="ubah.php">
                                                                <input type="hidden" name="idjadwal" value="<?= $data['idjadwal']?>">

                                                                <div class="modal-body">

                                                                    <div class="mb-3">
                                                                        <label class="form-label">Nama Kegiatan</label>
                                                                        <input type="text" class="form-control" name="tnama" value="<?= $data['nama'] ?>" placeholder="Masukkan Nama Kegiatan">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Tanggal</label>
                                                                        <input type="Date" class="form-control" name="ttanggal" value="<?= $data['tanggal'] ?>" placeholder="Masukkan Tanggal kegiatan">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Jam</label>
                                                                        <input type="Time" class="form-control" name="tjam" value="<?= $data['jam'] ?>" placeholder="Masukkan Jam kegiatan">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Lokasi</label>
                                                                        <input type="text" class="form-control" name="tlokasi" value="<?= $data['lokasi'] ?>"placeholder="Masukkan Lokasi Kegiatan">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Deskripsi</label>
                                                                        <input type="text" class="form-control" name="tdeskripsi"value="<?= $data['deskripsi'] ?>" placeholder="Masukkan deskripsi kegiatan">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                                                                    <button type="submit" class="btn btn-primary" name="bubah">Ubah</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Akhir modal Ubah-->

                                                <!-- Awal modal Hapus -->
                                                <div class="modal fade" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form method="POST" action="hapus.php">
                                                                <input type="hidden" name="idjadwal" value="<?= $data['idjadwal']?>">

                                                                <div class="modal-body">

                                                                    <h5 class="text-center"> Apakah Anda Yakin Akan Menghapus Kegiatan Ini ? <br>
                                                                        <span class="text-danger"><?= $data['nama']?></span>
                                                                    </h5>
                                                                
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tidak</button>
                                                                    <button type="submit" class="btn btn-primary" name="bhapus">Hapus</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Akhir modal Hapus-->
                                            <?php endwhile; ?>
                                        </table>
                                    </div>
                                    <!-- Awal modal Tambah-->
                                    <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Kegiatan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form method="POST" action="tambah.php">
                                                    <div class="modal-body">

                                                        <div class="mb-3">
                                                            <label class="form-label">Nama Kegiatan</label>
                                                            <input type="text" class="form-control" name="tnama" placeholder="Masukkan Nama Kegiatan">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Tanggal</label>
                                                            <input type="Date" class="form-control" name="ttanggal" placeholder="Masukkan Tanggal Kegiatan">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Jam</label>
                                                            <input type="Time" class="form-control" name="tjam" placeholder="Masukkan Jam Kegiatan">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Lokasi</label>
                                                            <input type="text" class="form-control" name="tlokasi" placeholder="Masukkan Lokasi Kegiatan">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Deskripsi</label>
                                                            <input type="text" class="form-control" name="tdeskripsi" placeholder="Masukkan Deskripsi Kegiatan">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Akhir modal Tambah-->
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
