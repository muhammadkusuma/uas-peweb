<?php
require 'backend/function.php';
// session_start(); // Start session nya
// // Kita cek apakah user sudah login atau belum
// // Cek nya dengan cara cek apakah terdapat session username atau tidak
// if (!isset($_SESSION['username'])) { // Jika tidak ada session username berarti dia belum login
//     header("location: index.php"); // Kita Redirect ke halaman index.php karena belum login
// }
$data= $conn->prepare("SELECT * FROM data_siswa");
$data->execute();




?>