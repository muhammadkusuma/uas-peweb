<?php
require 'backend/function.php';
// session_start(); // Start session nya
// // Kita cek apakah user sudah login atau belum
// // Cek nya dengan cara cek apakah terdapat session username atau tidak
// if (!isset($_SESSION['username'])) { // Jika tidak ada session username berarti dia belum login
//     header("location: index.php"); // Kita Redirect ke halaman index.php karena belum login
// }
$admin = md5('admin');
$data= $conn->prepare("insert into user (username, password, nama, email) values ('admin', '$admin', 'admin', 'admin')");
$data->execute();

var_dump($data);




?>