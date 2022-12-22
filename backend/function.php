<?php
require 'getConnection.php';
$conn = getConnection();

function query($query)
{
    global $conn;
    $result = $conn->query($query);
    $rows = [];
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $rows[] = $row;
    }

    return $rows;
}

function buat_akun($data)
{
    global $conn;
    $email = $data["email"];
    $username = $data["username"];
    $password = $data["password"];


    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO daftar_akun (email, username, password,level) VALUES ('$email','$username','$password', 'pendaftar')";
    $conn->exec($sql);

    return $conn->lastInsertId();
}

function formulir($data)
{
    global $conn;

    $foto_pendaftar = upload();
    if (!$foto_pendaftar) {
        return false;
    }

    $nama_lengkap = $data["nama"];
    $nisn = $data["nisn"];
    $tempat_lahir = $data["tempat_lahir"];
    $tanggal_lahir = $data["tanggal_lahir"];
    $jenis_kelamin = $data["jenis_kelamin"];
    $provinsi = $data["provinsi"];
    $kabupaten = $data["kabupaten"];
    $kecamatan = $data["kecamatan"];
    $kodepos = $data["kodepos"];
    $alamat = $data["alamat"];
    $agama = $data["agama"];
    $no_hp = $data["nohp"];
    $jumlah_saudara = $data["jumlah_saudara"];
    $foto = upload();

    $sql = "INSERT INTO data_siswa 
    ( nama, nisn,  tempat_lahir, tanggal_lahir, jenis_kelamin, provinsi, 
    kabupaten, kecamatan, kode_pos, alamat, agama, no_hp, jmlh_saudara, upload_foto, status)
    VALUES ('$nama_lengkap','$nisn','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$provinsi',
    '$kabupaten','$kecamatan','$kodepos','$alamat','$agama','$no_hp',$jumlah_saudara,'$foto','Diproses')";

    $conn->exec($sql);

    return $conn->lastInsertId();
}


function upload()
{
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
                alert('pilih gambar terlebih dahulu!');
            </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('yang anda upload bukan gambar!');
            </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranFile > 2000000) {
        echo "<script>
                alert('ukuran gambar terlalu besar!');
            </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}

function ayah($data)
{
    global $conn;

    $nama = $data["nama"];
    $nik = $data["nik"];
    $tempat_lahir = $data["tempat_lahir"];
    $tanggal_lahir = $data["tanggal_lahir"];
    $agama = $data["agama"];
    $pendidikan = $data["pendidikan"];
    $pekerjaan = $data["pekerjaan"];
    $penghasilan = $data["penghasilan"];
    $no_hp = $data["no_hp"];
    $alamat = $data["alamat"];
    $keterangan = $data["keterangan"];


    $sql = "INSERT INTO ayah (nama,nik, tempat_lahir,tanggal_lahir,agama, pend_terakhir, pekerjaan, penghasilan, alamat, no_hp, keterangan)
    VALUES ('$nama','$nik','$tempat_lahir','$tanggal_lahir','$agama','$pendidikan','$pekerjaan','$penghasilan','$alamat','$no_hp','$keterangan')";

    $conn->exec($sql);

    return $conn->lastInsertId();
}

function ibu($data)
{
    global $conn;

    $nama = $data["nama"];
    $nik = $data["nik"];
    $tempat_lahir = $data["tempat_lahir"];
    $tanggal_lahir = $data["tanggal_lahir"];
    $agama = $data["agama"];
    $pendidikan = $data["pendidikan"];
    $pekerjaan = $data["pekerjaan"];
    $penghasilan = $data["penghasilan"];
    $no_hp = $data["no_hp"];
    $alamat = $data["alamat"];
    $keterangan = $data["keterangan"];


    $sql = "INSERT INTO ibu (nama,nik, tempat_lahir,tanggal_lahir,agama, pend_terakhir, pekerjaan, penghasilan, alamat, no_hp, keterangan)
    VALUES ('$nama','$nik','$tempat_lahir','$tanggal_lahir','$agama','$pendidikan','$pekerjaan','$penghasilan','$alamat','$no_hp','$keterangan')";

    $conn->exec($sql);

    return $conn->lastInsertId();
}

function jurusan($data)
{
    global $conn;
    $pilihan1 = $data["pilihan1"];
    $pilihan2 = $data["pilihan2"];

    $sql = "INSERT INTO jurusan_dituju (jurusan_1,jurusan_2)
    VALUES ('$pilihan1','$pilihan2')";

    $conn->exec($sql);

    return $conn->lastInsertId();
}

function pendidikan($data)
{
    global $conn;

    $asal = $data["asal_sekolah"];
    $agama = $data["agama"];
    $pkn = $data["pkn"];
    $bahasa = $data["bahasa"];
    $mtk = $data["mtk"];
    $ipa = $data["ipa"];
    $ips = $data["ips"];
    $inggris = $data["inggris"];
    $seni = $data["seni"];
    $pjok = $data["pjok"];
    $armel = $data["armel"];
    $skl = skl();

    $sql = "INSERT INTO riwayat_pendidikan 
    (id_pendaftar, asal_sekolah, agama, pkn, bahasa, mtk, ipa, ips, inggris, seni, pjok, armel, skl)
    VALUES (NULL,'$asal','$agama','$pkn','$bahasa','$mtk','$ipa','$ips','$inggris','$seni','$pjok','$armel','$skl')";

    $conn->exec($sql);

    return $conn->lastInsertId();
}

function skl()
{
    $namaFile = $_FILES['skl']['name'];
    $ukuranFile = $_FILES['skl']['size'];
    $error = $_FILES['skl']['error'];
    $tmpName = $_FILES['skl']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
                alert('isi skl terlebih dahulu!');
            </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('yang anda upload bukan gambar!');
            </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranFile > 2000000) {
        echo "<script>
                alert('ukuran gambar terlalu besar!');
            </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'skl/' . $namaFileBaru);

    return $namaFileBaru;
}
