<?php
require '../backend/function.php';
// session_start(); // Start session nya
// // Kita cek apakah user sudah login atau belum
// // Cek nya dengan cara cek apakah terdapat session username atau tidak
// if($_SESSION['level']==='kepsek'){
//     if (!isset($_SESSION['username'])) { // Jika tidak ada session username berarti dia belum login
//         header("location: ../login_php/index.php"); // Kita Redirect ke halaman index.php karena belum login
//     }
// }else{
//     header("location: ../login_php/index.php");
// }
$jmlh_pendaftar = query("SELECT count(*) from data_siswa");
$jmlh_tolak = query("SELECT count(*) from data_siswa where status='Ditolak'");
$jmlh_terima = query("SELECT count(*) from data_siswa where status='Diterima'");


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
                    <li class="nav-item"><a class="nav-link " href="kepsek.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="daftar.php"><i class="fas fa-user"></i><span>Laporan Pendaftar</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="lulus.php"><i class="fas fa-user"></i><span>Laporan
                                Kelulusan</span></a></li>
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
                        <h3 class="text-dark mb-0">Laporan Pendaftaran</h3>
                    </div>
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <a href="cetak_daftar.php" class="btn btn-primary">Cetak</a>
                    </div>
                </div>
                <div class="container-fluid">

                    <?php
                    // if (isset($_POST['cek'])) {
                    //     $tawal = $_POST['tawal'];
                    //     $takhir = $_POST['takhir'];
                    //     $data = query("SELECT * FROM data_siswa WHERE tgl_daftar BETWEEN '$tawal' AND '$takhir'");
                    // } else {
                    //     $data = query("SELECT * FROM data_siswa");
                    // }

                    ?>
                    <table>
                        <table cellspacing="0" cellpadding="10">
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>NISN</th>
                                <th>PILIHAN 1</th>
                                <th>PILIHAN 2</th>
                            </tr>
                            <?php $i = 1;
                            $data = $conn->prepare("SELECT * FROM data_siswa, jurusan_dituju where data_siswa.kode_unik=jurusan_dituju.kode_unik");
                            $data->execute();
                            ?>
                            <?php while ($d = $data->fetch(PDO::FETCH_ASSOC)) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $d['nama']; ?></td>
                                    <td><?= $d['nisn']; ?></td>
                                    <td><?= $d['jurusan_1']; ?></td>
                                    <td><?= $d['jurusan_2']; ?></td>
                                </tr>
                                <?php $i++; ?>
                            <?php endwhile; ?>
                        </table>


                        <!-- <form action="" method="post">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Tanggal Awal</label>
                                    <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="tawal">

                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Tanggal Akhir</label>
                                    <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="takhir">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <button type="submit" name="cek" class="btn btn-primary w-100">Proses</button>
                                </div>
                            </div>
                        </div>
                    </form> -->
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