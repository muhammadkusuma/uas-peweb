<?php
require '../backend/function.php';
require "assets/fpdf/fpdf.php";
$pdf=new FPDF('P','mm','A4');
$pdf->AddPage();

// kop surat
 
$pdf->SetFont('Times','B',13);
$pdf->Cell(200,10,'DATA PENDAFTAR LULUS SISWA BARU SMKN 1 TAPUNG HULU',0,0,'C');
 
$pdf->Cell(10,15,'',0,1);
$pdf->SetFont('Times','B',9);
$pdf->Cell(10,7,'NO',1,0,'C');
$pdf->Cell(50,7,'NAMA' ,1,0,'C');
$pdf->Cell(20,7,'NISN',1,0,'C');
$pdf->Cell(50,7,'PILIHAN 1',1,0,'C');
$pdf->Cell(50,7,'PILIHAN 2',1,0,'C');
 

 
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Times','',10);
$no=1;
// $data = mysqli_query($koneksi,"SELECT  * FROM tbl_karyawan");
// while($d = mysqli_fetch_array($data)){
//   $pdf->Cell(10,6, $no++,1,0,'C');
//   $pdf->Cell(50,6, $d['karyawan_nama'],1,0);
//   $pdf->Cell(75,6, $d['karyawan_alamat'],1,0);  
//   $pdf->Cell(55,6, $d['karyawan_email'],1,1);
// }
$data= $conn->prepare("SELECT * FROM data_siswa, jurusan_dituju where data_siswa.kode_unik=jurusan_dituju.kode_unik and status='Diterima'");
$data->execute();
while($d = $data->fetch(PDO::FETCH_ASSOC)){
  $pdf->Cell(10,6, $no++,1,0,'C');
  $pdf->Cell(50,6, $d['nama'],1,0);
  $pdf->Cell(20,6, $d['nisn'],1,0);  
  $pdf->Cell(50,6, $d['jurusan_1'],1,0);
  $pdf->Cell(50,6, $d['jurusan_2'],1,1);
}
 
// mengetahui
$pdf->Output();
