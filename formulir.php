<?php

require 'backend/function.php';
// if (!isset($_SESSION['username'])) { // Jika tidak ada session username berarti dia belum login
//         header("location: index.php"); // Kita Redirect ke halaman index.php karena belum login
// }

$unik=$_GET["kode_unik"];
// $kode_unik = $_GET["kode_unik"];
// $email = $_get['email'];

if (isset($_POST['formulir'])) {
        if (formulir($_POST) > 0) {
                echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'ayah.php?kode_unik=$unik';
            </script>
        ";
                // var_dump($_POST);
        } else {
                echo "
            <script>
                alert('data gagal ditambahkan!');
                document.location.href = 'formulir.php?kode_unik=$unik';
            </script>
        ";
                // var_dump($_POST);
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
                                                        <h2 class="mb-5">Formulir Pendaftaran</h2>
                                                        <form class="" method="post" enctype="multipart/form-data">
                                                                <div class="mb-3">
                                                                        
                                                                        <input type="hidden" name="unik" value="<?= $unik; ?>">
                                                                        <label for="nama" class="form-label">Nama Lengkap</label>
                                                                        <input class="form-control mb-3" type="text" name="nama" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                        <label for="nisn" class="form-label">NISN</label>
                                                                        <input class="form-control" type="number" name="nisn" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                                                        <input class="form-control" type="text" name="tempat_lahir" required>
                                                                </div>
                                                                <div class="text-start mb-3">
                                                                        <label class="form-label text-start">Tanggal Lahir</label>
                                                                        <input class="form-control" type="date" name="tanggal_lahir" required>
                                                                </div>
                                                                <div class="text-start mb-3">
                                                                        <label class="form-label text-start">Jenis Kelamin</label>
                                                                        <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                                                                                <option value="Laki-laki">Laki-laki</option>
                                                                                <option value="Perempuan">Perempuan</option>

                                                                        </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                        <label for="form_prov" class="form-label">Provinsi</label>
                                                                        <select id="form_prov" class="w-100 form-select" aria-label="Default select example" name="provinsi">
                                                                                <option value="">Pilih Provinsi</option>
                                                                                <?php
                                                                                $daerah = query("SELECT * FROM wilayah WHERE CHAR_LENGTH(kode)=2 ORDER BY nama");
                                                                                foreach ($daerah as $row) : ?>
                                                                                        <option value="<?= $row["kode"]; ?>"><?= $row["nama"]; ?></option>
                                                                                <?php endforeach;

                                                                                ?>

                                                                        </select>

                                                                </div>
                                                                <div class="mb-3">
                                                                        <label for="form_kab" class="form-label">Kabupaten</label>
                                                                        <select id="form_kab" class="w-100 form-select" aria-label="Default select example" name="kabupaten"></select>

                                                                </div>
                                                                <div class="mb-3">
                                                                        <label for="form_kec" class="form-label">Kecamatan</label>
                                                                        <select id="form_kec" class="w-100 form-select" aria-label="Default select example" name="kecamatan"></select>
                                                                </div>
                                                                <div class="mb-3">
                                                                        <label for="kodepos" class="form-label">Kode Pos</label>
                                                                        <input class="form-control" type="number" name="kodepos" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                        <label for="alamat" class="form-label">Alamat</label>
                                                                        <input class="form-control" type="text" name="alamat" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                        <label for="agama" class="form-label">Agama</label>
                                                                        <select name="agama" class="w-100 form-select" aria-label="Default select example">
                                                                                <option value="Islam">Islam</option>
                                                                                <option value="Kristen">Kristen</option>
                                                                                <option value="Hindu">Hindu</option>
                                                                                <option value="Budha">Budha</option>
                                                                                <option value="Lainnya">Lainnya</option>
                                                                        </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                        <label for="nohp" class="form-label">Nomor Handphone</label>
                                                                        <input class="form-control" type="tel" name="nohp" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                        <label for="jumlah_saudara" class="form-label">Jumlah Saudara</label>
                                                                        <input class="form-control" type="number" name="jumlah_saudara" required>
                                                                </div>
                                                                <div class="text-start mb-3">
                                                                        <label for="foto" class="form-label">Upload Pas Foto</label>
                                                                        <input class="form-control" type="file" name="foto" required>
                                                                        <label class="form-label">Pas Foto 3x4 Background Merah, Ukuran File Maksimal 2Mb tipe JPEG/PNG</label>
                                                                </div>
                                                                <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit" name="formulir">Selanjutnya</button></div>
                                                        </form>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </section>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery-3.6.2.min.js"></script>
        <script type="text/javascript">
                $(document).ready(function() {

                        // sembunyikan form kabupaten, kecamatan dan desa
                        $("#form_kab").hide();
                        $("#form_kec").hide();
                        $("#form_des").hide();

                        // ambil data kabupaten ketika data memilih provinsi
                        $('body').on("change", "#form_prov", function() {
                                var id = $(this).val();
                                var data = "id=" + id + "&data=kabupaten";
                                $.ajax({
                                        type: 'POST',
                                        url: "backend/getDaerah.php",
                                        data: data,
                                        success: function(hasil) {
                                                $("#form_kab").html(hasil);
                                                $("#form_kab").show();
                                                $("#form_kec").hide();
                                                $("#form_des").hide();
                                        }
                                });
                        });

                        // ambil data kecamatan/kota ketika data memilih kabupaten
                        $('body').on("change", "#form_kab", function() {
                                var id = $(this).val();
                                var data = "id=" + id + "&data=kecamatan";
                                $.ajax({
                                        type: 'POST',
                                        url: "backend/getDaerah.php",
                                        data: data,
                                        success: function(hasil) {
                                                $("#form_kec").html(hasil);
                                                $("#form_kec").show();
                                                $("#form_des").hide();
                                        }
                                });
                        });

                        // ambil data desa ketika data memilih kecamatan/kota
                        $('body').on("change", "#form_kec", function() {
                                var id = $(this).val();
                                var data = "id=" + id + "&data=desa";
                                $.ajax({
                                        type: 'POST',
                                        url: "backend/getDaerah.php",
                                        data: data,
                                        success: function(hasil) {
                                                $("#form_des").html(hasil);
                                                $("#form_des").show();
                                        }
                                });
                        });


                });
        </script>
</body>

</html>