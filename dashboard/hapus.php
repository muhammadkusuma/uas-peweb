<?php
session_start(); // Start session nya
// Kita cek apakah user sudah login atau belum
// // Cek nya dengan cara cek apakah terdapat session username atau tidak
if($_SESSION['level']==='admin'){
    if (!isset($_SESSION['username'])) { // Jika tidak ada session username berarti dia belum login
        header("location: ../login_php/index.php"); // Kita Redirect ke halaman index.php karena belum login
    }
}else{
    header("location: ../login_php/index.php");
}
require '../backend/function.php';
$id=$_GET["id"];

if (hapus($id)>0){
    echo "<script>
               alert('data berhasil dihapus');
               document.location.href='index.php';
            </script>";

}else {
    echo "<script>
               alert('data gagal dihapus');
               document.location.href='../dashboard/pengguna.php';
            </script>";
}
