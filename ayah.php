<?php
require 'backend/function.php';


if (isset($_POST['ayah'])) {


    //     global $conn;

    //     $nama = $_POST['nama'];
    //     $nik = $_POST['nik'];
    //     $tempat_lahir = $_POST['tempat_lahir'];
    //     $tanggal_lahir = $_POST['tanggal_lahir'];
    //     $agama = $_POST['agama'];
    //     $pendidikan = $_POST['pendidikan'];
    //     $pekerjaan = $_POST['pekerjaan'];
    //     $penghasilan = $_POST['penghasilan'];
    //     $no_hp = $_POST['no_hp'];
    //     $alamat= $_POST['alamat'];
    //     $keterangan = $_POST['keterangan'];
    //     $sql = "INSERT INTO ayah (nama,nik, tempat_lahir,tanggal_lahir,agama, pend_terakhir, pekerjaan, penghasilan, alamat, no_hp, keterangan)
    // VALUES ('$nama','$nik','$tempat_lahir','$tanggal_lahir','$agama','$pendidikan','$pekerjaan','$penghasilan','$alamat','$no_hp','$keterangan')";

    //     $conn->exec($sql);

    //     var_dump($sql);

    try {
        if (ayah($_POST) > 0) {
            echo "
        <script>
            alert('data berhasil ditambahkan!');
            document.location.href = 'index.php';
        </script>
    ";
        } else {
            echo "
        <script>
            alert('data gagal ditambahkan!');
            document.location.href = 'formulir.php';
        </script>
    ";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
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
    <section class="position-relative py-4 py-xl-5">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-5">
                        <div class="card-body d-flex flex-column align-items-center">
                            <h2 class="mb-5">Data Ayah</h2>
                            <form class="" method="post">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                    <input class="form-control mb-3" type="text" name="nama" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input class="form-control mb-3" type="number" name="nik" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                    <input class="form-control" type="text" name="tempat_lahir" required>
                                </div>
                                <div class="text-start mb-3">
                                    <label class="form-label text-start">Tanggal Lahir</label>
                                    <input class="form-control" type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" required>
                                </div>
                                <div class="mb-3">
                                    <label for="agama" class="form-label">Agama</label>
                                    <select name="agama" class="w-100 form-select">
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="Pendidikan" class="form-label">Pendidikan Terakhir</label>
                                    <select name="pendidikan" class="w-100 form-select">
                                        <option value="SD/Sederajat">SD/Sederajat</option>
                                        <option value="SMP/Sederajat">SMP/Sederajat</option>
                                        <option value="SMA/Sederajat">SMA/Sederajat</option>
                                        <option value="S1/Sederajat">S1/Sederajat</option>
                                        <option value="S2/Sederajat">S2/Sederajat</option>
                                        <option value="S3/Sederajat">S3/Sederajat</option>
                                        <option value="Tidak bersekolah">Tidak Bersekolah</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                    <input class="form-control" type="text" name="pekerjaan" required>
                                </div>
                                <div class="mb-3">
                                    <label for="penghasilan" class="form-label">Penghasilan</label>
                                    <input class="form-control" type="number" name="penghasilan" required>
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp" class="form-label">Nomor Handphone</label>
                                    <input class="form-control" type="tel" name="no_hp" required>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input class="form-control" type="text" name="alamat" required>
                                </div>
                                <div class="mb-3">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <select name="keterangan" class="w-100 form-select">
                                        <option value="Masih Hidup">Masih Hidup</option>
                                        <option value="Almarhum">Almarhum</option>
                                    </select>
                                </div>
                                <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit" name="ayah">Selanjutnya</button>
                                    <div class="mt-3"><button class="btn btn-outline-primary d-block w-100" type="submit">Kembali</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>