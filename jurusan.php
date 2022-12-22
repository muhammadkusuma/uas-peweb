<?php
require_once 'backend/function.php';

if (isset($_POST["jurusan"])) {
    try {
        $conn = getConnection();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO jurusan_dituju (jurusan_1, jurusan_2)
        VALUES ('" . $_POST['jurusan_1'] . "', '" . $_POST['jurusan_2'] . "')";
        $conn->exec($sql);
        echo "New record created successfully";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    // if (jurusan($_POST) > 0) {
    //     echo "<script>
    //                         alert('User baru berhasil ditambahkan!');
    //                document.location.href='formulir.php';
    //                     </script>";
    // } else {
    //     echo "<script>
    //                         alert('User baru GAGAL ditambahkan!');
    //                document.location.href='signup.php';
    //                     </script>";
    // }
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
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <section class="position-relative py-4 py-xl-5">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-5">
                        <div class="card-body d-flex flex-column align-items-center">
                            <h2 class="mb-5">Jurusan yang Dituju</h2>
                            <form class="text-center" method="post">
                                <div class="mb-3">
                                    <select name="pilihan1" class="w-100 form-select" aria-label="Default select example">
                                        <option value="">Jurusan Pilihan 1</option>
                                        <option value="Teknik Kompuer dan Jaringan">Teknik Komputer dan Jaringan
                                        </option>
                                        <option value="Akautansi">Akutansi</option>
                                        <option value="Teknik Sepeda Motor">Teknik Sepeda Motor</option>
                                        <option value="Teknik Kendaraan Ringan">Teknik Kendaraan Ringan</option>
                                        <option value="Tataboga">Tataboga</option>
                                        <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                        <option value="Agribisnis Tanaman Perkebunan">Agribisnis Tanaman Perkebunan
                                        </option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <select name="pilihan2" class="w-100 form-select" aria-label="Default select example">
                                        <option value="">Jurusan Pilihan 2</option>
                                        <option value="Teknik Kompuer dan Jaringan">Teknik Komputer dan Jaringan
                                        </option>
                                        <option value="Akautansi">Akutansi</option>
                                        <option value="Teknik Sepeda Motor">Teknik Sepeda Motor</option>
                                        <option value="Teknik Kendaraan Ringan">Teknik Kendaraan Ringan</option>
                                        <option value="Tataboga">Tataboga</option>
                                        <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                        <option value="Agribisnis Tanaman Perkebunan">Agribisnis Tanaman Perkebunan
                                        </option>
                                    </select>
                                </div>
                                <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit" name="jurusan">Selanjutnya</button></div>
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