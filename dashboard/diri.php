<?php
require '../backend/function.php';
session_start(); // Start session nya
// Kita cek apakah user sudah login atau belum
// Cek nya dengan cara cek apakah terdapat session username atau tidak
if (!isset($_SESSION['username'])) { // Jika tidak ada session username berarti dia belum login
    header("location: ../login_php/index.php"); // Kita Redirect ke halaman index.php karena belum login
}
$unik = $_GET["kode_unik"];
$siswa = query("SELECT * from data_siswa where kode_unik=$unik")[0];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Nunito.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"></div>
                    <div class="sidebar-brand-text mx-3"><span></span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link " href="user.php?kode_unik=<?= $unik ?>"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="diri.php?kode_unik=<?= $unik ?>"><i class="fas fa-user"></i><span>Data Pribadi</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="ortu.php?kode_unik=<?= $unik ?>"><i class="fas fa-user"></i><span>Data Orang Tua</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="nilai.php?kode_unik=<?= $unik ?>"><i class="fas fa-user"></i><span>Data Nilai</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>

                        <ul class="navbar-nav flex-nowrap ms-auto">


                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small"><?php echo $_SESSION['nama']; ?></span><img class="border rounded-circle img-profile" src="assets/img/avatars/avatar1.jpeg"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                                        <a class="dropdown-item" href="../login_php/logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Data Diri</h3>
                    </div>


                    <div class="row">
                        <div class="row">
                            <div class="col">
                                <label for="">Nama Lengkap</label>
                                <input type="text" class="form-control" placeholder="First name" aria-label="First name" value="<?= $siswa['nama'] ?>" disabled>
                            </div>
                            <div class="col">
                                <label for="">NISN</label>
                                <input type="text" class="form-control" placeholder="First name" aria-label="First name" value="<?= $siswa['nisn'] ?>" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="row">
                            <div class="col">
                                <label for="">Tempat Lahir</label>
                                <input type="text" class="form-control" placeholder="First name" aria-label="First name" value="<?= $siswa['tempat_lahir'] ?>" disabled>
                            </div>
                            <div class="col">
                                <label for="">Tanggal Lahir</label>
                                <input type="text" class="form-control" placeholder="First name" aria-label="First name" value="<?= $siswa['tanggal_lahir'] ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row">
                            <div class="col">
                                <label for="">Jenis Kelamin</label>
                                <input type="text" class="form-control" placeholder="First name" aria-label="First name" value="<?= $siswa['jenis_kelamin'] ?>" disabled>
                            </div>
                            <div class="col">
                                <label for="">Provinsi</label>
                                <?php
                                $provinsi = $siswa['provinsi'];
                                $prov = query("SELECT nama FROM wilayah WHERE kode = $provinsi");
                                ?>
                                <input type="text" class="form-control" placeholder="First name" aria-label="First name" value="<?= implode($prov[0]) ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row">
                            <div class="col">
                                <label for="">Kabupaten</label>
                                <?php
                                $kabupaten = $siswa['kabupaten'];
                                $kab = query("SELECT nama FROM wilayah WHERE kode = $kabupaten");

                                ?>
                                <input type="text" class="form-control" placeholder="First name" aria-label="First name" value="<?= implode($kab[0]) ?>" disabled>
                            </div>
                            <div class="col">
                                <label for="">Kecamatan</label>
                                <?php
                                $camat = $siswa['kecamatan'];
                                $kec= query("SELECT nama FROM wilayah WHERE kode ='$camat'");
                                ?>

                                <input type="text" class="form-control" placeholder="First name" aria-label="First name" value="<?= implode($kec[0]) ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row">
                            <div class="col">
                                <label for="">Kode Pos</label>

                                <input type="text" class="form-control" placeholder="First name" aria-label="First name" value="<?= $siswa['kode_pos'] ?>" disabled>
                            </div>
                            <div class="col">
                                <label for="">Alamat</label>
                                <input type="text" class="form-control" placeholder="First name" aria-label="First name" value="<?= $siswa['alamat'] ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row">
                            <div class="col">
                                <label for="">Agama</label>
                                <input type="text" class="form-control" placeholder="First name" aria-label="First name" value="<?= $siswa['agama'] ?>" disabled>
                            </div>
                            <div class="col">
                                <label for="">No HP</label>
                                <input type="text" class="form-control" placeholder="First name" aria-label="First name" value="<?= $siswa['no_hp'] ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row">
                            <div class="col-6">
                                <label for="">Jumlah Saudara</label>
                                <input type="text" class="form-control" placeholder="First name" aria-label="First name" value="<?= $siswa['jmlh_saudara'] ?>" disabled>
                            </div>

                        </div>
                    </div>


                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © 2022</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>