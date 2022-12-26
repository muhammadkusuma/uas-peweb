<?php
session_start(); // Start session nya
// Kita cek apakah user sudah login atau belum
// // Cek nya dengan cara cek apakah terdapat session username atau tidak
// if ($_SESSION['level'] === 'admin') {
//     if (!isset($_SESSION['username'])) { // Jika tidak ada session username berarti dia belum login
//         header("location: ../login_php/index.php"); // Kita Redirect ke halaman index.php karena belum login
//     }
// } else {
//     header("location: ../login_php/index.php");
// }
require '../backend/function.php';
$conn = getConnection();



$kode_unik = $_GET["kode_unik"];
$jurusan_1 = $_GET["jurusan_1"];


// $data = $conn->prepare("SELECT * FROM data_siswa, jurusan_dituju, riwayat_pendidikan where data_siswa.kode_unik=jurusan_dituju.kode_unik && data_siswa.kode_unik=riwayat_pendidikan.kode_unik");
// $data->execute();

// $update1 = $conn->prepare("UPDATE data_siswa set status='Diterima' where data_siswa.kode_unik=jurusan_dituju.kode_unik && data_siswa.kode_unik=riwayat_pendidikan.kode_unik");
// $update1 = $conn->prepare("UPDATE riwayat_pendidikan set jurusan_1='$jurusan_1' && jurusan_2='' where  data_siswa.kode_unik=jurusan_dituju.kode_unik && data_siswa.kode_unik=riwayat_pendidikan.kode_unik");
// $update1->execute();

if (pilihan1($kode_unik)>0){
    // echo "<script>
    //            alert('data berhasil dihapus');
    //            document.location.href='index.php';
    //         </script>";
    var_dump(pilihan1($kode_unik));

}else {
    // echo "<script>
    //            alert('data gagal dihapus');
    //            document.location.href='../dashboard/pengguna.php';
    //         </script>";
    var_dump(pilihan1($kode_unik));

}

// $query = "UPDATE user SET level='$level' WHERE id=$id";
