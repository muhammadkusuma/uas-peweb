<?php
require_once 'backend/function.php';

if (isset($_POST['submit'])) {
    // try {
    //     $conn = getConnection();
    //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     $asal = $_POST["asal_sekolah"];
    //     $agama = $_POST["agama"];
    //     $pkn = $_POST["pkn"];
    //     $bahasa = $_POST["bahasa"];
    //     $mtk = $_POST["mtk"];
    //     $ipa = $_POST["ipa"];
    //     $ips = $_POST["ips"];
    //     $inggris = $_POST["inggris"];
    //     $seni = $_POST["seni"];
    //     $pjok = $_POST["pjok"];
    //     $armel = $_POST["armel"];

    //     $sql = "INSERT INTO riwayat_pendidikan (asal_sekolah, agama, pkn, bahasa, mtk, ipa, ips, inggris, seni, pjok, armel,)
    //     VALUES ('$asal','$agama','$pkn','$bahasa','$mtk','$ipa','$ips','$inggris','$seni','$pjok','$armel')";
    //     $conn->exec($sql);
    //     echo "New record created successfully";
    // } catch (PDOException $e) {
    //     echo $sql . "<br>" . $e->getMessage();
    // }
    // var_dump($_POST);
    if (pendidikan($_POST) > 0) {
        echo "berhasil";
    } else {
        echo "gagal";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="asal_sekolah">Asal Sekolah</label>
        <input type="text" name="asal_sekolah" id="asal_sekolah" required>
        <br>
        <label for="agama">Nilai Pendidikan Agama dan Budi Pekerti</label>
        <input type="number" name="agama" id="agama" required>
        <br>
        <label for="pkn">Nilai Pendidikan Pancasila dan Kewarganegaraan</label>
        <input type="number" name="pkn" id="pkn" required>
        <br>
        <label for="bahasa">Nilai Bahasa Indonesia</label>
        <input type="number" name="bahasa" id="bahasa" required>
        <br>
        <label for="mtk">Nilai Matematika</label>
        <input type="number" name="mtk" id="mtk" required>
        <br>
        <label for="ipa">Nilai Ilmu Pengetahuan Alam</label>
        <input type="number" name="ipa" id="ipa" required>
        <br>
        <label for="ips">Nilai Ilmu Pengetahuan Sosial</label>
        <input type="number" name="ips" id="ips" required>
        <br>
        <label for="inggris">Nilai Bahasa Inggris</label>
        <input type="number" name="inggris" id="inggris" required>
        <br>
        <label for="seni">Nilai Seni Budaya</label>
        <input type="number" name="seni" id="seni" required>
        <br>
        <label for="pjok">Nilai Pendidikan Jasmani, Olahraga, dan Kesehatan</label>
        <input type="number" name="pjok" id="pjok" required>
        <br>
        <label for="armel">Nilai Arab Melayu</label>
        <input type="number" name="armel" id="armel" required>
        <br>
        <label for="skl">Surat Keterangan Lulus</label>
        <input type="file" name="skl" id="skl" required>
        <br>
        <button type="submit" name="submit">Lanjut</button>



    </form>
</body>

</html>