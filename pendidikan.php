<?php
require_once 'backend/function.php';
$unik = $_GET["kode_unik"];
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
        echo "
    <script>
        alert('data berhasil ditambahkan!');
        document.location.href = 'jurusan.php?kode_unik=$unik';
    </script>
";
    } else {
        echo "
    <script>
        alert('data gagal ditambahkan!');
        document.location.href = 'pendidikan.php?kode_unik=$unik';
    </script>
";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>PPDB</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark-Multi-Column-icons.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container-md">
        <div class="card">
            <form class="p-3" method="post" enctype="multipart/form-data">
                <input type="hidden" name="unik" value="<?= $unik; ?>">
                <h2 class="mb-5">Riwayat Pendidikan</h2>
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="asal_sekolah" placeholder="SMP Negeri " required name="asal_sekolah">
                            <label for="asal_sekolah">Asal Sekolah</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="floatingInput" placeholder="0" required name="agama">
                            <label for="floatingInput">Nilai Pendidikan Agama dan Budi Pekerti</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="asal_sekolah" placeholder="SMP Negeri " required name="pkn">
                            <label for="asal_sekolah">Nilai Pendidikan dan Kewarganegaraan</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="floatingInput" placeholder="0" required name="bahasa">
                            <label for="floatingInput">Nilai Bahasa Indonesia</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="asal_sekolah" placeholder="SMP Negeri " required name="mtk">
                            <label for="asal_sekolah">Nilai Matematika</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="floatingInput" placeholder="0" required name="ipa">
                            <label for="floatingInput">Nilai Ilmu Pengetahuan Alam</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="asal_sekolah" placeholder="SMP Negeri " required name="ips">
                            <label for="asal_sekolah">Nilai Ilmu Pengetahuan Sosial</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="floatingInput" placeholder="0" required name="inggris">
                            <label for="floatingInput">Nilai Bahasa Inggris</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="asal_sekolah" placeholder="SMP Negeri " required name="pjok">
                            <label for="asal_sekolah">Nilai Pendidikan Jasmani, Olahraga dan Kesehatan</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="floatingInput" placeholder="0" required name="armel">
                            <label for="floatingInput">Nilai Arab Melayu</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="floatingInput" placeholder="0" required name="seni">
                            <label for="floatingInput">Nilai Seni Budaya</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="file" class="form-control" id="asal_sekolah" placeholder="SMP Negeri " required name="skl">
                            <label for="exampleFormControlInput1" class="form-label">Surat Keterangan Lulus</label>
                        </div>
                    </div>

                </div>
                <button type="submit" name="submit" class="btn btn-primary w-100 mb-2" name="pendidikan">Selanjutnya</button>
                <a href="#" class="btn btn-outline-primary w-100">Kembali</a>

            </form>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>