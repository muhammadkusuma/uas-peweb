<?php
require '../backend/function.php';
session_start(); // Start session nya
// Kita cek apakah user sudah login atau belum
// Cek nya dengan cara cek apakah terdapat session username atau tidak
// if (!isset($_SESSION['username'])) { // Jika tidak ada session username berarti dia belum login
//     header("location: ../login_php/index.php"); // Kita Redirect ke halaman index.php karena belum login
// }

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
                    <div class="sidebar-brand-icon rotate-n-15"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>Halo Admin</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link " href="admin.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="admin_daftar.php"><i class="fas fa-user"></i><span>Data
                                Pendaftar</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="standar_nilai.php"><i class="fas fa-table"></i><span>Standar
                                Nilai</span></a></li>
                    <li class="nav-item"><a class="nav-link " href="pengguna.php"><i class="far fa-user-circle"></i><span>Data Pengguna</span></a></li>
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
                                        <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <?php

                    $sql = $conn->prepare("SELECT * from riwayat_pendidikan");
                    $sql->execute();
                    ?>
                    <?php while ($d = $sql->fetch(PDO::FETCH_ASSOC)) {

                        $i;
                        $agama = ((int)$d['agama']);
                        $pkn = ((int)$d['pkn']);
                        $mtk = ((int)$d['mtk']);
                        $ipa = ((int)$d['ipa']);
                        $ips = ((int)$d['ips']);
                        $inggris = ((int)$d['inggris']);
                        $seni = ((int)$d['seni']);
                        $pjok = ((int)$d['pjok']);
                        $armel = ((int)$d['armel']);

                        $i++;
                        $rata = $agama + $pkn + $mtk + $ipa + $ips + $inggris + $seni + $pjok + $armel / 9;
                        var_dump($rata);
                        if ($rata > 90) {
                            echo "lulus";
                        } else {
                            echo "gagal";
                        }
                    }
                    ?>



                    <form action="" method="post">
                        <div class="row">
                            <div class="row">
                                <div class="col">
                                    <label for="">Tenik Komputer dan Jaringan</label>
                                    <input type="number" class="form-control" value="<?= $nilai['asal_sekolah'] ?>">
                                </div>
                                <div class="col">
                                    <label for="">Akutansi</label>
                                    <input type="number" class="form-control" value="<?= $nilai['agama'] ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="row">
                                <div class="col">
                                    <label for="">Teknik Sepeda Motor </label>
                                    <input type="number" class="form-control" value="<?= $nilai['pkn'] ?>">
                                </div>
                                <div class="col">
                                    <label for="">Teknik Kendaraan Ringan</label>
                                    <input type="number" class="form-control" value="<?= $nilai['bahasa'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="row">
                                <div class="col">
                                    <label for="">Tataboga</label>
                                    <input type="number" class="form-control" value="<?= $nilai['mtk'] ?>">
                                </div>
                                <div class="col">
                                    <label for="">Rekayasa Perangkat Lunak</label>

                                    <input type="number" class="form-control" value="<?= $nilai['ipa'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="row">
                                <div class="col">
                                    <label for="">Agribisnis Tanaman Perkebunan</label>

                                    <input type="number" class="form-control" value="<?= $nilai['ips'] ?>">
                                </div>
                                <div class="col mt-4">
                                    <button class="btn btn-primary d-block w-100" type="submit" name="proses">Proses</button>
                                </div>
                            </div>
                        </div>

                    </form>
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