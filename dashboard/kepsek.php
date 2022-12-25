<?php
require '../backend/function.php';
// session_start(); // Start session nya
// // Kita cek apakah user sudah login atau belum
// // Cek nya dengan cara cek apakah terdapat session username atau tidak
// if (!isset($_SESSION['username'])) { // Jika tidak ada session username berarti dia belum login
//     header("location: index.php"); // Kita Redirect ke halaman index.php karena belum login
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
    <script src="https://cdnjs.com/libraries/Chart.js"></script>
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
                    <li class="nav-item"><a class="nav-link active" href="kepsek.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="daftar.php"><i class="fas fa-user"></i><span>Laporan Pendaftar</span></a></li>
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
                        <h3 class="text-dark mb-0">Halo <?php echo $_SESSION['nama'] ?></h3>
                    </div>
                    

                    <div class="row">
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>Jumlah Pendaftar</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span><?= implode($jmlh_pendaftar[0]) ?></span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>Jumlah Diterima</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span><?= implode($jmlh_terima[0]) ?></span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>Jumlah Ditolak</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span><?= implode($jmlh_tolak[0]) ?></span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Peminat Perjurusan</h3>
                    </div>
                    <div style="width: auto;margin: 0px auto;">
                        <canvas id="myChart"></canvas>
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
    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Teknik Komputer dan Jaringan",
                    "Akutansi", "Teknik Sepeda Motor",
                    "Teknik Kendaraan Ringan",
                    "Tataboga",
                    "Rekayasa Perangkat Lunak",
                    "Agribisnis Tanaman Perkebunan"
                ],
                datasets: [{
                    label: '',
                    data: [
                        <?php
                        $tkj = query("SELECT count(*) from jurusan_dituju where 
                        jurusan_1='Teknik Komputer dan Jaringan' or jurusan_2='Teknik Komputer dan Jaringan'");
                        $tkjstr = implode($tkj[0]);
                        echo (int) $tkjstr;
                        ?>,
                        <?php
                        $aku = query("SELECT count(*) from jurusan_dituju where 
                        jurusan_1='Akutansi' or jurusan_2='Akutansi'");
                        $akustr = implode($aku[0]);
                        echo (int) $akustr;
                        ?>,
                        <?php
                        $tsm = query("SELECT count(*) from jurusan_dituju where 
                        jurusan_1='Teknik Sepeda Motor' or jurusan_2='Teknik Sepeda Motor'");
                        $tsmstr = implode($tsm[0]);
                        echo (int) $tsmstr;
                        ?>,
                        <?php
                        $tkr = query("SELECT count(*) from jurusan_dituju where 
                        jurusan_1='Teknik Kendaraan Ringan' or jurusan_2='Teknik Kendaraan Ringan'");
                        $tkrstr = implode($tkr[0]);
                        echo (int) $tkrstr;
                        ?>,
                        <?php
                        $boga = query("SELECT count(*) from jurusan_dituju where 
                        jurusan_1='Tataboga' or jurusan_2='Tataboga'");
                        $bogastr = implode($boga[0]);
                        echo (int) $bogastr;
                        ?>,
                        <?php
                        $rpl = query("SELECT count(*) from jurusan_dituju where 
                        jurusan_1='Rekayasa Perangkat Lunak' or jurusan_2='Rekayasa Perangkat Lunak'");
                        $rplstr = implode($rpl[0]);
                        echo (int) $rplstr;
                        ?>,
                        <?php
                        $atp = query("SELECT count(*) from jurusan_dituju where 
                        jurusan_1='Agribisnis Tanaman Perkebunan' and jurusan_2='Agribisnis Tanaman Perkebunan'");
                        $atpstr = implode($atp[0]);
                        echo (int) $atpstr;
                        ?>,
                        

                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>

</html>